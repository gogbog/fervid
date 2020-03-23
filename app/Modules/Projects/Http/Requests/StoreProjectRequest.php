<?php

namespace App\Modules\Projects\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest {
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {

        $rules = [];


        $rules['title'] = 'required|string';
        $rules['description'] = 'required|string';
        $rules['meta_title'] = 'nullable|string';
        $rules['meta_description'] = 'nullable|string|max:255';
        $rules['meta_keywords'] = 'nullable|string';
        $rules['active'] = 'boolean';

        $project = request('project');

        if (!empty($project)) {
            $rules['slug'] = 'nullable|string|unique:projects,slug,' . $project;
        } else {
            $rules['slug'] = 'nullable|string|unique:projects,slug';
        }

        return $rules;
    }
}
