<?php

namespace App\Providers;
use Illuminate\Support\Facades\File;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
         //getting all Models
         $files = File::allFiles(app_path('/Models'));
         $models = collect($files)->map(function ($file) {
             return basename($file, '.php');
         });

         $models = $models->merge($this->getCustomModels());

         foreach($models as $model){
             $this->app->bind("App\Repositories\Contracts\\{$model}RepositoryInterface", "App\Repositories\SQL\\{$model}Repository");
         }
    }

    private function getCustomModels(): array {
        return [
            'Permission',
        ];
    }
}
