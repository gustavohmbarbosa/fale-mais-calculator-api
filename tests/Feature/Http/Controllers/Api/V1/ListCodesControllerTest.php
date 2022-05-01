<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Domain\Entities\Code;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;

/** @group codes */
class ListCodesControllerTest extends TestCase
{
    use RefreshDatabase;

    const ENDPOINT = '/api/v1/codes';

    protected Code $code;

    public function __construct()
    {
        parent::__construct();
        $this->code = new Code();
    }

    /** @test */
    public function should_return_all_codes()
    {
        $this->withoutExceptionHandling();
        $this->code->factory()->count(3)->create();

        $response = $this->json('GET', self::ENDPOINT);
        $response->assertStatus(200);
        $response->assertJsonCount(3);
    }

    /** @test */
    public function should_return_data_in_a_valid_format()
    {
        $this->withoutExceptionHandling();
        $this->code->factory()->count(1)->create();

        $response = $this->json('GET', self::ENDPOINT);
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
