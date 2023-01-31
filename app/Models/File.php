<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class File extends CrudModel
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
        return [];
    }

    public function getUpdateValidationRules(): array
    {
        return [];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
