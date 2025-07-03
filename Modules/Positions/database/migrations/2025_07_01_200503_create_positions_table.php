<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Modules\Positions\Enums\PositionLevel;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('positions', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique()->nullable();
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->enum('level',array_column(PositionLevel::cases(), 'value'))
                    ->default(PositionLevel::cases()[0]->value)
                    // ->default(EmployeeStatus::Active->value)
                    ->index();

            $table->foreignId('department_id')->nullable()->constrained()->onUpdate('cascade')->onDelete('set null');

            // ✅ Polymorphic Relations for auditing
            $table->morphs('creator'); // creator_type, creator_id
            $table->nullableMorphs('editor'); // editor_type, editor_id
            $table->nullableMorphs('deletor'); // => deletor_type, deletor_id
            $table->timestamps();
            $table->softDeletes(); // ✅ Soft delete support
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('positions');
    }
};
