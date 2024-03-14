<?php

namespace Modules\Lk\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Modules\Lk\Data\Bonus\BonusSectionData;
use Modules\Lk\Entities\BonusSection;

class BonusProgram extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render(): View
    {
        return view('lk::components.bonus-program',[
            'general' => BonusSectionData::from(
                BonusSection::where('active',1)->where('is_general',1)->first()
            ),
            'common' => BonusSectionData::collection(
                BonusSection::where('active',1)->where('is_general',0)->get()
            )->toCollection(),
        ]);
    }
}
