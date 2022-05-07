<?php

namespace App\Domain\Repositories\Interfaces;

interface CodeRepositoryInterface extends BaseRepositoryInterface
{
    public function getDataByCode($code);
}
