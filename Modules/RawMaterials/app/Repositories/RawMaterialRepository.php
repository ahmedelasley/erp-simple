<?php

namespace Modules\RawMaterials\Repositories;

use Modules\RawMaterials\Models\RawMaterial;
use Modules\Core\Repositories\BaseRepository;
use Modules\RawMaterials\Interfaces\RawMaterial\RawMaterialRepositoryInterface;

class RawMaterialRepository extends BaseRepository implements RawMaterialRepositoryInterface
{
    // protected $model = RawMaterial::class;
    public function __construct()
    {
        parent::__construct(new RawMaterial());
    }
}
