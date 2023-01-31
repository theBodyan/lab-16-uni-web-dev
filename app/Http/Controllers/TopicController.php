<?php

namespace App\Http\Controllers;

use App\Models\CrudModel;
use App\Models\Forum;
use App\Models\Topic;

class TopicController extends CrudController
{
    protected function getModel(array $requestPayload): CrudModel
    {
        if ($requestPayload['id'] === false) {
            return new Topic($requestPayload);
        }
        return Topic::find($requestPayload['id']);
    }
}
