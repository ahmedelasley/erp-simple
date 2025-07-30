<?php

namespace Modules\Attributes\Repositories;

use Modules\Attributes\Models\Attribute;
use Modules\Attributes\Interfaces\AttributeRepositoryInterface;
use Modules\Core\Repositories\BaseRepository;

class AttributeRepository extends BaseRepository implements AttributeRepositoryInterface
{
    // protected $model = Attribute::class;
    public function __construct()
    {
        parent::__construct(new Attribute());
    }
}
