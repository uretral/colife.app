<?php


namespace App\Services\Bitrix;


use App\Services\Bitrix\Actions\Crm_Status\GetBitrixCrmStatusesListAction;
use App\Services\Bitrix\Actions\Crm_Status\UpdateBitrixCrmStatusesEntityAction;
use App\Services\Bitrix\Actions\Crm_Status\UpdateBitrixCrmStatusesEntityStatusAction;
use App\Services\Bitrix\Actions\CrmContact\GetBitrixCrmContactAction;
use App\Services\Bitrix\Actions\CrmContact\GetBitrixCrmContactFieldsAction;
use App\Services\Bitrix\Actions\CrmContact\SaveBitrixContactIsRegisteredAction;
use App\Services\Bitrix\Actions\CrmContact\StoreBitrixContactAuthUrlAction;
use App\Services\Bitrix\Actions\CrmContact\StoreBitrixContactMailConfirmedAction;
use App\Services\Bitrix\Actions\CrmContact\StoreBitrixContactRegisteredAction;
use App\Services\Bitrix\Actions\CrmContact\StoreBitrixProfileAction;
use App\Services\Bitrix\Actions\CrmContact\UpdateBitrixContactAction;
use App\Services\Bitrix\Actions\CrmContact\UpdateBitrixContactAuthUrlAction;
use App\Services\Bitrix\Actions\CrmContact\UpdateBitrixCrmContactFieldAction;
use App\Services\Bitrix\Actions\CrmDeals\GetBitrixCrmDealFieldsAction;
use App\Services\Bitrix\Actions\CrmDeals\GetBitrixDealListAction;
use App\Services\Bitrix\Actions\CrmDeals\UpdateBitrixDealAction;
use App\Services\Bitrix\Actions\CrmDeals\UpdateBitrixDealFieldsAction;
use App\Services\Bitrix\Actions\CrmItems\AddBitrixItemAction;
use App\Services\Bitrix\Actions\CrmItems\GetBitrixItemListAction;
use App\Services\Bitrix\Actions\CrmType\GetBitrixTypeFieldsAction;
use App\Services\Bitrix\Actions\CrmType\GetBitrixTypeListAction;
use App\Services\Bitrix\Actions\CrmType\UpdateBitrixCrmTypeAction;
use App\Services\Bitrix\Actions\CrmType\UpdateBitrixCrmTypeFieldAction;
use App\Services\Bitrix\Actions\CrmUserField\GetBitrixCrmUserFieldsAction;
use App\Services\Bitrix\Actions\CrmUserField\UpdateBitrixCrmUserFieldAction;
use App\Services\Bitrix\Actions\EntityModel\UpdateBitrixEntityModelAction;
use App\Services\Bitrix\Actions\UpdateBitrixDataSetAction;
use App\Services\Bitrix\Actions\UserField\GetBitrixUserFieldAction;
use App\Services\Bitrix\Actions\UserField\GetBitrixUserFieldListAction;
use App\Services\Bitrix\Actions\UserField\UpdateBitrixUserFieldAction;
use App\Services\Bitrix\Data\CrmContact\BitrixCrmContactData;
use App\Services\Bitrix\Data\CrmContact\BitrixCrmContactFieldData;
use App\Services\Bitrix\Data\CrmDeal\BitrixDealData;
use App\Services\Bitrix\Data\CrmFields\BitrixCrmFieldData;
use App\Services\Bitrix\Data\CrmItem\BitrixItemData;
use App\Services\Bitrix\Data\CrmStatus\BitrixCrmStatusEntityData;
use App\Services\Bitrix\Data\CrmStatus\BitrixCrmStatusEntityStatusData;
use App\Services\Bitrix\Data\CrmType\BitrixCrmTypeData;
use App\Services\Bitrix\Data\CrmType\BitrixCrmTypeFieldData;
use App\Services\Bitrix\Data\CrmUserField\BitrixCrmUserFieldData;
use App\Services\Bitrix\Data\EntityModel\BitrixEntityModelData;
use App\Services\Bitrix\Data\Mappers\AccountToBitrixDealData;
use App\Services\Bitrix\Data\Mappers\BitrixUserAttributesData;
use App\Services\Bitrix\Data\Tenant\BitrixTenantProfileData;
use App\Services\Bitrix\Data\UserField\BitrixUserFieldData;
use App\Services\Bitrix\Enum\TypeIdEnum;
use App\Services\Bitrix\Enum\UserFieldTypesEnum;
use App\Services\Bitrix\Models\BitrixCrmContact;
use App\Services\Bitrix\Models\BitrixCrmDeal;
use App\Services\Bitrix\Models\BitrixCrmDealCategories;
use App\Services\Bitrix\Models\BitrixCrmItem;
use App\Services\Bitrix\Models\BitrixCrmType;
use App\Services\Bitrix\Models\BitrixUserField;
use App\Services\Bitrix24\Bitrix;
use App\Services\Bitrix24\Entity\ContactEntity;
use App\Services\Bitrix24\Entity\CrmDealEntity;
use App\Services\Bitrix24\Entity\ImEntity;
use Bitrix24\Bitrix24Entity;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;

