<?php

namespace Database\Seeders;

use App\Enums\UserStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert($this->getData());
    }

    public function getData() : array
    {
        $reponse = [];

        for($i = 0; $i < 10; $i++){
            $reponse[]=[
                'last_name' => fake()->lastName(),
                'first_name' => fake()->firstName(),
                'status' => UserStatus::ACTIVE->value,

                'created_at' => now(),
                'updated_at' => now(),
                
                'email'=> fake()->email(),
                'phone' => fake()->phoneNumber(),
                'avatar' => fake()->imageUrl(),

                'password' => fake()->password($maxLength = 5),
                

            ];
        } 
        return $reponse;
    }
}
