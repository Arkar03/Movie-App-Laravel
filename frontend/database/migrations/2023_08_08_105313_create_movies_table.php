<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoviesTable extends Migration
{
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->integer('movie_id');
            $table->boolean('adult');
            $table->string('backdrop_path')->nullable();
            $table->json('belongs_to_collection')->nullable();
            $table->unsignedBigInteger('budget')->nullable();
            $table->string('homepage')->nullable();
            $table->unsignedBigInteger('tmdb_id')->unique();
            $table->string('imdb_id')->nullable();
            $table->string('original_title');
            $table->text('overview');
            $table->float('popularity');
            $table->string('poster_path')->nullable();
            $table->date('release_date');
            $table->string('tagline')->nullable();
            $table->string('title');
            $table->float('vote_average');
            // Add more columns as needed
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('movies');
    }
}
