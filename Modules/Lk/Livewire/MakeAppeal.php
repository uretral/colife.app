<?php

namespace Modules\Lk\Livewire;

use App\Services\Amplitude\Handle\AmplitudeFillRequest;
use Illuminate\Validation\Validator;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Rule;
use Modules\Lk\Events\Amplitude\MakeAppealEvent;
use Modules\Lk\Http\Controllers\AppealController;
use Modules\Lk\Data\Appeal\AppealData;
use Modules\Lk\Data\Appeal\AppealMessageData;
use Modules\Lk\Data\Form\SelectOptionData;
use Modules\Lk\Entities\Appeal;
use Modules\Lk\Entities\AppealTheme;
use Modules\Lk\Entities\AppealThemeType;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\Lk\Events\TenantAppealCreatedEvent;
use Modules\Lk\Jobs\Amplitude\AmplitudeFillRequestJob;
use Modules\Lk\Repositories\UserRepository;

class MakeAppeal extends Component
{
    use WithFileUploads;

    #[Locked]
    public int $userId;
    #[Rule('required')]
    public ?int $theme_id = null;
    public ?int $theme_type_id = null;
    #[Rule('required|min:10')]
    public $message;
    #[Rule('max:100000')]
    public $files = [];

    public function mount() {
        $this->userId = UserRepository::getAuthId();
    }

    #[Computed]
    public function themes(): \Illuminate\Support\Enumerable
    {
        return SelectOptionData::collection(
            AppealTheme::all()
        )->toCollection();
    }

    public function themeTypes(): \Illuminate\Support\Enumerable
    {
        return SelectOptionData::collection(
            AppealThemeType::where('theme_id', $this->theme_id)->get()
        )->toCollection();
    }

    public function clearFile($key)
    {
        unset($this->files[$key]);
    }

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

    public function updatedFiles()
    {
        $this->withValidator(
            function (Validator $validator) {
                if ($validator->fails()) {
                    $this->reset('files');
                }
            }
        )->validateOnly('files.*');
    }

    public function submit(AppealController $controller)
    {

        $this->validate();

        try {

            $appeal = $this->createAppeal($controller, $this->userId);

            $message = $controller->createMessage(AppealMessageData::from([
                'author_id' => $this->userId,
                'appeal_id' => $appeal->getAttribute('id'),
                'message' => $this->message,
                'read' => 1,
                'files' => $this->files,
            ]));

            // Отправка события
            TenantAppealCreatedEvent::dispatch($appeal);

            // Отправка события AmplitudeFillRequest
            AmplitudeFillRequestJob::dispatch($message->toArray());

            return redirect()->route('lk.appeal');
        } catch (\Exception $e) {
            throw new \Exception("Ошибка создания обращения: " . $e->getMessage());
        }
    }

/*    protected $rules = [
        'theme_id' => 'required',
        'theme_type_id' => '',
        'message' => 'required|min:10',
        'files.*' => 'max:100000',
    ];*/

    public function render(): View
    {
        return view('lk::livewire.make-appeal');
    }
}
