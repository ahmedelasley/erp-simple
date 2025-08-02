<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('raw_material_units', function (Blueprint $table) {
            $table->id();

            $table->foreignId('raw_material_id')->nullable()->constrained('raw_materials')->onUpdate('cascade')->onDelete('set null');
            $table->foreignId('unit_id')->nullable()->constrained('attribute_options')->onUpdate('cascade')->onDelete('set null');
            $table->boolean('is_primary_unit')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('raw_material_units');
    }
};
