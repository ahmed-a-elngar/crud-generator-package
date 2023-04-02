<?php

namespace Elngar\CrudGenerator\Console\Commands;

use Elngar\CrudGenerator\Services\Api\BaseControllerService;
use Elngar\CrudGenerator\Services\Api\BaseFormRequestService;
use Elngar\CrudGenerator\Services\Api\ResponseTraitService;

use Illuminate\Console\Command;

class MakeApiBaseCommand extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:rest-api-base';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Rest Api Base trait, controller, form request';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->generateTraits();
        $this->generateFormRequest();
        $this->generateController();
        $this->info("Base stablished successfully");
    }

    protected function generateTraits()
    {
        ResponseTraitService::checkAndCreateFile();
    }

    protected function generateFormRequest()
    {
        BaseFormRequestService::checkAndCreateFile();
    }

    protected function generateController()
    {
        BaseControllerService::checkAndCreateFile();
    }

}
