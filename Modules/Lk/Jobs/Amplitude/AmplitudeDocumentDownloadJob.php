<?php

namespace Modules\Lk\Jobs\Amplitude;

use Modules\Lk\Jobs\AmplitudeJob;

class AmplitudeDocumentDownloadJob extends AmplitudeJob
{

    public function __construct(array $attributes = [])
    {
        parent::__construct();

        $this->attributes = $attributes;
        $this->attributes['type'] = 'Настройки и документы';
        $this->attributes['name'] = 'Скачивание документа';
        $this->attributes['check'] = 'job';
        $this->event_name = 'document_download';
    }

    /**
     * Execute the job.
     * Время события
     * event_id
     * event_name
     * user_id
     * topic - название скаченного документа
     * document_type - тип документа
     *
     * передается при нажатии на стрелочку справа от документа
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
