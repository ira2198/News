<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsFromSources extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news_from_sources')->insert($this->getData());
    }

    public function getData() : array
    {
        $reponse = [];

        for($i = 0; $i < 40; $i++){
            $reponse[]=[

                'news_id' => fake()->numberBetween($int1=1, $int2=60), 
                'sources_id'=> fake()->numberBetween($int1=1, $int2=30),
                           
                'created_at' => now(),
                'updated_at' => now(),
            ];
        } 
        return $reponse;
    }

}
