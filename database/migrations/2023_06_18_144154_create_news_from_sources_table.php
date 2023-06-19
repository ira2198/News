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
        Schema::create('news_from_sources', function (Blueprint $table) {
            
            $table->foreignId('news_id')
            ->references('id')
            ->on('news')
            ->cascadeOnDelete();

            $table->foreignId('sources_id')
            ->references('id')
            ->on('sources_information')
            ->cascadeOnDelete();

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
        Schema::dropIfExists('news_from_sources');
    }
};
