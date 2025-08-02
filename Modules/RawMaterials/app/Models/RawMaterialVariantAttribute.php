<?php

namespace Modules\RawMaterials\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\RawMaterials\Database\Factories\RawMaterialVariantAttributeFactory;

class RawMaterialVariantAttribute extends Model
{
    protected $table = 'raw_material_variant_attributes';
    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'raw_material_variant_id',
        'attribute_id',
        'attribute_option_id',
    ];


    /**
     * Relationship with RawMaterialVariant.
     */
    public function variant()
    {
        return $this->belongsTo(RawMaterialVariant::class, 'raw_material_variant_id');
    }

}
