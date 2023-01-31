<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

abstract class CrudModel extends Model
{
    use HasFactory;

    public function __construct(protected array $requestPayload, array $attributes = [])
    {
        parent::__construct($attributes);
    }

    public function create(): JsonResource
    {
        // create

        return $this->getResource();
    }

    public function put(): JsonResource
    {
        // edit

        return $this->getResource();
    }

    abstract public function getResourceCollection(): ResourceCollection;

    abstract public function getResource(): JsonResource;

    abstract public function getCreateValidationRules(): array;

    abstract public function getUpdateValidationRules(): array;
}
