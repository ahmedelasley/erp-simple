<?php

namespace Modules\Categories\Observers;

use Illuminate\Support\Str;
use Modules\Core\Observers\BaseObserver;
use Modules\Categories\Models\Category;
use Modules\Core\Services\CodeGeneratorService;
use Illuminate\Support\Facades\App;

class CategoryObserver extends BaseObserver
{

    protected function onCreating($category)
    {
        if (empty($category->slug)) {
            $category->slug = Str::slug($category->name);
        }
    }

    protected function onCreated($category)
    {
        // $category->code = App::make(CodeGeneratorService::class)->generate('CAT-', Category::class);
        // $category->saveQuietly();

        $category->code = App::make(CodeGeneratorService::class)
            ->generate('CAT-', Category::class);
        $category->saveQuietly();
    }

    protected function onUpdating($category)
    {
        if ($category->isDirty('name')) {
            $category->slug = Str::slug($category->name);
        }
    }

    protected function onDeleting($category)
    {
        if ($category->children()->exists()) {
            throw new \Exception(__('Cannot delete a Category with sub-Categorys.'));
        }
    }



}
