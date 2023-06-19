<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SourceInformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sources_information')->insert($this->getData());
    }

    
    public function getData() : array
    {
        $reponse = [];

        for($i = 0; $i < 10; $i++){
            $reponse[]=[

                'name_source' => fake()->text($maxNbChars = 50), 
                'description'=> fake()->text($maxNbChars = 150),
                'links'=> fake()->url(),   
                
                'created_at' => now(),
                'updated_at' => now(),
            ];
        } 
        return $reponse;
    }
}
