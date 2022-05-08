<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Domain\Repositories\Interfaces\CallPriceRepositoryInterface;

class ListCallPricesController extends Controller
{
    public function __construct(protected CallPriceRepositoryInterface $repository)
    {
    }

    public function handle()
    {
        $callPrices = $this->repository->getAllWithRelations(['origin', 'destiny']);

        return response()->json($callPrices);
    }
}
