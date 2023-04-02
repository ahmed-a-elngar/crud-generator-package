<?php

namespace Elngar\CrudGenerator\Console\Commands;

use Elngar\CrudGenerator\Services\Api\AuthControllerService;
use Elngar\CrudGenerator\Services\Api\AuthRoutesService;
use Elngar\CrudGenerator\Services\Generators\Api\FormRequestService;
use Elngar\CrudGenerator\Services\Generators\Api\ResourceService;
use Illuminate\Console\Command;

class MakeApiAuthCommand extends Command
{
    public $crud_name;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:rest-api-auth';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Rest Api Authentication Controller And Routes';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // prepare objects
        $this->construct();

        // create storeUserRequest
        $this->generateStoreFormRequest();

        // create UserResource
        $this->generateUserResource();
        
        // create AuthController
        $this->generateAuthController();
        
        // append auth routes
        $this->generateAuthRoutes();

        $this->info("Auth stablished successfully");
    }

    protected function construct()
    {
        $this->crud_name = ucfirst(strtolower('user'));
    }

    protected function generateStoreFormRequest()
    {
        $formRequestGenerator = new FormRequestService($this->crud_name, 'Store');
        $formRequestGenerator->checkAndCreateFile();
    }

    protected function generateUserResource()
    {
        $resourceGeerator = new ResourceService($this->crud_name);
        $resourceGeerator->checkAndCreateFile();
    }

    protected function generateAuthController()
    {
        AuthControllerService::checkAndCreateFile();
    }

    protected function generateAuthRoutes()
    {
        $routesGenerator = new AuthRoutesService();
        $routesGenerator->generate();
    }
}
