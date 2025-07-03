<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Modules\Attendances\Enums\AttendanceStatus;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->nullable()->constrained()->onUpdate('cascade')->onDelete('set null');

            $table->dateTime('check_in');
            $table->dateTime('check_out');
            $table->decimal('hours_worked', 8,2);
            $table->date('date');

            $table->enum('status',array_column(AttendanceStatus::cases(), 'value'))
                ->default(AttendanceStatus::cases()[0]->value)
                // ->default(EmployeeStatus::Active->value)
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
        Schema::dropIfExists('attendances');
    }
};
