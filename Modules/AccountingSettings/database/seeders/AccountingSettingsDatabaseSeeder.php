<?php

namespace Modules\AccountingSettings\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\AccountingSettings\Models\AccountingSetting;
use Modules\AccountingSettings\Enums\AccountingSettingType;
use Modules\AccountingSettings\Enums\AccountingSettingDataType;

class AccountingSettingsDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $this->call([]);
        $settings = [
            [
                'key'           => 'cash_account_id',
                'value'         => 1,
                'default_value' => 1,
                'description'   => 'Default cash account id used in the accounting system',
                'type'          => AccountingSettingType::ACCOUNTS,
                'data_type'     => AccountingSettingDataType::FOREIGN,
            ],
            [
                'key'           => 'bank_account_id',
                'value'         => 1,
                'default_value' => 1,
                'description'   => 'Default bank account id used in the accounting system',
                'type'          => AccountingSettingType::ACCOUNTS,
                'data_type'     => AccountingSettingDataType::FOREIGN,
            ],
            [
                'key'           => 'sales_account_id',
                'value'         => 1,
                'default_value' => 1,
                'description'   => 'Default sales account id used in the accounting system',
                'type'          => AccountingSettingType::ACCOUNTS,
                'data_type'     => AccountingSettingDataType::FOREIGN,
            ],
            [
                'key'           => 'purchase_account_id',
                'value'         => 1,
                'default_value' => 1,
                'description'   => 'Default purchase account id used in the accounting system',
                'type'          => AccountingSettingType::ACCOUNTS,
                'data_type'     => AccountingSettingDataType::FOREIGN,
            ],
            [
                'key'           => 'salary_expense_account_id',
                'value'         => 1,
                'default_value' => 1,
                'description'   => 'Default salary expense account id used in the accounting system',
                'type'          => AccountingSettingType::ACCOUNTS,
                'data_type'     => AccountingSettingDataType::FOREIGN,
            ],
            [
                'key'           => 'rounding_account_id',
                'value'         => 1,
                'default_value' => 1,
                'description'   => 'Default rounding account id used in the accounting system',
                'type'          => AccountingSettingType::ACCOUNTS,
                'data_type'     => AccountingSettingDataType::FOREIGN,
            ],
            [
                'key'           => 'customer_control_account_id',
                'value'         => 1,
                'default_value' => 1,
                'description'   => 'Default tax account id used in the accounting system',
                'type'          => AccountingSettingType::ACCOUNTS,
                'data_type'     => AccountingSettingDataType::FOREIGN,
            ],
            [
                'key'           => 'supplier_control_account_id',
                'value'         => 1,
                'default_value' => 1,
                'description'   => 'Default supplier control account id used in the accounting system',
                'type'          => AccountingSettingType::ACCOUNTS,
                'data_type'     => AccountingSettingDataType::FOREIGN,
            ],
            [
                'key'           => 'employee_control_account_id',
                'value'         => 1,
                'default_value' => 1,
                'description'   => 'Default employee control account id used in the accounting system',
                'type'          => AccountingSettingType::ACCOUNTS,
                'data_type'     => AccountingSettingDataType::FOREIGN,
            ],
            [
                'key'           => 'asset_control_account_id',
                'value'         => 1,
                'default_value' => 1,
                'description'   => 'Default asset control account id used in the accounting system',
                'type'          => AccountingSettingType::ACCOUNTS,
                'data_type'     => AccountingSettingDataType::FOREIGN,
            ],
            [
                'key'           => 'depreciation_account_id',
                'value'         => 1,
                'default_value' => 1,
                'description'   => 'Default depreciation account id used in the accounting system',
                'type'          => AccountingSettingType::ACCOUNTS,
                'data_type'     => AccountingSettingDataType::FOREIGN,
            ],
            [
                'key'           => 'default_tax_account_id',
                'value'         => 1,
                'default_value' => 1,
                'description'   => 'Default tax account id used in the accounting system',
                'type'          => AccountingSettingType::ACCOUNTS,
                'data_type'     => AccountingSettingDataType::FOREIGN,
            ],


            [
                'key'           => 'default_currency_id',
                'value'         => 1,
                'default_value' => 1,
                'description'   => 'Default currency used in the accounting system',
                'type'          => AccountingSettingType::CURRENCIES,
                'data_type'     => AccountingSettingDataType::FOREIGN,
            ],
            [
                'key'           => 'default_tax_id',
                'value'         => 1,
                'default_value' => 1,
                'description'   => 'Default tax used in the accounting system',
                'type'          => AccountingSettingType::TAXES,
                'data_type'     => AccountingSettingDataType::FOREIGN,
            ],
            [
                'key'           => 'default_fiscal_year_id',
                'value'         => 1,
                'default_value' => 1,
                'description'   => 'Default fiscal year used in the accounting system',
                'type'          => AccountingSettingType::FISCAL_YEARS,
                'data_type'     => AccountingSettingDataType::FOREIGN,
            ],
            [
                'key'           => 'default_cost_center_id',
                'value'         => 1,
                'default_value' => 1,
                'description'   => 'Default cost center used in the accounting system',
                'type'          => AccountingSettingType::COST_CENTERES,
                'data_type'     => AccountingSettingDataType::FOREIGN,
            ],


            [
                'key'           => 'auto_generate_account_code',
                'value'         => TRUE,
                'default_value' => TRUE,
                'description'   => '',
                'type'          => AccountingSettingType::ACCOUNTS,
                'data_type'     => AccountingSettingDataType::BOOLEAN,
            ],
            [
                'key'           => 'auto_post_journal_entries',
                'value'         => TRUE,
                'default_value' => TRUE,
                'description'   => '',
                'type'          => AccountingSettingType::JOURNAL_ENTRIES,
                'data_type'     => AccountingSettingDataType::BOOLEAN,
            ],
            [
                'key'           => 'prevent_posting_closed_year',
                'value'         => TRUE,
                'default_value' => TRUE,
                'description'   => '',
                'type'          => AccountingSettingType::FISCAL_YEARS,
                'data_type'     => AccountingSettingDataType::BOOLEAN,
            ],
            [
                'key'           => 'allow_duplicate_voucher_numbers',
                'value'         => TRUE,
                'default_value' => TRUE,
                'description'   => '',
                'type'          => AccountingSettingType::VOUCHERS,
                'data_type'     => AccountingSettingDataType::BOOLEAN,
            ],


            [
                'key'           => 'account_code_length',
                'value'         => 6,
                'default_value' => 6,
                'description'   => '',
                'type'          => AccountingSettingType::ACCOUNTS,
                'data_type'     => AccountingSettingDataType::INTEGER,
            ],
            [
                'key'           => 'journal_entry_code_length',
                'value'         => 6,
                'default_value' => 6,
                'description'   => '',
                'type'          => AccountingSettingType::JOURNAL_ENTRIES,
                'data_type'     => AccountingSettingDataType::INTEGER,
            ],
            [
                'key'           => 'voucher_code_length',
                'value'         => 6,
                'default_value' => 6,
                'description'   => '',
                'type'          => AccountingSettingType::VOUCHERS,
                'data_type'     => AccountingSettingDataType::INTEGER,
            ],

            [
                'key'           => 'journal_entry_prefix',
                'value'         => 'JE-',
                'default_value' => 'JE-',
                'description'   => '',
                'type'          => AccountingSettingType::JOURNAL_ENTRIES,
                'data_type'     => AccountingSettingDataType::STRING,
            ],
            [
                'key'           => 'voucher_prefix',
                'value'         => 'VO-',
                'default_value' => 'VO-',
                'description'   => '',
                'type'          => AccountingSettingType::VOUCHERS,
                'data_type'     => AccountingSettingDataType::STRING,
            ],
        ];

        foreach ($settings as $setting) {
            AccountingSetting::updateOrCreate(
                ['key' => $setting['key']],
                [
                    'value' => json_encode($setting['value']),
                    'default_value' => json_encode($setting['default_value']),
                    'description'   => $setting['description'],
                    'icon'          => $setting['icon'] ?? null,
                    'type'          => $setting['type'],
                    'data_type'     => $setting['data_type'],
                    'creator_type'  => 'Modules\AuthCore\Models\User',
                    'creator_id'    => 1,
                ]
            );
        }
    }
}
