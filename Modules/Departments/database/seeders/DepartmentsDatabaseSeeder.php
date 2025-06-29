<?php

namespace Modules\Departments\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Departments\Models\Department;
use Illuminate\Support\Str;

class DepartmentsDatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $creator_type = 'Modules\AuthCore\Models\User';
        $creator_id = 1;

        $departments = [
            'الإدارة العامة',
            'الموارد البشرية',
            'الشؤون المالية',
            'المبيعات',
            'التسويق',
            'الإنتاج/العمليات',
            'تقنية المعلومات',
            'الشؤون القانونية',
            'البحث والتطوير',
            'المشتريات',
            'خدمة العملاء'
        ];

        $departmentIds = [];

        // $counter = 1;

        foreach ($departments as $name) {
            $department = Department::create([
                'name' => $name,
                // 'slug' => Str::slug($name),
                // 'code' => 'DEP-' . $counter++,
                'description' => $this->getDescription($name),
                'parent_id' => null,
                'creator_type' => $creator_type,
                'creator_id' => $creator_id
            ]);
            $departmentIds[$name] = $department->id;
        }

        $subDepartments = [
            'الموارد البشرية' => ['التوظيف', 'التدريب', 'العلاقات العمالية'],
            'الشؤون المالية' => ['المحاسبة', 'التدقيق', 'المرتبات'],
            'التسويق' => ['التسويق الرقمي', 'العلامة التجارية', 'بحوث السوق'],
            'الإنتاج/العمليات' => ['التخطيط', 'مراقبة الجودة', 'المستودعات'],
            'تقنية المعلومات' => ['الشبكات', 'الأنظمة', 'دعم المستخدمين'],
            'المبيعات' => ['المبيعات المحلية', 'المبيعات الدولية'],
            'الشؤون القانونية' => ['العقود', 'الامتثال', 'قضايا الشركات'],
            'خدمة العملاء' => ['الدعم الهاتفي', 'الدعم الفني', 'المراسلات'],
            'البحث والتطوير' => ['ابتكار المنتجات', 'تطوير النماذج الأولية'],
        ];

        foreach ($subDepartments as $parent => $subs) {
            foreach ($subs as $sub) {
                Department::create([
                    'name' => $sub,
                    // 'slug' => Str::slug($sub),
                    // 'code' => 'DEP-' . $counter++,
                    'description' => null,
                    'parent_id' => $departmentIds[$parent],
                    'creator_type' => $creator_type,
                    'creator_id' => $creator_id
                ]);
            }
        }
    }

    private function getDescription($name)
    {
        return match($name) {
            'الإدارة العامة' => 'التخطيط العام، اتخاذ القرارات الاستراتيجية',
            'الموارد البشرية' => 'التوظيف، العقود، التدريب، التقييم، الرواتب',
            'الشؤون المالية' => 'إعداد الميزانية، المرتبات، الفواتير، الضرائب',
            'المبيعات' => 'متابعة العملاء، إغلاق الصفقات',
            'التسويق' => 'الحملات الإعلانية، العلامة التجارية، دراسة السوق',
            'الإنتاج/العمليات' => 'إدارة سلسلة التوريد، التصنيع، مراقبة الجودة',
            'تقنية المعلومات' => 'البنية التحتية التقنية، الدعم الفني، الأمن السيبراني',
            'الشؤون القانونية' => 'إدارة العقود، القضايا القانونية، السياسات',
            'البحث والتطوير' => 'تطوير المنتجات، الابتكار',
            'المشتريات' => 'شراء المواد والخدمات من الموردين',
            'خدمة العملاء' => 'دعم العملاء، تلقي الشكاوى والاستفسارات',
            default => null
        };
    }
}
