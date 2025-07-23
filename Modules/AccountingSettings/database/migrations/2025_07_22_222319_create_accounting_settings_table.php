<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Modules\AccountingSettings\Enums\AccountingSettingType;
use Modules\AccountingSettings\Enums\AccountingSettingDataType;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('accounting_settings', function (Blueprint $table) {
            $table->id();

            $table->string('key')->unique();
            $table->json('value')->nullable();
            $table->json('default_value')->nullable()->comment('Default Value');

            $table->string('description')->nullable()->comment('Description'); // Description
            $table->string('icon')->nullable()->comment('icon'); // Name

            $table->enum('data_type',array_column(AccountingSettingDataType::cases(), 'value'))
                ->default(AccountingSettingDataType::cases()[0]->value)
                ->index();

            $table->enum('type',array_column(AccountingSettingType::cases(), 'value'))
                ->default(AccountingSettingType::cases()[0]->value)
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
        Schema::dropIfExists('accounting_settings');
    }
};
