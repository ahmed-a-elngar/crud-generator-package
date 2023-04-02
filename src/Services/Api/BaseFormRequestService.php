<?php

namespace Elngar\CrudGenerator\Services\Api;

use Elngar\CrudGenerator\Services\CopierService;

class BaseFormRequestService extends CopierService
{
    const INJECT_PATH       =   "app/Http/Requests/Api",
        DEFAULT_FILE        =   "BaseFormRequest.php",
        DEFAULT_PATH        =   __DIR__ . '\..\..\Defaults\Api\Base';
}