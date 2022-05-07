<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Domain\Entities\CallPrice;
use App\Domain\Entities\Code;
use Illuminate\Foundation\Testing\RefreshDatabase;

/** @group call_prices */
class GetRatePetMinuteControllerTest extends TestCase
{
    use RefreshDatabase;

    const ENDPOINT = '/api/v1/call-prices/{origin}/{destiny}/rate-per-minute';

    protected CallPrice $callPrice;
    protected Code $code;

    public function __construct()
    {
        parent::__construct();
        $this->callPrice = new CallPrice();
        $this->code = new Code();
    }

    /** @test */
    public function should_return_the_rate_value_for_the_origin_and_destination_provided()
    {
        $this->withoutExceptionHandling();
        $origin = $this->code->factory()->create();
        $destiny = $this->code->factory()->create();
        $this->callPrice->create([
            'origin' => $origin->code,
            'destiny' => $destiny->code,
            'rate_per_minute' => 1.99
        ]);

        $url = str_replace(['{origin}', '{destiny}'], [$origin->code, $destiny->code], self::ENDPOINT);
        $response = $this->json('GET', $url);
        $response->assertStatus(200);
        $response->assertExactJson([1.99]);
    }
}
