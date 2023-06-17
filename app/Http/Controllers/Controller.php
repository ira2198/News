<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    protected function getCategory(int $name = null) {
        
        $categories = [
           1 =>'The main thing today',
           2 =>'Politics', 
           3 =>'Science',
           4 =>'Art',
           5 =>'Nature and climate',
           6 =>'Economics',
           7 => 'Showbiz',
        ];

        if ($name === null){
            return $categories;
        }else{
            return $categories[$name];  
        }             
        
    }
     

    protected function getNews(int $id = null, string $category = 'no'): array
    {


        $news = [];
        if ($id === null) {
          for ($i=1; $i < 11; $i++) {
              $news[] = [
                'category' => $category, 
                'id' => $i,
                'title' => fake()->jobTitle(),
                'author' => fake()->userName(),
                'status' => 'draft',
                'description' => fake()->text(150),
                'text' => fake()->text(800),
                'created_at' => now(),
              ];
          }

          return $news;
        }

        return [
            'category' => $category, 
            'id' => $id++,
            'title' => fake()->jobTitle(),
            'author' => fake()->userName(),
            'status' => 'draft',
            'description' => fake()->text(150),
            'text' => fake()->text(800),
            'created_at' => now(),
        ];
    }
} 
