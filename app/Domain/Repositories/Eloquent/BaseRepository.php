<?php

namespace App\Domain\Repositories\Eloquent;

use Illuminate\Database\Eloquent\Model;
use App\Domain\Repositories\Interfaces\BaseRepositoryInterface;

class BaseRepository implements BaseRepositoryInterface
{
    public function __construct(protected Model $entity)
    {
    }

    public function getById($id)
    {
        return $this->entity->find($id);
    }

    public function getAll()
    {
        return $this->entity->get();
    }
}
