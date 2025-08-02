<?php

namespace Modules\RawMaterials\Models;

use Modules\Core\Models\BaseModel;


class RawMaterialVariant extends BaseModel
{
    protected $table = 'raw_material_variants';
    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'raw_material_id',
        'code',
        'default_unit_cost',
    ];

    protected $casts = [
        'default_unit_cost' => 'decimal:4',
    ];


    /**
     * Relationship with RawMaterial.
     */
    public function rawMaterial()
    {
        return $this->belongsTo(RawMaterial::class);
    }

    /**
     * Relationship with RawMaterialVariantAttribute.
     */
    public function attributes()
    {
        return $this->hasMany(RawMaterialVariantAttribute::class);
    }

}
