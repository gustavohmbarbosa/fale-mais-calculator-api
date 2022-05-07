<?php

namespace App\Domain\Entities;

use Illuminate\Database\Eloquent\Model;

class CallPrice extends Model
{
    protected $fillable = ['origin', 'destiny', 'rate_per_minute'];

    public function origin()
    {
        return $this->belongsTo(Code::class, 'origin', 'code');
    }

    public function destiny()
    {
        return $this->belongsTo(Code::class, 'destiny', 'code');
    }
}
