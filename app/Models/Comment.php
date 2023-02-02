<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class Comment extends CrudModel
{
    use HasFactory;

    public function getResourceCollection(): ResourceCollection
    {
        return new ResourceCollection([]);
    }

    public function getResource(): JsonResource
    {
        return new JsonResource([]);
    }

    public function getCreateValidationRules(): array
    {
        return [
            'body' => 'required|string',
            'post_id' => 'required|integer',
            'user_id' => 'required|integer'
        ];
    }

    public function getUpdateValidationRules(): array
    {
        return [
            'body' => 'required|string',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }
}
