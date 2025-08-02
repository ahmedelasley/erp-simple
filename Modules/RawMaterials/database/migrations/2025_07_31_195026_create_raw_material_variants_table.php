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
        Schema::create('raw_material_variants', function (Blueprint $table) {
            $table->id();

            $table->foreignId('raw_material_id')->nullable()->constrained('raw_materials')->onUpdate('cascade')->onDelete('set null');
            $table->string('code')->unique(); // مثل: RMC-RED-LT-150
            $table->decimal('default_unit_cost', 10, 2)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('raw_material_variants');
    }
};
