<?php

namespace App\Http\Controllers;

use App\Models\CrudModel;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

abstract class CrudController extends Controller
{
    use AuthorizesRequests;
    use DispatchesJobs;
    use ValidatesRequests;

    protected CrudModel $model;

    public function __construct(Request $request)
    {
        $requestPayload = $request->all();
        $requestPayload['id'] = $request->route()->parameter('id', false);
        if ($requestPayload['id'] !== false) {
            $requestPayload['id'] = (int)$requestPayload['id'];
        }
        $this->model = $this->getModel($requestPayload);
    }

    public function getAll(): JsonResponse
    {
        return response()->json(['data' => $this->model->getResourceCollection()]);
    }

    public function create(): JsonResponse
    {
        return response()->json([$this->getModelName() => $this->model->create()], 201);
    }

    public function get(): JsonResponse
    {
        return response()->json([$this->getModelName() => $this->model->getResource()]);
    }

    public function update(): JsonResponse
    {
        return response()->json([$this->getModelName() => $this->model->put()]);
    }

    public function delete(): JsonResponse
    {
        if ($this->model->delete() === true) {
            return response()->json([], 204);
        }

        return response()->json();
    }

    protected function getModelName(): string
    {
        return lcfirst(get_class($this->model));
    }

    abstract protected function getModel(array $requestPayload): CrudModel;
}
