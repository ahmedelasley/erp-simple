<?php

namespace Modules\ChartOfAccounts\Repositories;

use Modules\ChartOfAccounts\Models\Account;
use Modules\ChartOfAccounts\Interfaces\AccountRepositoryInterface;
use Modules\Core\Repositories\BaseRepository;

class AccountRepository extends BaseRepository implements AccountRepositoryInterface
{
    // protected $model = Account::class;
    public function __construct()
    {
        parent::__construct(new Account());
    }
}
