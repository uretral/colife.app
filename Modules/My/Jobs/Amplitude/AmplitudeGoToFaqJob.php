<?php

namespace Modules\My\Jobs\Amplitude;

use Modules\My\Jobs\AmplitudeJob;

class AmplitudeGoToFaqJob extends AmplitudeJob
{

    public function __construct(array $attributes = [])
    {
        parent::__construct();

        $this->attributes = $attributes;
        $this->attributes['type'] = 'Чат с поддержкой';
        $this->attributes['name'] = 'FAQ';
        $this->attributes['check'] = 'job';
        $this->event_name = 'go_to_faq';
    }

    /**
     * Execute the job.
     * Время события
     * event_id
     * event_name
     * user_id
     *
     * faq_section_chosen - раздел страницы faq, передается при клике на раздел или при пролистывании до нужной секции (передается при попадании на экран названии раздела + первый вопрос),
     * по умолчанию передается general rules
     *
     * передается при клике на кнопку FAQ
     *
     * @return void
     */
    public function handle(): void
    {
        try {

            $this->send($this->attributes);

        } catch (\Exception $e) {

            \Log::channel('amplitude')->error(self::class . ' ' . $e->getMessage() . PHP_EOL);

        }
    }
}
