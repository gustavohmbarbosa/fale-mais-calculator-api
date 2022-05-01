<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Domain\Entities\Code;
use Illuminate\Foundation\Testing\RefreshDatabase;

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
        $response->assertJsonCount(3);
    }
}
