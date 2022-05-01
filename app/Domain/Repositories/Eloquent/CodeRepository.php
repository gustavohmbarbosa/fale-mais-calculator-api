<?php

namespace App\Domain\Repositories\Eloquent;

use App\Domain\Entities\Code;
use App\Domain\Repositories\Interfaces\CodeRepositoryInterface;

class CodeRepository extends BaseRepository implements CodeRepositoryInterface
{
    public function __construct()
    {
        parent::__construct(new Code());
    }
}
