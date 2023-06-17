<?php

namespace Tests\Feature\HTTP\News;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NewsControllerTest extends TestCase
{
    /**
     * 
     */
    public function test_news_controller_returns_a_successful_response(): void
    {
        $response = $this->get(route('news.category', 2));

        $response->assertStatus(200);
    }

    public function test_news_show_view_can_be_rendered(): void
    {
        $news = "bhai";

        $newsList =[
            [
            'category' =>  $news, 
            'id' => 2,
            'title' => "wiueH hkl",
            'author' => "BHVEIAGB",
            'status' => "beiqan",
            'description' => "behiquhovmn urt",
            'text' => "bueg tturiwh trui tribgsi dsg",
            'created_at' => now(),
            ],
            [
            'category' =>  $news, 
            'id' => 2,
            'title' => "wiueH hkl",
            'author' => "BHVEIAGB",
            'status' => "beiqan",
            'description' => "behiquhovmn urt",
            'text' => "bueg tturiwh trui tribgsi dsg",
            'created_at' => now(),
            ],
            [
            'category' =>  $news, 
            'id' => 2,
            'title' => "wiueH hkl",
            'author' => "BHVEIAGB",
            'status' => "beiqan",
            'description' => "behiquhovmn urt",
            'text' => "bueg tturiwh trui tribgsi dsg",
            'created_at' => now(),
            ],
        ];

        $view = $this->view('news.newsShow', compact('news', 'newsList'));
 
        $view->assertSee('bhai', 'behiquhovmn urt');
    }

    public function test_news_show_article_view_can_be_rendered(): void
    {
            $article =  [
            'category' => "hbdieao", 
            'id' => 2,
            'title' => "wiueH",
            'author' => "BHVEIAGB",
            'status' => "beiqan",
            'description' => "behiquhovmn urt",
            'text' => "bueg tturiwh trui tribgsi dsg",
            'created_at' => now(),
        ];
        $view = $this->view('news.article', compact('article')); 
        $view->assertSee("hbdieao");
    }
}
