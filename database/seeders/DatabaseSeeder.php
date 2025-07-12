<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Modules\Departments\Database\Seeders\DepartmentsDatabaseSeeder;
use Modules\ChartOfAccounts\Database\Seeders\ChartOfAccountsDatabaseSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            // DepartmentsDatabaseSeeder::class,
            ChartOfAccountsDatabaseSeeder::class,
        ]);

    }
}
