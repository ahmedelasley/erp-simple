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
        Schema::create('journal_entry_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('journal_entry_id')->nullable()->constrained('journal_entries')->onUpdate('cascade')->onDelete('set null'); // foreign key to journal_entries table
            $table->foreignId('account_id')->nullable()->constrained('accounts')->onUpdate('cascade')->onDelete('set null'); // foreign key to accounts table
            $table->foreignId('cost_center_id')->nullable()->constrained('cost_centers')->onUpdate('cascade')->onDelete('set null'); // foreign key to cost_centers table

            $table->decimal('debit', 15, 3)->default(0);
            $table->decimal('credit', 15, 3)->default(0);

            $table->text('description')->nullable();
            
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
        Schema::dropIfExists('journal_entry_items');
    }
};
