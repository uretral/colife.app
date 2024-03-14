<?php

namespace Modules\My\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use Modules\My\Livewire\Appeals;
use Modules\My\Livewire\Chat;
use Modules\My\Livewire\GlobalEventsListener;
use Modules\My\Livewire\HeaderAppeal;
use Modules\My\Livewire\HeaderAvatar;
use Modules\My\Livewire\HeaderNotification;
use Modules\My\Livewire\MakeAppeal;
use Modules\My\Livewire\Requests;
use Modules\My\Livewire\SummaryExpenses;
use Modules\My\Livewire\SummaryFinancials;
use Modules\My\Livewire\SummaryInvestment;
use Modules\My\Livewire\SummaryKeyIndicators;
use Modules\My\Livewire\Switcher;
use Modules\My\View\Components\Block\Badge;
use Modules\My\View\Components\Block\UserBadge;
use Modules\My\View\Components\Faq;
use Modules\My\View\Components\Frame\Header;
use Modules\My\View\Components\Frame\Section;

class MyComponentsServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->livewireComponents();
        $this->xComponents();
    }

    public  function livewireComponents(): void
    {
        Livewire::component('my::notifier', \Modules\My\Livewire\Notifier::class);
        Livewire::component('my::news', \Modules\My\Livewire\News::class);
        Livewire::component('my::news-page', \Modules\My\Livewire\NewsPage::class);
        Livewire::component('my::aside-summary', \Modules\My\Livewire\AsideSummary::class);
        Livewire::component('my::aside-news', \Modules\My\Livewire\AsideNews::class);
        Livewire::component('my::estate-list', \Modules\My\Livewire\EstateList::class);
        Livewire::component('my::estate-item', \Modules\My\Livewire\EstateItem::class);
        Livewire::component('my::payment-rent', \Modules\My\Livewire\PaymentRent::class);
        Livewire::component('my::payment-utility', \Modules\My\Livewire\PaymentUtility::class);
        Livewire::component('my::profile-card', \Modules\My\Livewire\ProfileCard::class);
        Livewire::component('my::profile-info', \Modules\My\Livewire\ProfileInfo::class);
        Livewire::component('my::settings', \Modules\My\Livewire\Settings::class);
        Livewire::component('my::appeals', Appeals::class);
        Livewire::component('my::requests', Requests::class);
        Livewire::component('my::make-appeal', MakeAppeal::class);
        Livewire::component('my::switcher', Switcher::class);
        Livewire::component('my::chat', Chat::class);
        Livewire::component('my::header-notification', HeaderNotification::class);
        Livewire::component('my::header-avatar', HeaderAvatar::class);
        Livewire::component('my::summary-expenses', SummaryExpenses::class);
        Livewire::component('my::summary-financials', SummaryFinancials::class);
        Livewire::component('my::summary-key-indicators', SummaryKeyIndicators::class);
        Livewire::component('my::summary-investment', SummaryInvestment::class);
        Livewire::component('my::global-events-listener', GlobalEventsListener::class);
    }

    public function xComponents() {
        Blade::component('my::block.badge', Badge::class);
        Blade::component('my::block.user-badge', UserBadge::class);
        Blade::component('my::frame.header', Header::class);
        Blade::component('my::frame.section', Section::class);
        Blade::component('my::faq', Faq::class);
    }
}
