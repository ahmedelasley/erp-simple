<?php

use Modules\Core\Helpers\ModuleHelper;

    if (!function_exists('module_is_enabled')) {
        function module_is_enabled(string $moduleName): bool
        {
            return ModuleHelper::isEnabled($moduleName);
        }
    }
