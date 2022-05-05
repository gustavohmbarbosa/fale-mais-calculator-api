<?php

namespace App\Domain\Entities;

use Illuminate\Database\Eloquent\Model;

class CallPrice extends Model
{
    protected $fillable = ['origin', 'destiny', 'rat_per_minute'];

    public function origin()
    {
        return $this->belongsTo(Code::class, 'origin', 'id');
    }

    public function destiny()
    {
        return $this->belongsTo(Code::class, 'destiny', 'id');
    }
}
