<?php

namespace Modules\My\Livewire;

use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Computed;
use Modules\My\Http\Controllers\AppealController;
use Modules\My\Data\Appeal\AppealData;
use Modules\My\Data\Appeal\AppealMessageData;
use Modules\My\Data\Form\SelectOptionData;
use Modules\My\Entities\Appeal;
use Modules\My\Entities\AppealTheme;
use Modules\My\Entities\AppealThemeType;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\My\Events\MyAppealCreatedEvent;
use Modules\My\Repositories\UserRepository;

class MakeAppeal extends Component
{
    use WithFileUploads;

    public int $userId;

    // данные формы
    public ?int $theme_id = null;
    public ?int $theme_type_id = null;
    public $message;
    public $files = [];

//    public function onAppealModal()
//    {
//        $this->dispatch('onAppealOpen',open: true);
//    }

    public function __construct($id = null)
    {
        $this->userId = UserRepository::getAuthId();
    }


    protected $rules = [
        'theme_id' => 'required',
        'theme_type_id' => '',
        'message' => 'required|min:10',
        'files.*' => 'max:10048',
    ];

    public function createAppeal(AppealController $controller, int $author_id): Appeal
    {
        return $controller->createAppeal(
            AppealData::from([
                'theme_id' => $this->theme_id,
                'type_id' => $this->theme_type_id,
                'active' => 1,
                'status_id' => 1
            ]), $author_id
        );
    }


    public function submit(AppealController $controller)
    {

        $this->validate();
        try {

            $appeal = $this->createAppeal($controller, $this->userId);

            $controller->createMessage(AppealMessageData::from([
                'author_id' => $this->userId,
                'appeal_id' => $appeal->getAttribute('id'),
                'message' => $this->message,
                'read' => 1,
                'files' => $this->files,
            ]));

            // Отправка события
            MyAppealCreatedEvent::dispatch($appeal);

            return redirect()->route('my.appeal');
        } catch (\Exception $e) {
            Log::error("Ошибка " . $e->getMessage());
            throw new \Exception("Ошибка создания обращения: ". $e->getMessage());
        }
    }

    #[Computed]
    public function themeTypes(): \Illuminate\Support\Enumerable
    {
        return SelectOptionData::collection(
            AppealThemeType::where('theme_id', $this->theme_id)->get()
        )->toCollection();
    }

    #[Computed]
    public function themes(): \Illuminate\Support\Enumerable
    {
        return SelectOptionData::collection(
            AppealTheme::all()
        )->toCollection();
    }


    public function render(): View
    {
        return view('my::livewire.make-appeal');
    }
}
