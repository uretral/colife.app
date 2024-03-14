<?php

namespace App\Services\Bitrix\Data\CrmType;

use Illuminate\Support\Optional;
use phpDocumentor\Reflection\Types\This;
use Spatie\LaravelData\Attributes\Validation\BooleanType;
use Spatie\LaravelData\Attributes\Validation\IntegerType;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\Nullable;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Attributes\Validation\StringType;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Resolvers\DataFromSomethingResolver;

class BitrixCrmTypeFieldData extends Data
{
    public function __construct(

        #[Nullable, StringType, Max(255)]
        public null|string|Optional $bx_name,

        #[Required, StringType, Max(255)]
        public string $title,

        #[Nullable, IntegerType]
        public ?int $bx_entity_type_id,

        #[Required, StringType, Max(255)]
        public string $type,

        #[Nullable, StringType, Max(255)]
        public string $upperName,

        #[Required, BooleanType]
        public ?bool $isRequired,

        #[Nullable, BooleanType]
        public ?bool $isDynamic,

        #[Nullable, BooleanType]
        public ?bool $isImmutable,

        #[Nullable]
        public ?array $items,

    ) {
    }

    public static function fromData($bx_name,$bxEntityTypeId,...$payloads,): static
    {
        $class =  app(DataFromSomethingResolver::class)->execute(
            static::class,
            ...$payloads
        );
        $class->bx_entity_type_id = $bxEntityTypeId;
        $class->bx_name = $bx_name;

        return $class;

    }
}
