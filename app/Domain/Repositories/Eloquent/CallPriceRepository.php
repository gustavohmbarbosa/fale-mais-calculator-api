<?php

namespace App\Domain\Repositories\Eloquent;

use App\Domain\Entities\CallPrice;
use App\Domain\Repositories\Interfaces\CallPriceRepositoryInterface;

class CallPriceRepository extends BaseRepository implements CallPriceRepositoryInterface
{
    public function __construct()
    {
        parent::__construct(new CallPrice());
    }

    public function getAllWithRelations(mixed $relations)
    {
        return $this->model::query()->with($relations)->get();
    }
}
