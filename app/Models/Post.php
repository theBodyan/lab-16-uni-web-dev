<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class Post extends CrudModel
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
            'title' => 'required|string',
            'body' => 'required|string',
            'topic_id' => 'required|integer',
            'icon_id' => 'integer'
        ];
    }

    public function getUpdateValidationRules(): array
    {
        return [
            'title' => 'required_without:body,icon_id|string',
            'body' => 'required_without:title,icon_id|string',
            'icon_id' => 'required_without:title,body|integer'
        ];
    }

    public function topic(): BelongsTo
    {
        return $this->belongsTo(Topic::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(File::class);
    }
}
