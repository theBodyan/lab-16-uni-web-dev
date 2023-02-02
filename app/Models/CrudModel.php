<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Validator as ValidatorInstance;

abstract class CrudModel extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected ?ValidatorInstance $validator = null;

    public function __construct(protected array $requestPayload, array $attributes = [])
    {
        parent::__construct($attributes);
    }

    public function create(): JsonResource
    {
        $newModel = new static(array_intersect_key($this->requestPayload, $this->getCreateValidationRules()));

        return $newModel->getResource();
    }

    public function put(): JsonResource
    {
        $this->update(array_intersect_key($this->requestPayload, $this->getCreateValidationRules()));

        return $this->getResource();
    }

    public function createValidationFails(): bool
    {
        $this->validator = Validator::make($this->requestPayload, $this->getCreateValidationRules());
        return $this->validator->fails();
    }

    public function updateValidationFails(): bool
    {
        $this->validator = Validator::make($this->requestPayload, $this->getUpdateValidationRules());
        return $this->validator->fails();
    }

    public function getValidationErrors(): ?array
    {
        return $this->validator?->getMessageBag()->getMessages();
    }

    abstract public function getResourceCollection(): ResourceCollection;

    abstract public function getResource(): JsonResource;

    abstract public function getCreateValidationRules(): array;

    abstract public function getUpdateValidationRules(): array;
}
