<?php

namespace Elngar\CrudGenerator\Services\Api;

use Elngar\CrudGenerator\Services\CopierService;

class BaseControllerService extends CopierService
{
    const INJECT_PATH       =   "app/Http/Controllers/Api",
          DEFAULT_FILE      =   "BaseController.php",
          DEFAULT_PATH      =   __DIR__ . '\..\..\Defaults\Api\Base';
}