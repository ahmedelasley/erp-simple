<?php

namespace Modules\RawMaterials\Repositories;

use Modules\Core\Repositories\BaseRepository;
use Modules\RawMaterials\Models\RawMaterialUnitConversion;
use Modules\RawMaterials\app\Interfaces\RawMaterialUnitConversion\RawMaterialUnitConversionRepositoryInterface;

class RawMaterialUnitConversionRepository extends BaseRepository implements RawMaterialUnitConversionRepositoryInterface
{
    // protected $model = RawMaterialUnitConversion::class;
    public function __construct()
    {
        parent::__construct(new RawMaterialUnitConversion());
    }
}
