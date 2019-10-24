<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CollectionMovie extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collection_movie', function (Blueprint $table) {
            $table->primary(['collection_id', 'movie_id']);

            $table->unsignedBigInteger('collection_id');
            $table->unsignedBigInteger('movie_id');
            $table->unsignedBigInteger('priority');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
