<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Domain\Repositories\Interfaces\CallPriceRepositoryInterface;

class ListCallPricesController extends Controller
{
    public function __construct(protected CallPriceRepositoryInterface $callPrice)
    {
    }

    public function handle()
    {
        $callPrices = $this->callPrice->getAllWithRelations(['origin', 'destiny']);

        return response()->json($callPrices);
    }
}
