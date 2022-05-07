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

    /**
     * @param string|array $relations
     *
     * @return CallPrice[]
     */
    public function getAllWithRelations(string|array $relations)
    {
        return $this->model::with($relations)->get();
    }

    /**
     * @param string $origin
     * @param string $destiny
     *
     * @return CallPrice
     */
    public function getByOriginAndDestiny(string $origin, string $destiny)
    {
        return $this->model::where([
            ['origin', '=', $origin],
            ['destiny', '=', $destiny]
        ])->first();
    }
}
