<?php

namespace Modules\Lk\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use Modules\Lk\Livewire\Appeals;
use Modules\Lk\Livewire\Article;
use Modules\Lk\Livewire\ArticlePage;
use Modules\Lk\Livewire\Chat;
use Modules\Lk\Livewire\GlobalEventsListener;
use Modules\Lk\Livewire\HeaderAvatar;
use Modules\Lk\Livewire\HeaderNotification;
use Modules\Lk\Livewire\MakeAppeal;
use Modules\Lk\Livewire\Notice;
use Modules\Lk\Livewire\Notifier;
use Modules\Lk\Livewire\PaymentHistory;
use Modules\Lk\Livewire\ProfileCard;
use Modules\Lk\Livewire\ProfileInfo;
use Modules\Lk\Livewire\Switcher;
use Modules\Lk\Livewire\UserSettings;
use Modules\Lk\View\Components\BonusProgram;
use Modules\Lk\View\Components\Faq;
use Modules\Lk\View\Components\Ui\Block\Badge;
use Modules\Lk\View\Components\Ui\Block\SupportLink;
use Modules\Lk\View\Components\Ui\Block\UserBadge;
use Modules\Lk\View\Components\Ui\Frame\Header;
use Modules\Lk\View\Components\Ui\Frame\Section;


class ComponentServiceProvider extends ServiceProvider
{

    public function boot(): void
    {
        $this->livewireComponents();
        $this->xComponents();
    }


    /**
     * @return void
     */
    public function livewireComponents(): void
    {
        Livewire::component('lk::article', Article::class);
        Livewire::component('lk::appeals', Appeals::class);
        Livewire::component('lk::make-appeal', MakeAppeal::class);
        Livewire::component('lk::switcher', Switcher::class);
        Livewire::component('lk::chat', Chat::class);
        Livewire::component('lk::user-settings', UserSettings::class);
        Livewire::component('lk::profile-card', ProfileCard::class);
        Livewire::component('lk::profile-info', ProfileInfo::class);
        Livewire::component('lk::notifier', Notifier::class);
        Livewire::component('lk::article-page', ArticlePage::class);
        Livewire::component('lk::payment-history', PaymentHistory::class);
        Livewire::component('lk::header-notification', HeaderNotification::class);
        Livewire::component('lk::header-avatar', HeaderAvatar::class);
        Livewire::component('lk::notice', Notice::class);
        Livewire::component('lk::global-events-listener', GlobalEventsListener::class);

    }

    public function xComponents() {
        Blade::component('lk::ui.block.badge', Badge::class);
//        Blade::component('lk::ui.block.user-badge', UserBadge::class);
        Blade::component('lk::ui.frame.header', Header::class);
        Blade::component('lk::ui.frame.section', Section::class);
        Blade::component('lk::faq', Faq::class);
        Blade::component('lk::bonus-program', BonusProgram::class);


//        Blade::component('lk::payment-to-pay', PaymentToPay::class);
//
    }



}
