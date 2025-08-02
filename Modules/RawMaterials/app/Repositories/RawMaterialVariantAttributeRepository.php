<?php

namespace Modules\RawMaterials\Repositories;

use Modules\Core\Repositories\BaseRepository;
use Modules\RawMaterials\Models\RawMaterialVariantAttribute;
use Modules\RawMaterials\Interfaces\RawMaterialVariantAttribute\RawMaterialVariantAttributeRepositoryInterface;

class RawMaterialVariantAttributeRepository extends BaseRepository implements RawMaterialVariantAttributeRepositoryInterface
{
    // protected $model = RawMaterialVariantAttribute::class;
    public function __construct()
    {
        parent::__construct(new RawMaterialVariantAttribute());
    }
}
