<?php

namespace Modules\Admin\Entities;

use Encore\Admin\Form;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Translation extends Model
{
    use HasFactory;

    public static function ruTitle(Form $form, $class, $label = 'admin.title'): Form
    {
        $form->text('ru.title', __($label) . ' (RU)');
        $form->hidden('ru.locale', 'ru')->default('ru');
        $form->hidden('ru.model', $class)->default($class);
        return $form;
    }

    public static function enTitle(Form $form, $class, $label = 'admin.title'): Form
    {
        $form->text('en.title', __($label) . ' (EN)');
        $form->hidden('en.locale', 'en')->default('en');
        $form->hidden('en.model', $class)->default($class);
        return $form;
    }
}
