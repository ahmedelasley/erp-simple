<?php

use Modules\AccountingSettings\Models\AccountingSetting;

if (! function_exists('accounting_setting')) {
    function accounting_setting($key = null)
    {
        $settings = AccountingSetting::where('key', $key)->first()->value;
        return $settings;
    }
}
