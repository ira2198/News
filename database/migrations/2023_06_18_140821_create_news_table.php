<?php

use App\Enums\NewsStatus;
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
        Schema::create('news', function (Blueprint $table) {
    
        $table->id();
        $table->enum('status', NewsStatus::news_status_all()); 
    
        $table->foreignId('user_id')
        ->references('id')
        ->on('users')
        ->cascadeOnDelete();
        $table->foreignId('categories_id')
        ->references('id')
        ->on('categories')
        ->cascadeOnDelete();
    
        $table->string('title', 100);
        $table->timestamps();
    
        $table->text('description', 200)->nullable();
        $table->text('text')->nullable();
        $table->string('main_img');
    
        $table->index('status', 'title');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
};
