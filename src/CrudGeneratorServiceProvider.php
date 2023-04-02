<?php

namespace Elngar\CrudGenerator;

use Illuminate\Support\ServiceProvider;

class CrudGeneratorServiceProvider extends ServiceProvider
{
    public function boot()
    {

    }

    public function register()
    {
        $this->commands([
            'Elngar\CrudGenerator\Console\Commands\MakeApiCrudCommand',
            'Elngar\CrudGenerator\Console\Commands\MakeApiAuthCommand',
            'Elngar\CrudGenerator\Console\Commands\MakeApiBaseCommand',
        ]);
    }
}
