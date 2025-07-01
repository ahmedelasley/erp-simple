<?php

namespace Modules\Positions\Repositories;

use Modules\Positions\Models\Position;
use Modules\Positions\Interfaces\PositionRepositoryInterface;
use Modules\Core\Repositories\BaseRepository;

class PositionRepository extends BaseRepository implements PositionRepositoryInterface
{
    // protected $model = Position::class;
    public function __construct()
    {
        parent::__construct(new Position());
    }
}
