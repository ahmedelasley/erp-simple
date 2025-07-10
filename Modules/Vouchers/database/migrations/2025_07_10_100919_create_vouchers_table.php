<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\Vouchers\Enums\VoucherType;
use Modules\Vouchers\Enums\VoucherStatus;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('vouchers', function (Blueprint $table) {
            $table->id();
            $table->string('voucher_number')->unique();
            $table->enum('type',array_column(VoucherType::cases(), 'value'))
                ->default(VoucherType::cases()[0]->value)
                ->index();
            $table->date('date');
            $table->decimal('amount', 15, 3)->default(0);
            $table->string('reference_number')->unique();

            $table->text('description')->nullable();


            $table->enum('status',array_column(VoucherStatus::cases(), 'value'))
                ->default(VoucherStatus::cases()[0]->value)
                ->index();


            $table->foreignId('fiscal_year_id')->nullable()->constrained('fiscal_years')->onUpdate('cascade')->onDelete('set null'); // foreign key to account_types table

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
        Schema::dropIfExists('vouchers');
    }
};
