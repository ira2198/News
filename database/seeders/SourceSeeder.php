<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sources')->insert($this->getData());
    }

    
    public function getData() : array
    {
        $reponse = [];

        for($i = 0; $i < 30; $i++){
            $reponse[]=[

                'name_source' => fake()->text($maxNbChars = 30), 
                'description'=> fake()->text($maxNbChars = 150),
                'links'=> fake()->url(),   
                
                'created_at' => now(),
                'updated_at' => now(),
            ];
        } 
        return $reponse;
    }
}
