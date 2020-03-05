<?php

namespace App\Modules\Index;


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
        $form->add($module . '_meta_title', 'text', [
            'title' => trans('index::admin.meta_title'),
            'translate' => true,
            'model' => $form_model

        ]);

        $form->add($module . '_meta_description', 'text', [
            'title' => trans('index::admin.meta_description'),
            'translate' => true,
            'model' => $form_model

        ]);

        $form->add($module . '_meta_keywords', 'text', [
            'title' => trans('index::admin.meta_keywords'),
            'translate' => true,
            'model' => $form_model

        ]);


    }
}
