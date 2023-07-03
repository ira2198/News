<?php

namespace Database\Seeders;

use App\Enums\NewsStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')->insert($this->getData());
    }

    
    public function getData() : array
    {
        $reponse = [];

        for($i = 0; $i < 30; $i++){
            $reponse[]=[
                'status' => NewsStatus::ACTIVE->value,
                'user_id' => fake()->numberBetween($int1=1, $int2=10),
                'categories_id' => fake()->numberBetween($int1=1, $int2=6),

                'title' => fake()->text($maxNbChars = 40),            

                'description'=> fake()->text($maxNbChars = 100),
                'text'=> fake()->text($maxNbChars = 300),
                'main_img' => fake()->url(),

                'created_at' => now(),
                'updated_at' => now(),
            ];
        } 
        return $reponse;
    }
}
