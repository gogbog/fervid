<?php

namespace App\Modules\Contacts;


use App\Modules\Depos\Http\Controllers\DeposController;
use App\Modules\Depos\Models\Depo;
use Charlotte\Administration\Helpers\Dashboard;
use Charlotte\Administration\Interfaces\Structure;
use Illuminate\Support\Facades\Route;

class Administration implements Structure
{

    public function dashboard()
    {

    }

    public function routes()
    {

    }

    public function menu($menu)
    {

    }

    public function settings($module, $form, $form_model)
    {
        $form->add($module . '_email', 'text', [
            'title' => trans('contacts::admin.email'),
            'model' => $form_model

        ]);

        $form->add($module . '_phone', 'text', [
            'title' => trans('contacts::admin.phone'),
            'model' => $form_model

        ]);

    }
}
