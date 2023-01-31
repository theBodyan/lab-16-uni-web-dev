<?php

namespace App\Http\Controllers;

use App\Models\CrudModel;
use App\Models\File;
use App\Models\Forum;

class ForumController extends CrudController
{
    protected function getModel(array $requestPayload): CrudModel
    {
        if ($requestPayload['id'] === false) {
            return new Forum($requestPayload);
        }
        return Forum::find($requestPayload['id']);
    }
}