/**
 * Class BitrixService
 * @package App\Services\Bitrix
 */
class BitrixService
{

    public function __construct()
    {
    }


    /**
     * Получаем Список всех смарт процессов из Локальной БД
     * @return Collection|array
     * @throws \Exception
     */
    public static function getTypeList(): Collection|array
    {
        return BitrixCrmType::all();
    }

    /**
     * Получаем и обновляем список Смарт-процессов из Битрикс в Локальную БД
     * @throws \Exception
     */
    public static function updateCrmTypeList(): void
    {
        try { // Получить список-коллекцию смарт процессов
            $list = app(GetBitrixTypeListAction::class)->run();
            $list->each(
                function ($item) {
                    $dto = BitrixCrmTypeData::from($item);

                    app(UpdateBitrixCrmTypeAction::class)->run($dto);
                }
            );

            return;
        } catch (\Exception $e) {
            Log::channel('bitrix')->error($e->getMessage());
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * Получаем и обновляем список полей для Смарт-процесса по EntityTypeID из Битрикс в Локальную БД
     * @param int $smartProcessId
     * @throws \Exception
     */
    public static function updateCrmTypeFields(int $bxEntityTypeId): void
    {
        try {  // Получить список-коллекцию полей по процессу
            $fieldList = app(GetBitrixTypeFieldsAction::class)->run($bxEntityTypeId);
            foreach ($fieldList as $bx_name => $fields) {
                // Привести к ДТО
                $dto = BitrixCrmTypeFieldData::fromData($bx_name, $bxEntityTypeId, $fields);

                // Записать или проапдейтить
                app(UpdateBitrixCrmTypeFieldAction::class)->run($dto);
            }
            return;
        } catch (\Exception $e) {
            Log::channel('bitrix')->error($e->getMessage());
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * Полное обновление списка Смарт-процессов и полей к ним
     * @throws \Exception
     */
    public static function updateSmartProcessesWithFields()
    {
        $processList = self::getTypeList();
        $processList->each(
            function (BitrixCrmType $process) {
                self::updateCrmTypeFields($process->bx_entity_type_id);
            }
        );
    }

    /**
     * Создать/обновить 1 запись из готового датаСета (для смарт-процесса)
     * @param int $entityTypeId
     * @param int $extId
     * @param array $payload
     * @return bool
     * @throws \Exception
     */
    public static function updateItemWithValues(int $bxEntityTypeId, int $bxId, array $payload)
    {
        $dto = BitrixItemData::from(
            [
                'bx_id'             => $bxId,
                'bx_entity_type_id' => $bxEntityTypeId,
            ]
        );

        $itemModel = app(UpdateBitrixDataSetAction::class)->run($dto);

        $fieldsCollection = $itemModel->fields;

        foreach ($payload as $bx_name => $value) {
            if ($field_id = $fieldsCollection->where('bx_name', $bx_name)->first()?->id) {
                $fieldIds[$field_id] = ['value' => $value];
            }
        }

        if (!empty($fieldIds)) {
            $itemModel->values()->sync($fieldIds);
        }

        return true;
    }

    /**
     * Получение всех данных по всем смарт-процессам
     * TODO: обсудить есть ли смысл ставить в очередь?
     * @throws \Exception
     */
    public static function updateAllItems()
    {
        //Получить все смарт процессы
        $typeList = self::getTypeList();
        $typeList->each(
            function (BitrixCrmType $process) {
                //Получить все записи по смарт-процессу
                $dataList = app(GetBitrixItemListAction::class)->run($process->bx_entity_type_id);
                $dataList->each(
                    function (array $item) use ($process) {
                        self::updateItemWithValues($process->bx_entity_type_id, $item['id'], $item);
                    }
                );
            }
        );
    }

    /**
     * Получение и обновление всех ДОПОЛНИТЕЛЬНЫХ сущностей CRM.STATUS
     * @throws \Exception
     */
    public static function updateCrmStatus()
    {
        //Получить все смарт процессы
        $statusesList = app(GetBitrixCrmStatusesListAction::class)->run();

        $statusesList->groupBy('ENTITY_ID')->toArray();
        $statusesList
            ->groupBy('ENTITY_ID')
            ->each(
                function (\Illuminate\Support\Collection $entityCollection) {
                    // Создаем или обновляем Доп. Сущность
                    $entity = $entityCollection->first();
                    if (empty($entity)) {
                        throw new \Exception('Ошибка получения доп сущности');
                    }
                    $dto = BitrixCrmStatusEntityData::from($entity);
                    $model = app(UpdateBitrixCrmStatusesEntityAction::class)->run($dto);

                    // Заполняем все элементы справочника по сущности
                    $entityCollection->each(
                        function (\Illuminate\Support\Collection $statusItem) use ($model) {
                            $statusItem->put('crm_status_entity_id', $model->id);
                            $dto = BitrixCrmStatusEntityStatusData::from($statusItem);
                            app(UpdateBitrixCrmStatusesEntityStatusAction::class)->run($dto);
                        }
                    );
                }
            );
    }

    /**
     * Запись контакта в Б24 (createOrUpdate)
     * @param $model_id
     * @return int
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public static function storeBitrixContactFromModelId(BitrixCrmContact $contactModel): int
    {
        try {
            $dto = BitrixCrmContactData::fromModel($contactModel);
            $bitrix = app()->make(Bitrix::class);
            $api = new ContactEntity($bitrix);

            // Если нет ID - Добавляем Контакт
            if (empty($contactModel->bx_id)) {
                $response = $api->add($dto->toArray());
                $contactModel->update(['bx_id' => $response['result']]);
            } else { // Обновляем Контакт
                $response = $api->update($contactModel->bx_id, $dto->toArray());
            }

            return $contactModel->bx_id;
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            Log::error(json_encode($dto->toArray()));
            self::notify($e->getMessage());
        }
    }

    /**
     * Получение и обновление всех UserFields типа List + их Values
     * @throws \Exception
     */
    public static function updateCrmUserFields(): bool
    {
        // Получить все UserFields, по дефолту с типом enum
        $userFieldList = app(GetBitrixCrmUserFieldsAction::class)->run();

        $userFieldList
            ->each(
                function ($userField) {
                    // Создаем или обновляем UserFields + values
                    $dto = BitrixCrmUserFieldData::from($userField);
                    app(UpdateBitrixCrmUserFieldAction::class)->run($dto);
                }
            );
        return true;
    }

    /**
     * Получение всех ContactFields
     * @throws \Exception
     */
    public static function updateCrmContactFields(): bool
    {
        $list = app(GetBitrixCrmContactFieldsAction::class)->run();
        $list->each(
            function ($field) {
                $dto = BitrixCrmContactFieldData::from($field);
                app(UpdateBitrixCrmContactFieldAction::class)->run($dto);
            }
        );
        return true;
    }

    /**
     * Получаем и обновляем список UserFields
     * @throws \Exception
     */
    public static function updateUserFields(): void
    {
        try {
            $fieldList = app(GetBitrixUserFieldListAction::class)->run();
            $fieldList->each(
                function ($field) {
                    //Обновляем связки с EntityId=ModelName
                    $entityDto = BitrixEntityModelData::from($field);
                    $entityModel = app(UpdateBitrixEntityModelAction::class)->run($entityDto);

                    $dto = BitrixUserFieldData::from($field);
                    app(UpdateBitrixUserFieldAction::class)->run($dto);
                }
            );

            return;
        } catch (\Exception $e) {
            Log::channel('bitrix')->error($e->getMessage());
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * Получаем и обновляем список UserFields
     * @throws \Exception
     */
    public static function updateUserFieldValues(): void
    {
        try {
            $fieldList = BitrixUserField::
            where('UserTypeId', UserFieldTypesEnum::enumeration()->label)
                ->get();
            $fieldList->each(
                function (BitrixUserField $field) {
                    $bxField = app(GetBitrixUserFieldAction::class)->run($field->bx_id);
                    $dto = BitrixUserFieldData::from($bxField);
                    app(UpdateBitrixUserFieldAction::class)->run($dto);
                }
            );

            return;
        } catch (\Exception $e) {
            Log::channel('bitrix')->error($e->getMessage());
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * Обновление контакта из Битрикс по Webhook
     * @param $contactId
     * @return bool
     */
    public static function syncContact($contactId): bool
    {
        try {
            $contact = app(GetBitrixCrmContactAction::class)->run($contactId);
            $dto = BitrixCrmContactData::from($contact);
            $model = app(UpdateBitrixContactAction::class)->run($dto);

//          Обновляем ссылку на регистрацию Только для жильцов
            if (empty($model->auth_url)
                && $contact['TYPE_ID'] == TypeIdEnum::CLIENT()->label // Hardcode
            ) {
                self::storeUpdateContactAuthUrl($contactId);
            }

            return true;
        } catch (\Exception $e) {
            Log::channel('webhooks')->error($e->getMessage());
            self::notify($e->getMessage());
            return false;
        }
    }

    /**
     * Обновление контакта из Битрикс по Webhook
     * @param $contactId
     * @return bool
     */
    public static function storeUpdateContactAuthUrl($contactId): bool
    {
        try {
            $auth_url = app(UpdateBitrixContactAuthUrlAction::class)->run($contactId, true);
            app(StoreBitrixContactAuthUrlAction::class)->run($contactId, $auth_url);
            return true;
        } catch (\Exception $e) {
            Log::channel('bitrix')->error($e->getMessage());
            self::notify($e->getMessage());
            return false;
        }
    }

    /**
     * Сохранение, что Контакт зарегистрировался
     * @param int $contactId
     * @return bool
     * @throws \Exception
     */
    public static function storeContactIsRegistered(int $contactId): bool
    {
        try {
            $model = app(SaveBitrixContactIsRegisteredAction::class)->run($contactId);
            app(StoreBitrixContactRegisteredAction::class)->run($model);
            return true;
        } catch (\Exception $e) {
            Log::channel('bitrix')->error($e->getMessage());
            self::notify($e->getMessage());
            return false;
        }
    }

    /**
     * Сохранение, что Контакт подтвердил почту
     * @param int $contactId
     * @return bool
     * @throws \Exception
     */
    public static function storeContactEmailConfirmed(int $contactId): bool
    {
        try {
            $model = app(SaveBitrixContactIsRegisteredAction::class)->run($contactId);
            app(StoreBitrixContactMailConfirmedAction::class)->run($model);
            return true;
        } catch (\Exception $e) {
            Log::channel('bitrix')->error($e->getMessage());
            self::notify($e->getMessage());
            return false;
        }
    }

    /**
     * Добавление новой записи в Смарт-процесс, получение Bitrix ID
     * Квартира-156, Комната-171
     * @throws \Exception
     */
    public static function createItemFromModel(BitrixCrmItem $model): int
    {
        $dto = BitrixItemData::fromModel($model);
        $model->bx_id = app(AddBitrixItemAction::class)->run($dto);
        $model->save();

        return $model->bx_id;
    }

    /**
     * Получаем и обновляем список полей для CRM -> Сделки
     * @throws \Exception
     */
    public static function updateDealFields(): void
    {
        try {
            $fieldList = app(GetBitrixCrmDealFieldsAction::class)->run();
            $fieldList->each(
                function ($field, $name) {
                    $dto = BitrixCrmFieldData::from($field);
                    $dto->bx_name = $name;
                    $dto->model = BitrixCrmDeal::class;
                    app(UpdateBitrixDealFieldsAction::class)->run($dto);
                }
            );

            return;
        } catch (\Exception $e) {
            Log::channel('bitrix')->error($e->getMessage());
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * Получение всех данных по всем Сделкам
     * @throws \Exception
     */
    public static function updateAllDeals()
    {
        try {
            //Получить все нужные типы сделок/Воронок
            $dealIds = ['appeals'];
            $categories = BitrixCrmDealCategories::whereIn('slug', $dealIds)->get();


            $categories->each(
                function (BitrixCrmDealCategories $category) {
                    // Получить все записи по по фильтру
                    $filters = [
                        'CATEGORY_ID' => $category->bx_id
                    ];
                    $dataList = app(GetBitrixDealListAction::class)->run(filters: $filters);

                    $dataList->each(
                        function (array $item) use ($category) {
                            self::updateDealWithValues($category->bx_id, $item['ID'], $item);
                        }
                    );
                }
            );
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * Создать/обновить 1 запись из готового датаСета (для смарт-процесса)
     * @param int $extId
     * @param array $payload
     * @return bool
     * @throws \Exception
     */
    public static function updateDealWithValues(int $categoryId, int $bxId, array $payload)
    {
        try {
            $dto = BitrixDealData::from(
                [
                    'bx_id'       => $bxId,
                    'category_id' => $categoryId
                ]
            );

            $itemModel = app(UpdateBitrixDealAction::class)->run($dto);
            $fieldsCollection = $itemModel->fields();
            foreach ($payload as $bx_name => $value) {
                if ($field_id = $fieldsCollection->where('bx_name', $bx_name)->first()?->id) {
                    $fieldIds[$field_id] = ['value' => $value];
                }
            }

            if (!empty($fieldIds)) {
                $itemModel->values()->sync($fieldIds);
            }

            return true;
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    private static function notify(string $message): void
    {
        $notification = config('bitrix24.B24_NOTIFICATION');
        try {
            if ($notification) {
                Notification::route('telegram', '')
                    ->notify(new $notification($message));
            } else {
                Log::channel('bitrix')->error($message);
            }
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return;
        }
    }

    /**
     * Запись Сделки в Б24
     * @param $model_id
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public static function addBitrixDeal(array $data)
    {
        try {
            $dto = AccountToBitrixDealData::from($data);
            $bitrix = app()->make(Bitrix::class);
            $api = new CrmDealEntity($bitrix);
            return $api->add($dto->toArray());
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            Log::error(json_encode($dto->toArray()));
            self::notify($e->getMessage());
        }
    }

    /**
     * Запись Сделки в Б24
     * @param int $id
     * @param array $data
     * @return array|null
     */
    public static function storeBitrixDeal(int $id, array $data): ?array
    {
        try {
            $dto = AccountToBitrixDealData::from($data);
            $bitrix = app()->make(Bitrix::class);
            $api = new CrmDealEntity($bitrix);
            return $api->update($id, $dto->toArray());
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            Log::error(json_encode($dto->toArray()));
            self::notify($e->getMessage());
            return null;
        }
    }

    /**
     * Регистрируем коннектор и активируем для Открытой Линии
     * Коннектор появится тут: https://colife.bitrix24.ru/contact_center/
     * Открытую Линию добавляем отдельно в самом Битриксе
     */
    public static function installConnector(): bool
    {
        try {
            $bitrix = app(Bitrix::class);
            $connector = new ImEntity($bitrix);
            $connector->registerConnector();
            return true;
        } catch (\Exception $e) {
            throw new \Exception('Б24: Ошибка регистрации Коннектора ' . $e->getMessage());
        }
    }

    public static function installLine($line = 18): array
    {
        try {
            $bitrix = app(Bitrix::class);
            $connector = new ImEntity($bitrix);
            return $connector->activateConnector(lineId: $line, active: 1);
        } catch (\Exception $e) {
            throw new \Exception('Б24: Ошибка активации ОЛ: ' . $e->getMessage());
        }
    }

    /**
     * Удаление коннектора
     *
     */
    public static function uninstallConnector($connectorID = false): array
    {
        try {
            $bitrix = app(Bitrix::class);
            $connector = new ImEntity($bitrix);
            return $connector->deleteConnector($connectorID);
        } catch (\Exception $e) {
            throw new \Exception('Б24: Ошибка удаления Коннектора ' . $e->getMessage());
        }
    }

    /**
     * @throws \Exception
     */
    public static function installChatLines(): bool
    {
        $connectorId = config('bitrix24.B24_CONNECTOR_ID');
        collect(
            [
                config('bitrix24.B24_LINE_APPEALS_ID'),
                config('bitrix24.B24_LINE_GROUP_CHAT_ID'),
                config('bitrix24.B24_LINE_CHAT_ID')
            ]
        )->each(
            function ($line) use ($connectorId) {
                $r = BitrixService::installLine($line);

                if (!empty($r['result'])) {
                    echo "Линия {$line} чатов активирована" . PHP_EOL;
                } else {
                    echo "Ошибка активации линии чатов {$line} для коннектора {$connectorId}" . PHP_EOL;
                }
            }
        );

        return true;
    }

    public static function installChatEvents(){

        $bitrix = app(Bitrix::class);
        $connector = new ImEntity($bitrix);
        $connector->registerEvent(event: 'add');
        echo "События для чатов активированы";

        $connector->registerTestEvent();
        echo "Тестовое Событие зарегистрировано";
    }

    public static function getContactByUserId(int $contactId, $userId = false): BitrixUserAttributesData
    {
        $contact = BitrixCrmContact::whereBxId($contactId)->first();
        $contactDto = BitrixUserAttributesData::from($contact);
        if ($userId)
            $contactDto->user_id = $userId;

        return $contactDto;
    }


    /**
     * Сохранениe профильной информации
     * @param array $user
     * @return bool
     * @throws \Exception
     */
    public static function storeContactProfile(array $user): bool
    {
        try {
            $dto = BitrixTenantProfileData::from($user);
            return app(StoreBitrixProfileAction::class)->run($dto);
        } catch (\Exception $e) {
            Log::channel('bitrix')->error($e->getMessage());
            self::notify($e->getMessage());
            return false;
        }
    }


}
