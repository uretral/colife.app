<?php

namespace Modules\Lk\Data\User;

use Livewire\Wireable;
use Modules\Lk\Entities\UserAttributes;
use Spatie\LaravelData\Concerns\WireableData;
use Spatie\LaravelData\Data;

class UserAttributeData extends Data implements Wireable
{
    use WireableData;

    public function __construct(
        public int     $id,
        public ?int    $user_id,
        public ?int    $position_id,
        public ?string $phone,
        public ?int    $phone_verified,
        public ?string $last_name,
        public ?string $surname,
        public ?string $about,
        public ?string $bod,
        public ?string $job,
        public ?array  $interests,
        public ?int    $save_data,
        public ?int    $location,
        public ?int    $test_user,
        public ?string $telegram,
        public ?string $facebook,
        public ?string $instagram,
        public ?string $vkontakte,
        public ?int    $bonus,
        public ?bool    $cleaning,
        public ?bool    $master,
        public ?bool    $email_notification,
        public ?bool    $sms_notification,
        public ?string $created_at,
        public ?string $updated_at,
        public ?string $deleted_at,
    )
    {
    }

    public function updatingProperties(): array
    {
        return $this
            ->except('created_at')
            ->except('updated_at')
            ->except('deleted_at')
            ->except('id')
            ->except('user_id')

            ->toArray();
    }

    public function createOrUpdate(): \Illuminate\Database\Eloquent\Model|UserAttributes
    {
        return UserAttributes::updateOrCreate(['user_id' => $this->user_id],$this->updatingProperties());
    }
}

















