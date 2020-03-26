<?php

namespace App\Modules\Projects\Forms;


use Charlotte\Administration\Forms\AdminForm;
use Charlotte\Administration\Helpers\AdministrationSeo;


class ProjectForm extends AdminForm
{

    public function buildForm()
    {

        $this->add('title', 'text', [
            'title' => trans('projects::admin.title'),
            'clone' => ['slug', 'meta_title'],
            'attr' => [
                'required' => 'required'
            ]
        ]);


        $this->add('description', 'editor', [
            'title' => trans('projects::admin.description'),
        ]);


        AdministrationSeo::seoFields($this, [
            'slug' => ['required' => 'required'],
            'meta_description' => ['live-count' => 255, 'maxlength' => '255']
        ], false);

        $filename = null;

        if (!empty($this->model) && !empty($this->model->getFirstMedia())) {
            $filename = $this->model->getFirstMedia()->getFullUrl('big');
        }

//        $this->add('file', 'file', [
//            'title' => trans('projects::admin.file'),
//            'value' => $filename,
//            'attr' => [
////                'required' => 'required'
//            ]
//        ]);

        $this->add('active', 'switch', [
            'title' => trans('projects::admin.active'),
            'class' => 'col-md-1',
            'default_value' => 1
        ]);

        $this->add('submit', 'button', [
            'title' => trans('administration::admin.submit')
        ]);
    }
}
