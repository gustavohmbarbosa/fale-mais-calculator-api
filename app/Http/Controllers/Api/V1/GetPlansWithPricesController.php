<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Domain\Services\PlansWithCalculatedPrices;
use App\Domain\Repositories\Interfaces\PlanRepositoryInterface;

class GetPlansWithPricesController extends Controller
{
    public function __construct(
        protected PlanRepositoryInterface $repository,
        protected PlansWithCalculatedPrices $service
    ) {
    }

    public function handle(Request $request)
    {
        $request->validate([
            'rate' => 'required|numeric|min:0',
            'minutes' => 'required|integer|min:0',
        ]);

        $plans = $this->repository->getAll();
        $calculator = $this->service->params($request->get('rate'), $request->get('minutes'));

        $plansWithPrices = $calculator->getPlansWithCalculatedPrices($plans->all());

        return response()->json($plansWithPrices);
    }
}
