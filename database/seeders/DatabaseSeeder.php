<?php

namespace Database\Seeders;

use App\Domain\Entities\Code;
use App\Domain\Entities\Plan;
use Illuminate\Database\Seeder;
use App\Domain\Entities\CallPrice;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Code::insert([
            ['code' => '011'],
            ['code' => '016'],
            ['code' => '017'],
            ['code' => '018'],
            ['code' => '087'],
            ['code' => '081']
        ]);

        CallPrice::insert([
            ['origin' => '011', 'destiny' => '016', 'rate_per_minute' => 1.90],
            ['origin' => '016', 'destiny' => '011', 'rate_per_minute' => 2.90],
            ['origin' => '011', 'destiny' => '017', 'rate_per_minute' => 1.70],
            ['origin' => '017', 'destiny' => '011', 'rate_per_minute' => 2.90],
            ['origin' => '011', 'destiny' => '018', 'rate_per_minute' => 0.90],
            ['origin' => '018', 'destiny' => '011', 'rate_per_minute' => 1.90],
            ['origin' => '087', 'destiny' => '081', 'rate_per_minute' => 2.45],
            ['origin' => '081', 'destiny' => '087', 'rate_per_minute' => 3.45]
        ]);

        Plan::insert([
            ['name' => 'FaleMais 30', 'max_minutes' => 30],
            ['name' => 'FaleMais 60', 'max_minutes' => 60],
            ['name' => 'FaleMais 120', 'max_minutes' => 120],
            ['name' => 'FaleMais 240', 'max_minutes' => 240]
        ]);
    }
}
