<?php

namespace Modules\Categories\Repositories;

use Modules\Categories\Models\Category;
use Modules\Categories\Interfaces\CategoryRepositoryInterface;
use Modules\Core\Repositories\BaseRepository;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
    // protected $model = Category::class;
    public function __construct()
    {
        parent::__construct(new Category());
    }
}
