<?php

namespace App\Domain\Entities;

use Illuminate\Database\Eloquent\Model;

class CallPrice extends Model
{
    protected $fillable = ['origin', 'destiny', 'rat_per_minute'];
}
