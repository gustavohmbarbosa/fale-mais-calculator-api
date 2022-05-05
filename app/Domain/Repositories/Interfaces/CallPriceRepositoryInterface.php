<?php

namespace App\Domain\Repositories\Interfaces;

interface CallPriceRepositoryInterface extends BaseRepositoryInterface
{
    public function getAllWithRelations(array|string $relations);
}
