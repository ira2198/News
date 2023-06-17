<?php

namespace Tests\Feature\HTTP\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class AdminArticleControllerTest extends TestCase
{
    
    public function test_admin_article_returns_a_successful_response(): void
    {
        $response = $this->get('/admin/article/create');

        $response->assertStatus(200);

    }

    public function test_admin_article_create()
    {
        $categories = [1=>'test', 2=>'test2']; 
        
        $view = $this->view('admin.createArticle' , compact('categories')); 
        $view->assertSee('test');
    }

    public function test__admin_article_store_request()
    {

        $article = ['title'=>'njeai uriea',
        'category'=> 'Victoria Faith',
        'text'=> 'jafn ao ianbti l[lp',
        'author'=>'pending',  ];                
                     
        $view = $this->view('news.article', compact('article')); 
        $view->assertSee('njeai uriea', 'jafn ao ianbti l[lp'); 

        
      
    }    
}
