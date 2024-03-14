<?php


namespace Modules\My\Repositories;


use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Modules\My\Data\Request\RequestData;
use Modules\My\Data\User\OnUserDeleteData;
use Modules\My\Data\User\UserNotificationCountsData;
use Modules\My\Data\Webhook\NewRequestData;
use Modules\My\Entities\AppealTheme;
use Modules\My\Entities\Request;
use Modules\My\Entities\RequestTheme;
use Modules\My\Entities\User;
use Modules\My\Data\User\UserData;
use Illuminate\Support\Facades\Hash;
use Modules\My\Events\ProfileUpdatedEvent;
use Modules\My\Helpers\UserHelper;
use Spatie\LaravelData\DataCollection;

class RequestRepository extends AbstractRepository
{
    protected function getModel()
    {
        return User::class;
    }

    public function __construct()
    {
        parent::__construct();

        $this->init();
    }

    public static function createNewRequest(NewRequestData $dto): Request
    {
        $model = Request::create([
            'theme_id' => (RequestTheme::updateOrCreate([
                'title' => $dto->theme,
            ],[
                'title' => $dto->theme,
                'priority_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]))->id,
                'status_id' => 1,
            ]
        );

        return $model;
    }


}
