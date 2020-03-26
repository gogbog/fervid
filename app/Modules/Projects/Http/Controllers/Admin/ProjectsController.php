<?php

namespace App\Modules\Projects\Http\Controllers\Admin;


use App\Modules\Projects\Forms\ProjectForm;
use App\Modules\Projects\Http\Requests\StoreProjectRequest;
use App\Modules\Projects\Models\Project;
use Charlotte\Administration\Helpers\Administration;
use Charlotte\Administration\Helpers\AdministrationDatatable;
use Charlotte\Administration\Helpers\AdministrationField;
use Charlotte\Administration\Helpers\AdministrationForm;
use Charlotte\Administration\Http\Controllers\BaseAdministrationController;
use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;

class ProjectsController extends BaseAdministrationController {
    /**
     * Display a listing of the resource.
     *
     * @param DataTables $datatable
     * @return Response
     */
    public function index(DataTables $datatable) {

        $columns = [
            'id' => ['title' => trans('projects::admin.id')],
            'title' => ['title' => trans('projects::admin.title')],
            'active' => ['title' => trans('projects::admin.visible')],
            'action' => ['title' => trans('projects::admin.action')]
        ];

        $table = new AdministrationDatatable($datatable);
        $table->query(Project::withTrashed()->reversed());
        $table->columns($columns);

        $table->addColumn('active', function ($project) {
            return AdministrationField::switch('active', $project);
        });


        $table->addColumn('action', function ($project) {
            $action = AdministrationField::edit(Administration::route('projects.edit', $project->id));

            $action .= AdministrationField::media($project, ['project_images']);

            if (empty($project->deleted_at)) {
                $action .= AdministrationField::delete(Administration::route('projects.destroy', $project->id));
            } else {
                $action .= AdministrationField::restore(Administration::route('projects.destroy', $project->id));
            }


            return $action;
        });

        $request = $datatable->getRequest();
        $table->filter(function ($query) use ($request) {
            if ($request->has('search')) {
                $query->where('title', 'LIKE', '%' . $request->search['value'] . '%');
            }
        });
        $table->rawColumns(['active', 'action']);


        Administration::setTitle(trans('projects::admin.module_name'));
        Breadcrumbs::register('administration', function ($breadcrumbs) {
            $breadcrumbs->parent('base');
            $breadcrumbs->push(trans('projects::admin.module_name'));
        });

        return $table->generate();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create() {
        $form = new AdministrationForm();
        $form->route(Administration::route('projects.store'));
        $form->form(ProjectForm::class);

        Breadcrumbs::register('administration', function ($breadcrumbs) {
            $breadcrumbs->parent('base');
            $breadcrumbs->push(trans('projects::admin.module_name'), Administration::route('projects.index'));
            $breadcrumbs->push(trans('administration::admin.create'), Administration::route('projects.create'));
        });

        Administration::setTitle(trans('projects::admin.article') . ' - ' . trans('administration::admin.create'));

        return $form->generate();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreProjectRequest $request
     * @return Response
     */
    public function store(StoreProjectRequest $request) {
        $project = new Project();
        $project->fill($request->validated());
        $project->save();


//        if (!empty($request->file)) {
//            //delete all previous media
//            $old_media = $project->getMedia();
//            foreach ($old_media as $image) {
//                $image->delete();
//            }
//            $project->addMedia($request->file)->toMediaCollection();
//        }

        return redirect(Administration::route('projects.index'))->withSuccess([trans('administration::admin.success_create')]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param $project_id
     * @return Factory|View
     */
    public function edit($project_id) {
        $project = Project::withTrashed()->where('id', $project_id)->first();

        if (empty($project)) {
            return abort(404);
        }
        $form = new AdministrationForm();
        $form->route(Administration::route('projects.store'));
        $form->model($project);
        $form->route(Administration::route('projects.update', $project->id));
        $form->method('PUT');
        $form->form(ProjectForm::class);


        Breadcrumbs::register('administration', function ($breadcrumbs) {
            $breadcrumbs->parent('base');
            $breadcrumbs->push(trans('projects::admin.module_name'), Administration::route('projects.index'));
            $breadcrumbs->push(trans('administration::admin.edit'));
        });

        Administration::setTitle(trans('projects::admin.article') . ' - ' . trans('administration::admin.edit') . ' #' . $project->id);

        return $form->generate();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param $project_id
     * @param StoreProjectRequest $request
     * @return Response
     */
    public function update($project_id, StoreProjectRequest $request) {
        $project = Project::withTrashed()->where('id', $project_id)->first();

        if (empty($project)) {
            return abort(404);
        }

        $project->fill($request->validated());
        $project->save();

//        if (!empty($request->file)) {
//            //delete all previous media
//            $old_media = $project->getMedia();
//            foreach ($old_media as $image) {
//                $image->delete();
//            }
//            $project->addMedia($request->file)->toMediaCollection();
//        }

        return redirect(Administration::route('projects.index'))->withSuccess([trans('administration::admin.success_update')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy($id) {

        $project = Project::withTrashed()->where('id', $id)->first();
        if (!empty($project->deleted_at)) {
            $project->restore();
        } else {
            $project->delete();
        }


        return response()->json();
    }
}
