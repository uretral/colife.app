<?php
namespace Modules\Admin\Routes;


class TenantAdminRoutes
{

    public static function handle($router): void
    {
        #Темы обращений
        $router->resource('/tenant/themes', \Modules\Admin\Controllers\Tenant\AppealThemeController::class);
        $router->resource('/tenant/theme/type', \Modules\Admin\Controllers\Tenant\AppealThemeTypeController::class);
        $router->resource('/tenant/appeal-status', \Modules\Admin\Controllers\Tenant\AppealStatusController::class);
        $router->resource('/tenant/appeal-priority', \Modules\Admin\Controllers\Tenant\AppealThemePriorityController::class);

        #FAQ
        $router->resource('/tenant/faq', \Modules\Admin\Controllers\Tenant\FaqThemeController::class);
        $router->resource('/tenant/faq-articles', \Modules\Admin\Controllers\Tenant\FaqThemeArticleController::class);


        #User Profile
        $router->resource('/tenant/docs', \Modules\Admin\Controllers\Tenant\DocumentController::class);


        #Bonus
        $router->resource('/tenant/bonus-announces', \Modules\Admin\Controllers\Tenant\BonusAnnounceController::class);
        $router->resource('/tenant/bonus-sections', \Modules\Admin\Controllers\Tenant\BonusSectionController::class);
        $router->resource('/tenant/bonus-texts', \Modules\Admin\Controllers\Tenant\BonusTextController::class);

        #User
        $router->resource('/tenant/interest', \Modules\Admin\Controllers\Tenant\UserInterestsController::class);
        $router->resource('/tenant/position', \Modules\Admin\Controllers\Tenant\UserPositionsController::class);
        $router->resource('/tenant/delete-reason', \Modules\Admin\Controllers\Tenant\UserDeleteReasonsController::class);



        #Articles
        $router->resource('/tenant/articles', \Modules\Admin\Controllers\Tenant\ArticleController::class);
        $router->resource('/tenant/articles-reactions', \Modules\Admin\Controllers\Tenant\ArticleReactionController::class);

        #Translate
        $router->resource('/tenant/translate', \Modules\Admin\Controllers\Tenant\TranslationController::class);

        #lists
        #Payment
        $router->resource('/tenant/payment-purposes', \Modules\Admin\Controllers\Tenant\PaymentPurposeController::class);
    }
}
