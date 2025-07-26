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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();

            $table->string('code')->unique()->nullable();
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->foreignId('parent_id')->nullable()->constrained('categories')->onUpdate('cascade')->onDelete('set null');

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
        Schema::dropIfExists('categories');
    }
};
