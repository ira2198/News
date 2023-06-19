<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert($this->getData());
    }

    
    public function getData() : array
    {
        $reponse = [];

        for($i = 0; $i < 6; $i++){
            $reponse[]=[

                'category_name' => fake()->text($maxNbChars = 50),
                'description'=> fake()->text($maxNbChars = 60),
                
                'created_at' => now(),
                'updated_at' => now(),
            ];
        } 
        return $reponse;
    }
}
