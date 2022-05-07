<?php

namespace Database\Seeders;

use App\Domain\Entities\Code;
use Illuminate\Database\Seeder;
use App\Domain\Entities\CallPrice;
use Faker\Generator;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = new Generator();
        for ($i = 0; $i < 10; $i++) {
            CallPrice::create([
                'origin' => Code::factory()->create()->id,
                'destiny' => Code::factory()->create()->id,
                'rate_per_minute' => $faker->numberBetween(10, 1000)
            ]);
        }
    }
}
