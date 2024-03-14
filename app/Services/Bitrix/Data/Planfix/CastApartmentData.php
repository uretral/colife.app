<?php

namespace App\Services\Bitrix\Data\Planfix;

use App\Services\Bitrix\Models\BitrixCrmTypeFields;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;

class CastApartmentData extends Data
{
    public function __construct(

        #[MapInputName('field')]
        public mixed $directory_id,

        #[MapInputName('value')]
        public mixed $key,
    ) {

        $this->directory_id = $this->directory_id['directoryId'];
        $this->key = !empty($key['id']) ? $key['id'] : null;
    }


}
