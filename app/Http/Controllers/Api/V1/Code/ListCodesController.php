<?php

namespace App\Http\Controllers\Api\V1\Code;

use App\Http\Controllers\Controller;
use App\Domain\Repositories\Interfaces\CodeRepositoryInterface;

class ListCodesController extends Controller
{
    public function __construct(protected CodeRepositoryInterface $code)
    {
    }

    public function handle()
    {
        $codes = $this->code->getAll();

        return response()->json($codes);
    }
}
