<?php

namespace Modules\RawMaterials\Repositories;

use Modules\Core\Repositories\BaseRepository;
use Modules\RawMaterials\Models\RawMaterialVariant;
use Modules\RawMaterials\Interfaces\RRawMaterialVariant\RawMaterialVariantRepositoryInterface;

class RawMaterialVariantRepository extends BaseRepository implements RawMaterialVariantRepositoryInterface
{
    // protected $model = RawMaterialVariant::class;
    public function __construct()
    {
        parent::__construct(new RawMaterialVariant());
    }
}
