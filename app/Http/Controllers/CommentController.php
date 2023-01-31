<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\CrudModel;

class CommentController extends CrudController
{
    protected function getModel(array $requestPayload): CrudModel
    {
        if ($requestPayload['id'] === false) {
            return new Comment($requestPayload);
        }
        return Comment::find($requestPayload['id']);
    }
}
