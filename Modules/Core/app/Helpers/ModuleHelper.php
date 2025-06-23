<?php

namespace Modules\Core\Helpers;

use Nwidart\Modules\Facades\Module;

class ModuleHelper
{
    /**
     * Check if a module is enabled and exists.
     */
    public static function isEnabled(string $moduleName): bool
    {
        return Module::has($moduleName) && Module::find($moduleName)->isEnabled();
    }
}
