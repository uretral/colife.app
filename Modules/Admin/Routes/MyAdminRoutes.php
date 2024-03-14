<?php

namespace Modules\Admin\Routes;

class MyAdminRoutes
{

    public static function handle($router): void
    {
        #Articless
        $router->resource('/my-articles', \Modules\Admin\Controllers\My\ArticleController::class);
//        $router->resource('/my/articles-reactions', \Modules\Admin\Controllers\Tenant\ArticleReactionController::class);

        #Payments
        $router->resource('/my-expenses-list', \Modules\Admin\Controllers\My\ExpensesController::class);

        #Settings
        $router->resource('/my-work-layout', \Modules\Admin\Controllers\My\WorkLayoutController::class);

        #System
        $router->resource('/my-translate', \Modules\Admin\Controllers\My\TranslationController::class);
        $router->resource('/my-work-models', \Modules\Admin\Controllers\My\WorkModelsController::class);
        $router->resource('/my-delete-reason', \Modules\Admin\Controllers\My\UserDeletionReasonController::class);

        #FAQ
        $router->resource('/my-faq', \Modules\Admin\Controllers\My\FaqThemeController::class);
        $router->resource('/my-faq-articles', \Modules\Admin\Controllers\My\FaqThemeArticleController::class);

        #Темы обращений
        $router->resource('/my-themes', \Modules\Admin\Controllers\My\AppealThemeController::class);
        $router->resource('/my-theme-types', \Modules\Admin\Controllers\My\AppealThemeTypeController::class);
        $router->resource('/my-appeal-status', \Modules\Admin\Controllers\My\AppealStatusController::class);
    }
}
