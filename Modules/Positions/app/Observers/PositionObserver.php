<?php

namespace Modules\Positions\Observers;

use Illuminate\Support\Str;
use Modules\Core\Observers\BaseObserver;
use Modules\Positions\Models\Position;
use Modules\Core\Services\CodeGeneratorService;
use Illuminate\Support\Facades\App;

class PositionObserver extends BaseObserver
{

    protected function onCreating($position)
    {
        if (empty($position->slug)) {
            $position->slug = Str::slug($position->name);
        }
    }

    protected function onCreated($position)
    {
        $position->code = App::make(CodeGeneratorService::class)
            ->generate('POS-', Position::class);
        $position->saveQuietly();
    }

    protected function onUpdating($position)
    {

        if ($position->isDirty('name')) {
            $position->slug = Str::slug($position->name);
        }
    }
    protected function onDeleting($position)
    {
        if ($position->children()->exists()) {
            throw new \Exception(__('Cannot delete a Position with sub-Positions.'));
        }
    }



}
