<?php


namespace App\Services\Bitrix\Data\Castables;


use App\Services\Bitrix\Models\BitrixUserField;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use Illuminate\Support\Carbon;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\Cast;
use Spatie\LaravelData\Support\DataProperty;

class DealPriorityCast implements Cast
{

    public string $userFieldName = 'UF_CRM_1686150568517';

    /**
     * @throws \Exception
     */
    public function cast(DataProperty $property, mixed $value, array $context): mixed
    {

        self::getAttributeId($property);
        $userField = self::findUserField();
        return $userField->values()
            ->where('value',$value)
            ->first()
            ?->bx_id;

    }

    private function getAttributeId(DataProperty $property): void
    {
        $this->userFieldName = $property->attributes->filter(
                fn(object $attribute) => $attribute instanceof WithCast
            )->first()->arguments[0];
    }

    private function findUserField(): Model|BitrixUserField|Builder
    {
        try {

           return BitrixUserField::where('entityId','CRM_DEAL')
                ->where('FieldName', $this->userFieldName)->firstOrFail();

        } catch (QueryException $e){
            throw new \Exception('Bitrix Deal Priority field Error: ' . $e->getMessage());
        }

    }
}
