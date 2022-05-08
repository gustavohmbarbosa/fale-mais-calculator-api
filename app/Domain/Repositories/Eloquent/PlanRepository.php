<?php

namespace App\Domain\Repositories\Eloquent;

use App\Domain\Entities\Plan;
use App\Domain\Repositories\Interfaces\PlanRepositoryInterface;

class PlanRepository extends BaseRepository implements PlanRepositoryInterface
{
    public function __construct()
    {
        parent::__construct(new Plan());
    }
}
