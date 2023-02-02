<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class Topic extends CrudModel
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
            'name' => 'required|string',
            'forum_id' => 'required|integer',
            'icon_id' => 'required|integer',
        ];
    }

    public function getUpdateValidationRules(): array
    {
        return [
            'name' => 'required_without:forum_id,icon_id|string',
            'forum_id' => 'required_without:name,icon_id|integer',
            'icon_id' => 'required_without:name,forum_id|integer'
        ];
    }

    public function forum(): BelongsTo
    {
        return $this->belongsTo(Forum::class);
    }

    public function icon(): HasOne
    {
        return $this->hasOne(File::class);
    }
}
