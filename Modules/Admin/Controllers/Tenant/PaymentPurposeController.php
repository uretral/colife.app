<?php

namespace Modules\Admin\Controllers\Tenant;

use Modules\Admin\Controllers\AdminController;
use Modules\Lk\Entities\PaymentPurpose;

class PaymentPurposeController extends AdminController
{
    public function __construct()
    {
        $this->model = PaymentPurpose::class;
        $this->title = (string)__('admin.menu_titles.tenant.lists_purpose_payments');
    }

    function setGrid()
    {
        $this->grid->column('is_hidden', trans('admin.payment-purposes.is_hidden'))->switch()->sortable();
        $this->grid->column('type', trans('admin.payment-purposes.type'))->editable()->sortable();
    }

    function setForm()
    {

        $this->form->color('color', trans('admin.payment-purposes.button-color'));
        $this->form->color('bg', trans('admin.payment-purposes.button-background-color'));
        $this->form->text('icon_filter', trans('admin.payment-purposes.icon_filter'));
        $this->form->switch('is_hidden', trans('admin.payment-purposes.is_hidden'));
        $this->form->text('type', trans('admin.payment-purposes.type'));
        $this->setTranslations();
    }

    function setShow()
    {
        // TODO: Implement setShow() method.
    }
}
