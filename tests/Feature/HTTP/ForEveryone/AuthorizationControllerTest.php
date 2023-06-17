<?php

namespace Tests\Feature\Feature\HTTP\ForEveryone;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthorizationControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_authorization_controller_returns_a_successful_response(): void
    {
        $response = $this->get('auth');

        $response->assertStatus(200);
    }
}
