<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Domain\Repositories\Interfaces\CodeRepositoryInterface;

class ListCodesController extends Controller
{
    public function __construct(protected CodeRepositoryInterface $repository)
    {
    }

    public function handle()
    {
        $codes = $this->repository->getAll();

        return response()->json($codes);
    }
}
