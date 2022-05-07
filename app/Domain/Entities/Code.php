<?php

namespace App\Domain\Entities;

use Database\Factories\CodeFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Code extends Model
{
    use HasFactory;

    protected $fillable = ['code'];

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return CodeFactory::new();
    }

    public function availableDestinations()
    {
        return $this->hasMany(CallPrice::class, 'origin', 'code');
    }

    public function availableOrigins()
    {
        return $this->hasMany(CallPrice::class, 'destiny', 'code');
    }
}
