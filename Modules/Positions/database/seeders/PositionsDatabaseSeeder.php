<?php

namespace Modules\Positions\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Positions\Models\Position;
use Modules\Departments\Models\Department;
use Illuminate\Support\Str;
use Modules\Positions\Enums\PositionLevel;

class PositionsDatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $creator_type = 'Modules\AuthCore\Models\User';
        $creator_id = 1;

        $positions = [
            'الموارد البشرية' => [
                ['name' => 'مدير الموارد البشرية', 'level' => PositionLevel::MANAGER],
                ['name' => 'مسؤول توظيف', 'level' => PositionLevel::MID],
                ['name' => 'موظف شؤون الموظفين', 'level' => PositionLevel::JUNIOR],
            ],
            'الشؤون المالية' => [
                ['name' => 'مدير مالي', 'level' => PositionLevel::MANAGER],
                ['name' => 'محاسب أول', 'level' => PositionLevel::SENIOR],
                ['name' => 'مسؤول رواتب', 'level' => PositionLevel::MID],
            ],
            'الإنتاج/العمليات' => [
                ['name' => 'مشرف إنتاج', 'level' => PositionLevel::LEAD],
                ['name' => 'فني جودة', 'level' => PositionLevel::JUNIOR],
                ['name' => 'مهندس تصنيع', 'level' => PositionLevel::MID],
            ],
            'التسويق' => [
                ['name' => 'مدير تسويق', 'level' => PositionLevel::MANAGER],
                ['name' => 'مصمم إعلانات', 'level' => PositionLevel::MID],
                ['name' => 'محلل سوق', 'level' => PositionLevel::MID],
            ],
            'تقنية المعلومات' => [
                ['name' => 'مدير IT', 'level' => PositionLevel::MANAGER],
                ['name' => 'مطور نظم', 'level' => PositionLevel::SENIOR],
                ['name' => 'مسؤول شبكات', 'level' => PositionLevel::MID],
            ],
        ];

        $counter = 1;

        foreach ($positions as $departmentName => $positionsArray) {

            $department = Department::where('name', $departmentName)->first();

            if (!$department) {
                $this->command->warn("القسم '$departmentName' غير موجود، تخطيت إضافة المناصب الخاصة به.");
                continue;
            }

            foreach ($positionsArray as $positionData) {
                Position::firstOrCreate(
                    [
                        'name' => $positionData['name'],
                        'department_id' => $department->id
                    ],
                    [
                        'slug' => Str::slug($positionData['name']),
                        'code' => 'POS-' . $counter++,
                        'level' => $positionData['level']->value,
                        'creator_type' => $creator_type,
                        'creator_id' => $creator_id
                    ]
                );
            }
        }
    }
}
