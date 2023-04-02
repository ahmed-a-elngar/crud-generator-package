<?php
namespace Elngar\CrudGenerator\Services\Api;

use Elngar\CrudGenerator\Services\AppenderService;

    class AuthRoutesService extends AppenderService
    {
        public function generate()
        {
            (new self)->appendFromFile(__DIR__."\..\..\Defaults\Api\Auth\Routes\usage.php", "routes/api.php", ";");
            (new self)->appendFromFile(__DIR__."\..\..\Defaults\Api\Auth\Routes\api.php", "routes/api.php", ";", false);
        }
    }