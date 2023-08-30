<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = [
        'adult',
        'backdrop_path',
        'belongs_to_collection',
        'budget',
        'genres',
        'homepage',
        'tmdb_id',
        'imdb_id',
        'original_language',
        'original_title',
        'overview',
        'popularity',
        'poster_path',
        'production_companies',
        'production_countries',
        'release_date',
        'revenue',
        'runtime',
        'spoken_languages',
        'status',
        'tagline',
        'title',
        'video',
        'vote_average',
        'vote_count',
        // Add more fields as needed
    ];
    protected $casts = [
        'genres' => 'array',
        'belongs_to_collection' => 'json',
        'production_companies' => 'array',
        'production_countries' => 'array',
        'spoken_languages' => 'array',
    ];
}
