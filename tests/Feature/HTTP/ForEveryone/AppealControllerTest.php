<?php

namespace Tests\Feature\HTTP\ForEveryone;

// use Illuminate\Foundation\Testing\RefreshDatabase;

use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class AppealControllerTest extends TestCase
{
    /**
     * response 200.
     */
        public function test_appeal_controller_returns_a_successful_response(): void
        {
            $response = $this->get('/appeal');

            $response->assertStatus(200);
        }
   
    }