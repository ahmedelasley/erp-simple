<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\JournalEntries\Enums\JournalEntryStatus;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('journal_entries', function (Blueprint $table) {
            $table->id();
            $table->string('entry_number')->unique();
            $table->date('date');
            $table->text('description')->nullable();

            $table->nullableMorphs('reference'); // reference_type + reference_id

            $table->enum('status',array_column(JournalEntryStatus::cases(), 'value'))
                ->default(JournalEntryStatus::cases()[0]->value)
                ->index();
            $table->foreignId('fiscal_year_id')->nullable()->constrained('fiscal_years')->onUpdate('cascade')->onDelete('set null'); // foreign key to account_types table
            $table->dateTime('posted_at');

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
        Schema::dropIfExists('journal_entries');
    }
};
