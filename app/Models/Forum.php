<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class Forum extends CrudModel
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
            'description' => 'required|string',
            'icon_id' => 'integer'
        ];
    }

    public function getUpdateValidationRules(): array
    {
        return [
            'name' => 'required_without:description|string',
            'description' => 'required_without:name|string',
            'icon_id' => 'required_without:title,body|integer'
        ];
    }

    public function topics(): HasMany
    {
        return $this->hasMany(Topic::class);
    }

    public function icon(): HasOne
    {
        return $this->hasOne(File::class);
    }
}
