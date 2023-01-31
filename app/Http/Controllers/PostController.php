<?php

namespace App\Http\Controllers;

use App\Models\CrudModel;
use App\Models\Post;

class PostController extends CrudController
{
    protected function getModel(array $requestPayload): CrudModel
    {
        if ($requestPayload['id'] === false) {
            return new Post($requestPayload);
        }
        return Post::find($requestPayload['id']);
    }
}
