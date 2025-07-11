<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\ChartOfAccounts\Enums\AccountCategory;
use Modules\ChartOfAccounts\Enums\AccountLevel;
use Modules\ChartOfAccounts\Enums\AccountStatus;
use Modules\ChartOfAccounts\Enums\AccountType;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('name');
            $table->text('description')->nullable();

            // $table->foreignId('type_id')->nullable()->constrained('account_types')->onUpdate('cascade')->onDelete('set null'); // foreign key to account_types table
            $table->foreignId('parent_id')->nullable()->constrained('accounts')->onUpdate('cascade')->onDelete('set null'); // self-referencing foreign key
            $table->enum('type',array_column(AccountType::cases(), 'value'))
                ->default(AccountType::cases()[0]->value)
                ->index();
            $table->enum('level',array_column(AccountLevel::cases(), 'value'))
                ->default(AccountLevel::cases()[0]->value)
                ->index();

            $table->enum('category',array_column(AccountCategory::cases(), 'value'))
                ->default(AccountCategory::cases()[0]->value)
                ->index();

            $table->enum('status',array_column(AccountStatus::cases(), 'value'))
                ->default(AccountStatus::cases()[0]->value)
                ->index();

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
        Schema::dropIfExists('accounts');
    }
};
