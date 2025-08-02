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
        Schema::create('raw_material_variant_attributes', function (Blueprint $table) {
            $table->id();

            $table->foreignId('raw_material_variant_id')->nullable()->constrained('raw_material_variants')->onUpdate('cascade')->onDelete('set null');
            $table->foreignId('attribute_id')->nullable()->constrained('attributes')->onUpdate('cascade')->onDelete('set null');
            $table->foreignId('attribute_option_id')->nullable()->constrained('attribute_options')->onUpdate('cascade')->onDelete('set null');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('raw_material_variant_attributes');
    }
};
