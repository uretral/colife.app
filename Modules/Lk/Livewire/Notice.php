<?php

namespace Modules\Lk\Livewire;

use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Locked;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\CrmApi\Contracts\CrmLkApi;
use Modules\CrmApi\Data\Responses\ApiNoticesData;
use Modules\Lk\Data\User\UserData;
use Modules\Lk\Repositories\UserRepository;
use Spatie\LaravelData\CursorPaginatedDataCollection;
use Spatie\LaravelData\DataCollection;
use Spatie\LaravelData\PaginatedDataCollection;

class Notice extends Component
{
    use WithPagination;

    #[Locked]
    public UserData $user;

    public function mount() {
        $this->user = UserData::from(UserRepository::getAuthUser());
    }


/*    public function __construct($id = null)
    {
        dd(UserRepository::getAuthUser());
        parent::__construct($id);
        $this->user = UserRepository::getAuthUser();
    }*/

    // todo: lk -> getNotices()
    public function getNotices(): DataCollection|CursorPaginatedDataCollection|PaginatedDataCollection
    {
        return ApiNoticesData::collection(
            app(CrmLkApi::class)->noticeGet($this->user->bx_id , $this->user->country_code)
        )->filter(function ($item){
            if (!empty($item->type))
                return $item;
        });
    }

    public function render(): View
    {
          return $this->getNotices()->count() > 0
            ? view('lk::livewire.notice', ['notices' => $this->getNotices()->items()])
            : view('lk::livewire.empty');
    }
}
