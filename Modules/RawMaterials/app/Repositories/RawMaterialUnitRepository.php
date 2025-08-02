<?php

namespace Modules\RawMaterials\Repositories;

use Modules\Core\Repositories\BaseRepository;
use Modules\RawMaterials\Models\RawMaterialUnit;
use Modules\RawMaterials\app\Interfaces\RawMaterialUnit\RawMaterialUnitRepositoryInterface;

class RawMaterialUnitRepository extends BaseRepository implements RawMaterialUnitRepositoryInterface
{
    // protected $model = Attribute::class;
    public function __construct()
    {
        parent::__construct(new RawMaterialUnit());
    }
}
