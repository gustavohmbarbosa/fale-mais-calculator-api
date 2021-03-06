<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Domain\Repositories\Interfaces\CodeRepositoryInterface;

class GetAvailableDestinationsByOriginCodeController extends Controller
{
    public function __construct(protected CodeRepositoryInterface $repository)
    {
    }

    public function handle(string $code)
    {
        $codeItem = $this->repository->getDataByCode($code);
        if (!$codeItem) {
            return response()->json(['message' => 'The given code does not exist'], 404);
        }

        $callPricesWithAvailableDestinations = $codeItem->availableDestinations()->get();
        $codes = [];

        foreach ($callPricesWithAvailableDestinations as $callPrice) {
            $codes[] = $callPrice->destiny()->first();
        }

        return response()->json($codes);
    }
}
