<?php

namespace App\Http\Controllers;

use App\Models\CrudModel;
use App\Models\File;

class FileController extends CrudController
{
    protected function getModel(array $requestPayload): CrudModel
    {
        if ($requestPayload['id'] === false) {
            return new File($requestPayload);
        }
        return File::find($requestPayload['id']);
    }
}
