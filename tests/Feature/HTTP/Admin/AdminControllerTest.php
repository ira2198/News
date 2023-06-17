<?php

namespace Tests\Feature\HTTP\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AdminControllerTest extends TestCase
{
    /**
     * 
     */
    public function test_admin_controller_returns_a_successful_response(): void
    {
        $response = $this->get('admin/index');

        $response->assertStatus(200);
    }



    public function test_admin_news_show_view()
    {
        $newsList =[
            [
            'category' =>  "vsbia", 
            'id' => 2,
            'title' => "wiueH hkl",
            'author' => "BHVEIAGB",
            'status' => "beiqan",
            'description' => "behiquhovmn urt",
            'text' => "bueg tturiwh trui tribgsi dsg",
            'created_at' => now(),
            ],
            [
            'category' =>  "vsbia", 
            'id' => 2,
            'title' => "wiueH hkl",
            'author' => "BHVEIAGB",
            'status' => "beiqan",
            'description' => "behiquhovmn urt",
            'text' => "bueg tturiwh trui tribgsi dsg",
            'created_at' => now(),
            ],
            [
            'category' => "vsbia", 
            'id' => 2,
            'title' => "wiueH hkl",
            'author' => "BHVEIAGB",
            'status' => "beiqan",
            'description' => "behiquhovmn urt",
            'text' => "bueg tturiwh trui tribgsi dsg",
            'created_at' => now(),
            ],
        ];

        $view = $this->view('admin.newsShow', compact('newsList'));
 
        $view->assertSee('vsbia');
    }
}
