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

// Вебхуки из моста
Route::webhooks('/webhooks/request/create','my-request-create');
Route::webhooks('/webhooks/request/message','my-request-message');

Route::webhooks('/webhooks/appeal','my-appeal');
