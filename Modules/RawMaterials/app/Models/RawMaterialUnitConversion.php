<?php

namespace Modules\RawMaterials\Models;

use Modules\Core\Models\BaseModel;


class RawMaterialUnitConversion extends BaseModel
{
    protected $table = 'raw_material_unit_conversions';
    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'from_unit_id',
        'to_unit_id',
        'conversion_factor',
    ];

    protected $casts = [
    'conversion_factor' => 'decimal:4',
    ];

    /**
     * Relationship with the from unit (RawMaterialUnit).
     */
    public function fromUnit()
    {
        return $this->belongsTo(RawMaterialUnit::class, 'from_unit_id');
    }

    /**
     * Relationship with the to unit (RawMaterialUnit).
     */
    public function toUnit()
    {
        return $this->belongsTo(RawMaterialUnit::class, 'to_unit_id');
    }

}
