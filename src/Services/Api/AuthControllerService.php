<?php

namespace Elngar\CrudGenerator\Services\Api;

use Elngar\CrudGenerator\Services\CopierService;

class AuthControllerService extends CopierService
{
    const INJECT_PATH       =   "app/Http/Controllers/Api",
          DEFAULT_FILE      =   "AuthController.php",
          DEFAULT_PATH      =   __DIR__ . '\..\..\Defaults\Api\Auth';
}