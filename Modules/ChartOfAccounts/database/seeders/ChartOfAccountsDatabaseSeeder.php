<?php

namespace Modules\ChartOfAccounts\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\ChartOfAccounts\Models\Account;
use Modules\ChartOfAccounts\Services\GenerateAccountCodeService;
use Modules\ChartOfAccounts\Enums\AccountType;
class ChartOfAccountsDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        $creator_type = 'Modules\AuthCore\Models\User';
        $creator_id = 1;

        // $rootAccounts = [
        //     'Assets' => [
        //         'Cash' => ['Main Safe', 'Bank Account'],
        //         'Accounts Receivable' => ['Client A', 'Client B'],
        //         'Inventory' => ['Raw Materials', 'Finished Goods']
        //     ],
        //     'Liabilities' => [
        //         'Cash' => ['Main Safe', 'Bank Account'],
        //         'Accounts Receivable' => ['Client A', 'Client B'],
        //         'Inventory' => ['Raw Materials', 'Finished Goods']
        //     ],
        //     'Equity' => [
        //         'Salaries Expense' => ['Employee Salaries', 'Manager Salaries'],
        //         'Rent Expense' => ['Office Rent', 'Warehouse Rent'],
        //         'Utilities Expense' => ['Electricity', 'Water']
        //     ],
        //     'Revenue' => [
        //         'Cash' => ['Main Safe', 'Bank Account'],
        //         'Accounts Receivable' => ['Client A', 'Client B'],
        //         'Inventory' => ['Raw Materials', 'Finished Goods']
        //     ],
        //     'Expenses' => [
        //         'Salaries Expense' => ['Employee Salaries', 'Manager Salaries'],
        //         'Rent Expense' => ['Office Rent', 'Warehouse Rent'],
        //         'Utilities Expense' => ['Electricity', 'Water']
        //     ],
        // ];
        // $rootAccounts = [
        //     'Assets' => [
        //         'Cash' => [
        //             'Main Safe' => ['Safe A', 'Safe B'],
        //             'Bank Account' => ['Bank A', 'Bank B']
        //         ],
        //         'Accounts Receivable' => [
        //             'Client A' => ['Invoice A1', 'Invoice A2'],
        //             'Client B' => ['Invoice B1', 'Invoice B2']
        //         ],
        //         'Inventory' => [
        //             'Raw Materials' => ['Wood', 'Steel'],
        //             'Finished Goods' => ['Product A', 'Product B']
        //         ]
        //     ],
        //     'Liabilities' => [
        //         'Accounts Payable' => [
        //             'Supplier A' => ['Bill A1', 'Bill A2'],
        //             'Supplier B' => ['Bill B1', 'Bill B2']
        //         ],
        //         'Loans Payable' => [
        //             'Bank Loan' => ['Short Term', 'Long Term']
        //         ]
        //     ],
        //     'Equity' => [
        //         'Owner Capital' => [
        //             'Initial Capital' => ['Partner A', 'Partner B']
        //         ],
        //         'Retained Earnings' => [
        //             'Accumulated Profit' => ['2023', '2024']
        //         ]
        //     ],
        //     'Revenue' => [
        //         'Sales Revenue' => [
        //             'Domestic Sales' => ['Retail', 'Wholesale'],
        //             'Export Sales' => ['Region A', 'Region B']
        //         ],
        //         'Service Income' => [
        //             'Consulting' => ['Project A', 'Project B']
        //         ]
        //     ],
        //     'Expenses' => [
        //         'Salaries Expense' => [
        //             'Employee Salaries' => ['Dept A', 'Dept B'],
        //             'Manager Salaries' => ['Level 1', 'Level 2']
        //         ],
        //         'Rent Expense' => [
        //             'Office Rent' => ['Branch A', 'Branch B'],
        //             'Warehouse Rent' => ['Warehouse A', 'Warehouse B']
        //         ],
        //         'Utilities Expense' => [
        //             'Electricity' => ['Office', 'Warehouse'],
        //             'Water' => ['Office', 'Warehouse']
        //         ]
        //     ]
        // ];

