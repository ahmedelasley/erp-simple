<?php

namespace Modules\ChartOfAccounts\Observers;

use Modules\Core\Observers\BaseObserver;
use Modules\ChartOfAccounts\Services\GenerateAccountCodeService;

use Illuminate\Support\Facades\App;

class AccountObserver extends BaseObserver
{


    protected function onCreated($account)
    {
        $account->code = App::make(GenerateAccountCodeService::class)->generate($account->parent_id);
        $account->saveQuietly();
    }



}
