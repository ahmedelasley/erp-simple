<?php

namespace Modules\RawMaterials\Models;

use Modules\Core\Models\BaseModel;
use Modules\Attributes\Models\AttributeOption;


class RawMaterialUnit extends BaseModel
{

    protected $table = 'raw_material_units';
    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'raw_material_id',
        'unit_id',
        'is_primary_unit',
    ];

    /**
     * Relationship with RawMaterial.
     */
    public function rawMaterial()
    {
        return $this->belongsTo(RawMaterial::class);
    }

    /**
     * Relationship with Unit.
     */
    public function unit()
    {
        return $this->belongsTo(AttributeOption::class, 'unit_id');
    }

}
