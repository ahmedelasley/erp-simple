<?php

namespace Modules\AccountingSettings\Repositories;

use Modules\AccountingSettings\Models\AccountingSetting;
use Modules\AccountingSettings\Interfaces\AccountingSettingRepositoryInterface;
use Modules\Core\Repositories\BaseRepository;

class AccountingSettingRepository extends BaseRepository implements AccountingSettingRepositoryInterface
{
    // protected $model = AccountingSetting::class;
    public function __construct()
    {
        parent::__construct(new AccountingSetting());
    }
}
