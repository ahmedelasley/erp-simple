<?php

namespace Modules\Attributes\Observers;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\App;
use Modules\Attributes\Models\Attribute;
use Modules\Core\Observers\BaseObserver;
use Modules\Core\Traits\HasAdvancedAlerts;
use Modules\Core\Services\CodeGeneratorService;

class AttributeObserver extends BaseObserver
{
    use HasAdvancedAlerts;

    protected function onCreating($attribute)
    {
        if (empty($attribute->slug)) {
            $attribute->slug = Str::slug($attribute->name);
        }
    }

    protected function onCreated($attribute)
    {
        $attribute->code = App::make(CodeGeneratorService::class)
            ->generate('ATTR-', Attribute::class);
        $attribute->saveQuietly();
    }

    protected function onUpdating($attribute)
    {

        if ($attribute->isDirty('name')) {
            $attribute->slug = Str::slug($attribute->name);
        }
    }
    // protected function onDeleting($attribute)
    // {
    //     if ($attribute->options()->exists()) {
    //         // throw new \Exception(__('Cannot delete a Attribute with sub-Attributes.'));
    //         // $this->errorAlert();
    //     }
    // }



}
