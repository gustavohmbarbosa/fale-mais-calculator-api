<?php

namespace App\Domain\Repositories\Interfaces;

interface BaseRepositoryInterface
{
    public function getById($id);

    public function getAll();
}
