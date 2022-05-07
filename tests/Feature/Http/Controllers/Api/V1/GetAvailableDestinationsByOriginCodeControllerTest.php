<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Domain\Entities\CallPrice;
use App\Domain\Entities\Code;
use Illuminate\Foundation\Testing\RefreshDatabase;

/** @group codes */
class GetAvailableDestinationsByOriginCodeControllerTest extends TestCase
{
    use RefreshDatabase;

    const ENDPOINT = '/api/v1/codes/:id/available-destinations';

    protected CallPrice $callPrice;
    protected Code $code;

    public function __construct()
    {
        parent::__construct();
        $this->callPrice = new CallPrice();
        $this->code = new Code();
    }

    /** @test */
    public function should_return_available_destinations_by_the_given_origin_code()
    {
        $origin = $this->code->factory()->create();
        $destiny = $this->code->factory()->create();
        $this->callPrice->create([
            'origin' => $origin->id,
            'destiny' => $destiny->id,
            'rat_per_minute' => 200
        ]);

        $response = $this->json('GET', str_replace(':id', $origin->id, self::ENDPOINT));
        $response->assertStatus(200);
        $response->assertJsonCount(1);
    }

    /** @test */
    public function should_return_data_in_a_valid_format()
    {
        $origin = $this->code->factory()->create();
        $destiny = $this->code->factory()->create();
        $this->callPrice->create([
            'origin' => $origin->id,
            'destiny' => $destiny->id,
            'rat_per_minute' => 200
        ]);

        $response = $this->json('GET', str_replace(':id', $origin->id, self::ENDPOINT));
        $response->assertStatus(200);
        $response->assertJsonStructure([
            0 => [
                'id',
                'code',
                'created_at',
                'updated_at',
            ]
        ]);
    }
}
