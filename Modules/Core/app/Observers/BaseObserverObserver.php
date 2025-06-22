<?php

namespace Modules\Core\Observers;

use Modules\Core\app\Models\BaseObserver;

class BaseObserverObserver
{
    /**
     * Handle the BaseObserver "created" event.
     */
    public function created(BaseObserver $baseobserver): void {}

    /**
     * Handle the BaseObserver "updated" event.
     */
    public function updated(BaseObserver $baseobserver): void {}

    /**
     * Handle the BaseObserver "deleted" event.
     */
    public function deleted(BaseObserver $baseobserver): void {}

    /**
     * Handle the BaseObserver "restored" event.
     */
    public function restored(BaseObserver $baseobserver): void {}

    /**
     * Handle the BaseObserver "force deleted" event.
     */
    public function forceDeleted(BaseObserver $baseobserver): void {}
}
