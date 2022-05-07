<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Domain\Entities\CallPrice;
use App\Domain\Entities\Code;
use Illuminate\Foundation\Testing\RefreshDatabase;

/** @group call_prices */
class ListCallPricesControllerTest extends TestCase
{
    use RefreshDatabase;

    const ENDPOINT = '/api/v1/call_prices';

    protected CallPrice $callPrice;
    protected Code $code;

    public function __construct()
    {
        parent::__construct();
        $this->callPrice = new CallPrice();
        $this->code = new Code();
    }

    /** @test */
    public function should_return_all_call_prices()
    {
        $this->withoutExceptionHandling();
        $data = [
            'origin' => $this->code->factory()->create()->code,
            'destiny' => $this->code->factory()->create()->code,
            'rate_per_minute' => 1.90
        ];
        $this->callPrice->create($data);

        $response = $this->json('GET', self::ENDPOINT);
        $response->assertStatus(200);
        $response->assertJsonCount(1);
    }

    /** @test */
    public function should_return_data_in_a_valid_format()
    {
        $this->withoutExceptionHandling();
        $data = [
            'origin' => $this->code->factory()->create()->code,
            'destiny' => $this->code->factory()->create()->code,
            'rate_per_minute' => 1.90
        ];
        $this->callPrice->create($data);

        $response = $this->json('GET', self::ENDPOINT);
        $response->assertStatus(200);
        $response->assertJsonStructure([
            0 => [
                'id',
                'origin' => [
                    'id',
                    'code',
                    'created_at',
                    'updated_at'
                ],
                'destiny' => [
                    'id',
                    'code',
                    'created_at',
                    'updated_at'
                ],
                'rate_per_minute',
                'created_at',
                'updated_at',
            ]
        ]);
    }
}
