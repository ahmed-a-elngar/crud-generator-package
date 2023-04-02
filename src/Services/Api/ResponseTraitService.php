<?php

namespace Elngar\CrudGenerator\Services\Api;

use Elngar\CrudGenerator\Services\CopierService;

class ResponseTraitService extends CopierService
{
    const INJECT_PATH       =   "app/Http/Traits",
          DEFAULT_FILE      =   "ResponseTrait.php",
          DEFAULT_PATH      =   __DIR__ . '\..\..\Defaults\Api';
}