<?php

namespace Tests\Feature\HTTP\News;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NewsCategoryControllerTest extends TestCase
{
    
    public function test_categories_controller_returns_a_successful_response(): void
    {
        $response = $this->get('/categories');

        $response->assertStatus(200);
    }

    public function test_news_categoyries_view_can_be_rendered(): void
    {
        $categories = [1=>'test', 2=>'test2']; 
        $view = $this->view('news.categoyries', compact('categories'));
 
        $view->assertSee('categories');
    }
}
