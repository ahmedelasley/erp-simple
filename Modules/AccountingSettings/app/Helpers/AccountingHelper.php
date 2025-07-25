<?php

use Modules\AccountingSettings\Models\AccountingSetting;

if (! function_exists('accounting_setting')) {
    function accounting_setting($key = null)
    {
        static $settings = null;

        if (!$settings) {
            $settings = AccountingSetting::where('key', $key)->first();
        }

        return $key ? optional($settings)->value : $settings;
    }
}
