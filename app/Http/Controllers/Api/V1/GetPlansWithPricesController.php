<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Domain\Repositories\Interfaces\PlanRepositoryInterface;

class GetPlansWithPricesController extends Controller
{
    public function __construct(protected PlanRepositoryInterface $repository)
    {
    }

    public function handle()
    {
        $plans = $this->repository->getAll();

        return response()->json($plans);
    }
}
