<?php

namespace Modules\My\Data\User;


use Spatie\LaravelData\Data;

class RoleData extends Data
{
    public function __construct(
        public int $id,
        public string $name,
    ) {}
}
