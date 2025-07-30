<?php

namespace Modules\Attributes\Repositories;

use Modules\Attributes\Models\AttributeOption;
use Modules\Attributes\Interfaces\AttributeOptionRepositoryInterface;
use Modules\Core\Repositories\BaseRepository;

class AttributeOptionRepository extends BaseRepository implements AttributeOptionRepositoryInterface
{
    // protected $model = AttributeOption::class;
    public function __construct()
    {
        parent::__construct(new AttributeOption());
    }
}
