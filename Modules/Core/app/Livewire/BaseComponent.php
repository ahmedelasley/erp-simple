<?php

namespace Modules\Core\Livewire;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Core\Database\Factories\../Livewire/BaseComponentFactory;

class BaseComponent extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    // protected static function newFactory(): ../Livewire/BaseComponentFactory
    // {
    //     // return ../Livewire/BaseComponentFactory::new();
    // }
}
