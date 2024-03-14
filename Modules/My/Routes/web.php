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

use Illuminate\Support\Facades\Route;

Route::domain(config('app.domain_landlord'))->group(function () {

    require __DIR__ . '/auth.php';
    require __DIR__ . '/webhooks.php';

    Route::group(['middleware' => ['auth.my', 'my']], function () {

        Route::any('/locale/{lang}',[\Modules\My\Repositories\UserRepository::class,'setLocale'])->name('my.locale');

        Route::get('/news', fn() => view('my::news'))->name('my.news');
        Route::get('/news/{id}',  fn() => view('my::news-page'))->name('my.news.page');

        Route::get('estate', fn() => view('my::estate') )->name('my.estate');
        Route::get('estate/{id}', fn() => view('my::estate-item') )->name('my.estate-item');

        Route::get('payments-rent/{id?}', fn() => view('my::payments-rent') )->name('my.payments-rent');
        Route::get('payments-utility', fn() => view('my::payments-utility') )->name('my.payments-utility');

        Route::get('chat', fn() => view('my::chat') )->name('my.chat');
        Route::get('appeal', fn() => view('my::appeal') )->name('my.appeal');
        Route::get('request', fn() => view('my::request') )->name('my.request');
        Route::get('faq', fn() => view('my::faq'))->name('my.faq');

        Route::get('profile', fn() => view('my::profile') )->name('my.profile');
        Route::get('settings', fn() => view('my::settings') )->name('my.settings');

        Route::get('/', [\Modules\My\Http\Controllers\HomeController::class,'index'] )->name('my.home'); //  fn() => view('my::summary')
    });

});
