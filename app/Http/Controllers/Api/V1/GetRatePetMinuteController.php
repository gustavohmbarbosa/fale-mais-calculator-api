<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Domain\Repositories\Interfaces\CallPriceRepositoryInterface;

class GetRatePetMinuteController extends Controller
{
    public function __construct(protected CallPriceRepositoryInterface $repository)
    {
    }

    public function handle($origin, $destiny)
    {
        $callPrice = $this->repository->getByOriginAndDestiny($origin, $destiny);

        if (!$callPrice) {
            return response()->json(['message' => 'The given data is invalid'], 404);
        }

        return response()->json($callPrice->rate_per_minute);
    }
}
