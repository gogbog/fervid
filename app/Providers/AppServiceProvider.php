<?php

namespace App\Providers;

use App\Modules\Projects\Models\Project;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {

        $this->app->bind(Project::class, function () {
            $model_id = (int)request()->route('project');
            $class = new Project();

            if (empty($model_id)) {
                $model_id = request()->route('project_slug');
                $model = ($class)->withTrashed()->where('slug', $model_id)->first();

            } else {
                $model = ($class)->withTrashed()->where('id', $model_id)->first();
            }
//            if (empty($model)) {
//                return abort(404);
//            }
            return $model;
        });

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {
        //

    }

//    private function bindOrFail($class, $param) {
//        $this->app->bind($class, function () use ($param, $class) {
//            $model_id = request()->route($param);
//
//            if (empty($model_id)) {
//                return $model_id;
//            }
//
//            $class = new $class;
//            $model = ($class)->where('slug', $model_id)->first();
//            if (empty($model)) {
//                return abort(404);
//            }
//            dd($model);
//            return $model;
//        });
//    }
}
