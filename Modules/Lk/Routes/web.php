<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\User\SandboxController;
use Illuminate\Support\Facades\Route;
use Modules\Lk\Repositories\UserRepository;

Route::domain(config('app.domain_tenant'))->group(function () {

    require __DIR__ . '/auth.php';
    require __DIR__ . '/webhooks.php';


    Route::prefix("/stripe")->group(function (){
        Route::any('/index',[SandboxController::class,'index'])->name('lk.stripe.index');
        Route::any('/result{session_id?}',[SandboxController::class,'result'])->name('lk.stripe.result');
        Route::any('/status',[SandboxController::class,'status'])->name('lk.stripe.status');
    });


    Route::group(['middleware' => ['auth.lk', 'lk']], function () {

        Route::any('/locale/{lang}',[UserRepository::class,'setLocale'])->name('lk.locale');

        Route::get('/', fn() => view('lk::articles'))->name('lk.home');
        Route::get('/article/{id}', fn() => view('lk::article-page'))->name('lk.article.page');

        // Платежи
        if ( config('app.url') != 'https://home.colife.group' ){
            Route::get('/payments', fn() => view('lk::payments'))->name('lk.payments');
            Route::any('/payments/{invoiceId}/{clientSecret}',[SandboxController::class,'checkout'])->name('lk.payments.checkout');
        } else {
            Route::get('/payments', fn() => view('lk::coming-soon'))->name('lk.payments');
        }

        // Поддержка
        Route::get('/appeal', fn() => view('lk::appeal'))->name('lk.appeal');
        Route::get('/chat', fn() => view('lk::chat'))->name('lk.chat');
        Route::get('/faq', fn() => view('lk::faq'))->name('lk.faq');

        // Пользователь
        Route::get('/profile', fn() => view('lk::profile'))->name('lk.profile');
        Route::get('/settings', fn() => view('lk::user-settings'))->name('lk.settings');
        Route::get('/bonus', fn() => view('lk::bonus-info'))->name('lk.bonus');
    }
    );

});
