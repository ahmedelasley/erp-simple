<?php

namespace Modules\RawMaterials\Models;

use Modules\Categories\Models\Category;
use Modules\Core\Enums\StatusEnum;
use Modules\Core\Models\BaseModel;

class RawMaterial extends BaseModel
{

    protected $table = 'raw_materials';
    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'code',
        'name',
        'slug',
        'description',
        'main_image',
        'status',
        'category_id'
    ];

    protected $casts = [
        'status' => StatusEnum::class,
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
        'deleted_at' => 'datetime:Y-m-d H:i:s',
    ];

    /**
     * Relationship with Category.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Relationship with RawMaterialUnit.
     */
    public function units()
    {
        return $this->hasMany(RawMaterialUnit::class);
    }

    /**
     * Relationship with RawMaterialVariant.
     */
    public function variants()
    {
        return $this->hasMany(RawMaterialVariant::class);
    }

    /**
     * Relationship with RawMaterialUnitConversion.
     */
    public function unitConversions()
    {
        return $this->hasManyThrough(
            RawMaterialUnitConversion::class,
            RawMaterialUnit::class,
            'raw_material_id', // Foreign key on RawMaterialUnit
            'from_unit_id',    // Foreign key on RawMaterialUnitConversion
            'id',              // Local key on RawMaterial
            'unit_id'          // Local key on RawMaterialUnit
        );
    }

}
