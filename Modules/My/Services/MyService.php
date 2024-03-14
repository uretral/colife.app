<?php


namespace Modules\My\Services;


use App\Helpers\Helper;
use App\Services\Bitrix\Helpers\BitrixHelper;
use Modules\My\Data\Request\RequestBitrixData;
use Modules\My\Data\Request\RequestData;
use Modules\My\Data\Request\RequestMessageData;
use Modules\My\Data\Webhook\NewRequestData;
use Modules\My\Entities\Request;
use Modules\My\Entities\RequestBitrix;
use Modules\My\Events\Request\RequestUpdatedEvent;
use Modules\My\Http\Controllers\RequestController;
use Modules\My\Repositories\RequestRepository;
use Modules\My\Repositories\UserRepository;

class MyService
{
    public static function createFirstRequest(NewRequestData $requestData)
    {
        try {
            $request = RequestRepository::createNewRequest($requestData);
            $userModel = UserRepository::findByBxId($requestData->contact_id);

            $message = app(RequestController::class)->createMessage(
                RequestMessageData::from(
                    [
                        'author_id'  => Helper::getMySupportUserId(),
                        'request_id' => $request->id,
                        'message'    => $requestData->question,
                        'read'       => 0,
                        'files'      => $requestData->files
                    ]
                )
            );

            self::createRequestBitrix($request->id, $requestData->deal_id);
            self::addUsersToRequest($request, Helper::getMySupportUserId(), $userModel->id);

            event(new RequestUpdatedEvent($request->id));

        } catch (\Exception $e) {
            throw new \Exception(
                self::class . " Ошибка создания входящего обращения | ContactId: " . $requestData->contact_id . PHP_EOL . $e->getMessage(
                )
            );
        }
    }

    public static function createRequestBitrix(int $request_id, int $deal_id): RequestBitrix
    {
        return RequestBitrix::create(
            RequestBitrixData::from(['request_id' => $request_id, 'bx_deal_id' => $deal_id])->toArray()
        );
    }

    public static function addUsersToRequest(Request $request, ...$users){
        $controller = app(RequestController::class);
        foreach ($users as $user){
            $controller->createRequestUser($request,$user);
        }
    }


}
