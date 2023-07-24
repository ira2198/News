<?php

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
        Schema::create('rambler_news', function (Blueprint $table) {
            $table->id();

            $table->string('title', 160 );
            $table->string('link', 200);
            $table->text('description', 2000);
            $table->string('author', 60);


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rambler_news');
    }
};
