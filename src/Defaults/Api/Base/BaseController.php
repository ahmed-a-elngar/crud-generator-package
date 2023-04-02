<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\Api\BaseFormRequest;

abstract class BaseController extends Controller
{
    use ResponseTrait;
    public function __construct(protected $model = null, protected $resource = null)
    {
        
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->sendResponse('successfully retrived', $this->resource::collection($this->model::all()));
    }

    public function show(int $id)
    {
        return $this->sendResponse('successfully retrived', new $this->resource($this->model::find($id)) );
    }

    protected function protectedStore(BaseFormRequest $request)
    {
        $instance   =   $this->model::create([
                        $request->validated()
                    ]);

        return $this->sendResponse('successfully created', new $this->resource($instance));
    }

    /**
     * Update the specified resource in storage.
     */
    protected function protectedUpdate(BaseFormRequest $request, int $id)
    {
        $instance = $this->model::find($id);

        $instance->update([
                        $request->validated()
                    ]);

        return $this->sendResponse('successfully updated', new $this->resource($instance));
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $currentInstance = $this->model::find($id);

        if (is_null($currentInstance)) {
            return $this->sendError('validation error', ['id'   =>  'un exists'], Response::HTTP_BAD_REQUEST);
        }

        $currentInstance->delete();

        return $this->sendResponse('successfully deleted');
    }
}
