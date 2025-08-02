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
        Schema::create('raw_material_unit_conversions', function (Blueprint $table) {
            $table->id();

            $table->foreignId('from_unit_id')->nullable()->constrained('raw_material_units')->onUpdate('cascade')->onDelete('set null');
            $table->foreignId('to_unit_id')->nullable()->constrained('raw_material_units')->onUpdate('cascade')->onDelete('set null');
            $table->decimal('conversion_factor', 10, 4)->default(1);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('raw_material_unit_conversions');
    }
};
