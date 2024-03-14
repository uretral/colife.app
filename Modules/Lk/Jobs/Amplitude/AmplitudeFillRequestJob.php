<?php

namespace Modules\Lk\Jobs\Amplitude;

use Modules\Lk\Entities\Appeal;
use Modules\Lk\Jobs\AmplitudeJob;

class AmplitudeFillRequestJob extends AmplitudeJob
{

    protected array $alternativeAttr = [];

    public function __construct(array $attributes = [])
    {
        parent::__construct();

        $this->alternativeAttr = $attributes;
        $this->attributes['type'] = 'Форма обращения в поддержку';
        $this->attributes['name'] = 'Отправка обращения';
        $this->attributes['check'] = 'job';
        $this->event_name = 'fill_request';
    }


    /**
     * Execute the job.
     * Время события
     * topic - тема обращения
     * type - тип обращения
     * description - описание проблемы
     * user_id
     * request_id
     *
     * передается при клике на кнопку "отправить обращение"
     *
     * результат $alternativeAttr
     *
     * "appeal_id" => 44
     * "author_id" => 1320
     * "message" => "Привет, поддержка!"
     * "read" => 1
     * "updated_at" => "2023-11-01T09:32:12.000000Z"
     * "created_at" => "2023-11-01T09:32:12.000000Z"
     * "id" => 122
     *
     * @return void
     */
    public function handle(): void
    {
        try {

            $appeal = Appeal::find($this->alternativeAttr['appeal_id']);
            $this->attributes['topic'] = $appeal?->theme?->title ?? '-';
            $this->attributes['topic_type'] = $appeal?->themeType?->title ?? '-';
            $this->attributes['description'] = $this->alternativeAttr['message'];
            $this->attributes['request_id'] = $this->alternativeAttr['appeal_id'];

            $this->send($this->attributes);

        } catch (\Exception $e) {

            \Log::channel('amplitude')->error(self::class . ' ' . $e->getMessage() . PHP_EOL);

        }
    }
}
