<?php

namespace Tests\Feature\HTTP\ForEveryone;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class IndexControllerTest extends TestCase
{
    /**
     * response 200.
     */
    public function test_index_controller_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
 

}