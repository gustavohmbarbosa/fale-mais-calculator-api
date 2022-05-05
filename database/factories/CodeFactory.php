<?php

namespace Database\Factories;

use App\Domain\Entities\Code;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CodeFactory extends Factory
{
    protected $model = Code::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'code' => $this->faker->unique(true)->numberBetween(100, 999)
        ];
    }
}
