<?php

use App\Enums\UserStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            
            $table->id();            
            $table->string('last_name', 60);
            $table->string('first_name',60);
            $table->enum('status', UserStatus::user_status_all());

            $table->timestamps();
                        
            $table->string('email')->unique();   
            $table->string('phone', 30);
            $table->string('avatar', 200)->nullable();          
            $table->string('password', 200);

            $table->rememberToken();
            $table->index('last_name', 'status');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
