<?php

namespace Modules\Attributes\Observers;

use Illuminate\Support\Str;
use Modules\Core\Observers\BaseObserver;
use Modules\Attributes\Models\AttributeOption;
use Modules\Core\Services\CodeGeneratorService;
use Illuminate\Support\Facades\App;

class AttributeOptionObserver extends BaseObserver
{
    protected function onCreating($attributeOption)
    {
        if (empty($attributeOption->slug)) {
            $attributeOption->slug = Str::slug($attributeOption->name);
        }
    }

    protected function onCreated($attributeOption)
    {
        $attributeOption->code = App::make(CodeGeneratorService::class)
            ->generate('ATTR-OP-', AttributeOption::class);
        $attributeOption->saveQuietly();
    }

    protected function onUpdating($attributeOption)
    {

        if ($attributeOption->isDirty('name')) {
            $attributeOption->slug = Str::slug($attributeOption->name);
        }
    }


}
