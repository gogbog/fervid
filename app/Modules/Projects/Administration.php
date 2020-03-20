<?php

namespace App\Modules\Projects;


use App\Modules\Projects\Http\Controllers\Admin\ProjectsController;
use App\Modules\Projects\Models\Project;
use Charlotte\Administration\Helpers\Dashboard;
use Charlotte\Administration\Interfaces\Structure;
use Illuminate\Support\Facades\Route;

class Administration implements Structure {

    public function dashboard() {
        $dashboard = new Dashboard();

        $dashboard->linkBox(trans('projects::admin.module_name'), Project::count(), \Charlotte\Administration\Helpers\Administration::route('projects.index'), 'ti-ruler-pencil', 'text-info');

        return $dashboard->generate();
    }

    public function routes() {
        Route::resource('projects', ProjectsController::class);
    }

    public function menu($menu) {
        $menu->add(trans('projects::admin.module_name'), ['icon' => 'ti-ruler-pencil'])->nickname('projects');

        $menu->get('projects')->add(trans('administration::admin.add'), ['url' => \Charlotte\Administration\Helpers\Administration::route('projects.create')]);
        $menu->get('projects')->add(trans('administration::admin.view_all'), ['url' => \Charlotte\Administration\Helpers\Administration::route('projects.index')]);
    }

    public function settings($module, $form, $form_model) {
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
