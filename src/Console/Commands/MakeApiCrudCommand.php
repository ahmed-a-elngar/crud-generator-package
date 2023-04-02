<?php

namespace Elngar\CrudGenerator\Console\Commands;

use Elngar\CrudGenerator\Services\Generators\Api\ControllerService;
use Elngar\CrudGenerator\Services\Generators\Api\FormRequestService;
use Elngar\CrudGenerator\Services\Generators\Api\ResourceService;
use Elngar\CrudGenerator\Services\Generators\ModelService;
use Elngar\CrudGenerator\Services\Generators\RoutesService;
use Illuminate\Console\Command;

class MakeApiCrudCommand extends Command
{
    public $crud_name;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:rest-api-crud {crud_name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create A Rest Api Crud';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->construct();
        
        $this->generateModel();

        $this->generateStoreFromRequest();

        $this->generateUpdateFromRequest();

        $this->generateResource();

        $this->generateController();
        
        $this->generateRoutes();

        $this->info('crud stablished successfully');
    }

    protected function construct()
    {
        $this->crud_name = ucfirst(strtolower($this->argument('crud_name')));
    }

    protected function generateModel()
    {
        $modelGenerator = new ModelService($this->crud_name);
        $modelGenerator->checkAndCreateFile();
    }

    protected function generateStoreFromRequest()
    {
        $formRequestGenerator = new FormRequestService($this->crud_name, 'Store');
        $formRequestGenerator->checkAndCreateFile();
    }

    protected function generateUpdateFromRequest()
    {
        $formRequestGenerator = new FormRequestService($this->crud_name, 'Update');
        $formRequestGenerator->checkAndCreateFile();
    }

    protected function generateResource()
    {
        $resourceGenerator = new ResourceService($this->crud_name);
        $resourceGenerator->checkAndCreateFile();
    }

    protected function generateController()
    {
        $controllerGenerator = new ControllerService($this->crud_name);
        $controllerGenerator->checkAndCreateFile();
    }

    protected function generateRoutes()
    {
        $routesGenerator = new RoutesService($this->crud_name);
        $routesGenerator->generate();
    }
}
