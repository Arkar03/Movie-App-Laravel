<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use App\Models\Movie; // Assuming your model is named Movie
class MovieSeeder extends Seeder
{
    public function run()
    {
        $response = Http::get("https://api.themoviedb.org/3/movie/popular", [
            'api_key' => env('TMDB_TOKEN'),
        ]);
        $movies = $response->json()['results'];
        foreach ($movies as $movie) {
            Movie::create([
                'movie_id' => $movie['id'],
                'adult' => $movie['adult'],
                'backdrop_path' => $movie['backdrop_path'],
                'tmdb_id' => $movie['id'],
                'original_title' => $movie['original_title'],
                'overview' => $movie['overview'],
                'popularity' => $movie['popularity'],
                'poster_path' => $movie['poster_path'],
                'release_date' => $movie['release_date'],
                'title' => $movie['title'],
                // 'video' => $movie['video'],
                'vote_average' => $movie['vote_average'],
                // 'vote_count' => $movie['vote_count'],
            ]);
        }
    }
}
