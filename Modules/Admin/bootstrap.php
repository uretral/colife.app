<?php

use Encore\Admin\Facades\Admin;

/**
 * Laravel-admin - admin builder based on Laravel.
 * @author z-song <https://github.com/z-song>
 *
 * Bootstraper for Admin.
 *
 * Here you can remove builtin form field:
 * Encore\Admin\Form::forget(['map', 'editor']);
 *
 * Or extend custom form field:
 * Encore\Admin\Form::extend('php', PHPEditor::class);
 *
 * Or require js and css assets:
 * Admin::css('/packages/prettydocs/css/styles.css');
 * Admin::js('/packages/prettydocs/js/main.js');
 *
 */


Encore\Admin\Form::extend('writer', \Modules\Admin\Extensions\Form\Writer::class);
Encore\Admin\Form::forget(['map', 'editor']);

Admin::css(vite::asset('Modules/Admin/Resources/assets/less/app.less'));
$cookieModule = config('admin.extensions.multi-language.cookie-module', 'module');
if(Cookie::has($cookieModule)) {
    Admin::css(vite::asset("Modules/Admin/Resources/assets/less/".Cookie::get($cookieModule).".less"));
}