$rootAccounts = [
            AccountType::ASSET->value => [
                'Cash' => ['Main Safe' => ['Safe A', 'Safe B'], 'Bank Account' => ['Bank A']],
                'Accounts Receivable' => ['Client A' => ['Invoice A1'], 'Client B' => []],
                'Inventory' => ['Raw Materials' => [], 'Finished Goods' => []]
            ],
            AccountType::LIABILITY->value => [
                'Loans' => ['Short-Term' => [], 'Long-Term' => []],
                'Accounts Payable' => ['Supplier A' => [], 'Supplier B' => []],
            ],
            AccountType::EQUITY->value => [
                'Capital' => ['Partner A' => [], 'Partner B' => []],
                // 'Retained Earnings' => [],
            ],
            AccountType::REVENUE->value => [
                'Sales' => ['Product A' => [], 'Product B' => []],
                // 'Service Income' => [],
            ],
            AccountType::EXPENSE->value => [
                'Salaries Expense' => ['Employee Salaries' => [], 'Manager Salaries' => []],
                'Rent Expense' => ['Office Rent' => [], 'Warehouse Rent' => []],
                'Utilities Expense' => ['Electricity' => [], 'Water' => []]
            ],
        ];
        foreach ($rootAccounts as $rootName => $generals) {
            $root = Account::create([
                'name' => $rootName,
                'code' => GenerateAccountCodeService::generate(),
                'parent_id' => null,
                'level' => 1,
                // 'type' => strtolower($rootName),
                'status' => 'active',
                'creator_type' => $creator_type,
                'creator_id' => $creator_id
            ]);

            foreach ($generals as $generalName => $assistants) {
                $general = Account::create([
                    'name' => $generalName,
                    'code' => GenerateAccountCodeService::generate($root->id),
                    'parent_id' => $root->id,
                    'level' => 2,
                    // 'type' => strtolower($rootName),
                    'status' => 'active',
                    'creator_type' => $creator_type,
                    'creator_id' => $creator_id
                ]);

                foreach ($assistants as $assistantName => $subs) {
                    $assistant = Account::create([
                        'name' => $assistantName,
                        'code' => GenerateAccountCodeService::generate($general->id),
                        'parent_id' => $general->id,
                        'level' => 3,
                        // 'type' => strtolower($rootName),
                        'status' => 'active',
                        'creator_type' => $creator_type,
                        'creator_id' => $creator_id
                    ]);

                    foreach ($subs as $subName) {
                        // $costCenterId = $defaultCostCenters[$generalName] ?? null;

                        Account::create([
                            'name' => $subName,
                            'code' => GenerateAccountCodeService::generate($assistant->id),
                            'parent_id' => $assistant->id,
                            'level' => 4,
                            // 'type' => strtolower($rootName),
                            'status' => 'active',
                            'creator_type' => $creator_type,
                            'creator_id' => $creator_id
                        ]);
                    }
                }
            }
        }

        // foreach ($rootAccounts as $rootName => $children) {
        //     $root = Account::create([
        //         'name' => $rootName,
        //         'code' => GenerateAccountCodeService::generate(),
        //         'level' => 1,
        //         // 'type' => strtolower($rootName),
        //         'status' => 'active',
        //         'creator_type' => $creator_type,
        //         'creator_id' => $creator_id
        //     ]);

        //     foreach ($children as $childName => $subChildren) {
        //         $child = Account::create([
        //             'name' => $childName,
        //             'code' => GenerateAccountCodeService::generate($root->id),
        //             'parent_id' => $root->id,
        //             'level' => 2,
        //             // 'type' => strtolower($rootName),
        //             'status' => 'active',
        //             'creator_type' => $creator_type,
        //             'creator_id' => $creator_id
        //         ]);

        //         foreach ($subChildren as $subName) {
        //             Account::create([
        //                 'name' => $subName,
        //                 'code' => GenerateAccountCodeService::generate($child->id),
        //                 'parent_id' => $child->id,
        //                 'level' => 3,
        //                 // 'type' => strtolower($rootName),
        //                 'status' => 'active',
        //                 'creator_type' => $creator_type,
        //                 'creator_id' => $creator_id
        //             ]);
        //         }
        //     }
        // }
    }
}
