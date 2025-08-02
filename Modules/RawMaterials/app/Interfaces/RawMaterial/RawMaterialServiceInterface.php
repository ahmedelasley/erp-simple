<?php

namespace Modules\RawMaterials\Interfaces\RawMaterial;
use Illuminate\Database\Eloquent\Builder;


interface RawMaterialServiceInterface
{
    public function all(array $filters = []): Builder;

    public function find($id);
    public function create(array $data);
    public function update($model, array $data);
    public function delete($model);
}
