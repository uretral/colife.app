<?php

namespace Modules\Lk\Jobs\Amplitude;

use Modules\Lk\Jobs\AmplitudeJob;

class AmplitudeCheckPaymentsHistoryJob extends AmplitudeJob
{

    public function __construct(array $attributes = [])
    {
        parent::__construct();

        $this->attributes = $attributes;
        $this->attributes['type'] = 'Платежи';
        $this->attributes['name'] = 'Выбран период платежей';
        $this->attributes['check'] = 'job';
        $this->event_name = 'check_payments_history';
    }

    /**
     * Execute the job.
     *
     * event_id
     * event_name
     * user_id
     * date_from - с даты
     * date_to - по дату
     * num_payments - кол-во платежей за период
     * payment_type_filter - доп. фильтр по типу платежей (если не выбрано, передается null)
     *
     * передается при нажатии на дату окончания периода
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
