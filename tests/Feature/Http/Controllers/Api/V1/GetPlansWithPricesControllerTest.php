<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Domain\Entities\Plan;
use Illuminate\Foundation\Testing\RefreshDatabase;

/** @group plans */
class GetPlansWithPricesControllerTest extends TestCase
{
    use RefreshDatabase;

    protected $endpoint = '/api/v1/plans/';

    public function __construct()
    {
        parent::__construct();
        $this->plans = new Plan();
    }

    /** @test */
    public function return_all_plans()
    {
        $this->plans->factory()->count(3)->create();

        $response = $this->json('get', "{$this->endpoint}/?rate=1.70&minutes=80");

        $response->assertStatus(200);
        $response->assertJsonCount(3);
    }

    /** @test */
    public function return_plans_with_prices_calculated()
    {
        $plan = $this->plans;
        $plan->name = "FaleMais 60";
        $plan->max_minutes = 60;
        $plan->save();

        $response = $this->json('get', "{$this->endpoint}/?rate=1.70&minutes=80");

        $response->assertStatus(200);
        $response->assertExactJson([
            0 => [
                'name' => $plan->name,
                'minutes_per_mouth' => $plan->max_minutes,
                'price_with_plan' => "37,40",
                'price_without_plan' => "136,00"
            ]
        ]);
    }
}
