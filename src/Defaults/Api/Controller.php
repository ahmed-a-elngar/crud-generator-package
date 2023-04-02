<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\StoreRequestName;
use App\Http\Requests\Api\UpdateRequestName;
use App\Http\Resources\ResourceName;
use App\Models\ModelName;
use App\Http\Controllers\Api\BaseController;

class ClassName extends BaseController
{
    protected $model = ModelName::class;
    protected $resource = ResourceName::class;

    public function store(StoreRequestName $request)
    {
        $this->protectedStore($request);
    }

    public function update(UpdateRequestName $request, int $id)
    {
        $this->protectedUpdate($request, $id);
    }
}
