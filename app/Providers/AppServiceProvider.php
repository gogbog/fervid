<?php

namespace App\Providers;

use App\Modules\Projects\Models\Project;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->bindOrFail(Project::class, 'project');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //

    }

    private function bindOrFail($class, $param) {
        $this->app->bind($class, function () use ($param, $class) {
            $model_id = request()->route($param);

            if (empty($model_id)) {
                return $model_id;
            }

            try {
                $class = new $class;
                $model = ($class)->findOrFail($model_id);
            } catch (ModelNotFoundException $exception) {
                throw new HttpResponseException(response()->json(['errors' => ['Resource not found.']
                ], JsonResponse::HTTP_BAD_REQUEST));
            }

            return $model;
        });
    }
}
