<?php

namespace Elngar\CrudGenerator\Services\Generators;

use Elngar\CrudGenerator\Services\AppenderService;
use Illuminate\Support\Facades\File;

class RoutesService extends AppenderService
{
    protected $usage, $routes;

    public function generate()
    {
        $this->prepareNewContent();
        $this->append();
    }

    protected function prepareNewContent()
    {
        $this->usage  = str_replace('ControllerName', $this->crud_name . 'Controller', File::get(__DIR__ . "\..\..\Defaults\Api\Usage.php"));
        $this->routes = str_replace('ControllerName', $this->crud_name . 'Controller', File::get(__DIR__ . "\..\..\Defaults\Api\Routes.php"));
        $this->routes = str_replace('ModelName', strtolower($this->crud_name), $this->routes);
    }

    protected function append()
    {
        (new self)->appendFromText($this->usage, "routes/api.php", ";");
        (new self)->appendFromText($this->routes, "routes/api.php", ";", false);
    }
}
