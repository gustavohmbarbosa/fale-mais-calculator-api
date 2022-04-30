<?php

namespace App\Domain\Repositories\Eloquent;

use Illuminate\Database\Eloquent\Model;
use App\Domain\Repositories\Interfaces\BaseRepositoryInterface;

class BaseRepository implements BaseRepositoryInterface
{
    public function __construct(protected Model $model)
    {
    }

    public function getById($id)
    {
        return $this->model->find($id);
    }

    public function getAll()
    {
        return $this->model->get();
    }
}
