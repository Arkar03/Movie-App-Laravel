<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Watchlist;
use App\ViewModels\MoviesViewModel;
use App\ViewModels\MovieViewModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class MoviesController extends Controller
{

    // public $watchlists = [];

    public function index()
    {
        if (Auth::check()) {
            try {
                $popularMovies = Http::withToken(config('services.tmdb.token'))
                    ->get('http://api.themoviedb.org/3/movie/popular?api_key=56fd71464778c111dcbc8f16b384cf2f')
                    ->json()['results'];
                $nowPlayingMovies = Http::withToken(config('services.tmdb.token'))
                    ->get('http://api.themoviedb.org/3/movie/now_playing?api_key=56fd71464778c111dcbc8f16b384cf2f')
                    ->json()['results'];
                $genres = Http::withToken(config('services.tmdb.token'))
                    ->get('http://api.themoviedb.org/3/genre/movie/list?api_key=56fd71464778c111dcbc8f16b384cf2f')
                    ->json()['genres'];
                $watchlistsids = DB::table('watchlists')->where('userId', Auth::user()->id)->pluck('movieId');
            } catch (\Throwable $th) {
                $popularMovies = [];
                $nowPlayingMovies = [];
                $genres = [];
                $watchlistsids = [];
            }
            foreach ($watchlistsids as $watchlistsid) {
                $title = Movie::where('movie_id', $watchlistsid)->pluck('title');
                $overview = Movie::where('movie_id', $watchlistsid)->pluck('overview');
                $image = Movie::where('movie_id', $watchlistsid)->pluck('poster_path');
                $rate = Movie::where('movie_id', $watchlistsid)->pluck('vote_average');
                $release_date = Movie::where('movie_id', $watchlistsid)->pluck('release_date');
                $movie_id = Movie::where('movie_id', $watchlistsid)->pluck('movie_id');

                $watchlists[] = [
                    'title' => $title,
                    'overview' => $overview,
                    'image' => $image,
                    'rate' => $rate,
                    'release_date' => $release_date,
                    'movie_id' => $movie_id,
                    // 'release_date_formated' => $release_date_formated
                ];
            }

            $viewModel = new MoviesViewModel(
                $popularMovies,
                $nowPlayingMovies,
                $genres,
                isset($watchlists) ? $watchlists : $watchlists = []
            );

            return view('movies.index', $viewModel);
        } else {
            return redirect('/')->with('noauth', 'Please login to continue');
        }
    }

    public function show($id)
    {

        if (Auth::check()) {
            $movie = Http::withToken(config('services.tmdb.token'))
                ->get("http://api.themoviedb.org/3/movie/$id?api_key=56fd71464778c111dcbc8f16b384cf2f&append_to_response=credits,videos,images")
                ->json();
            $watched = Watchlist::where('movieId', $id)->first() ? true : false;
            // dd($watched);
            $viewModel = new MovieViewModel($movie, $watched);

            return view('movies.show', $viewModel);
        }
    }

    public function getList()
    {
        $model = new Watchlist;
        $model->userId = Auth::id();
        $mids = Watchlist::where("userId", $model->userId)->get();
        $lists = "";
        foreach ($mids as $mid) {
            $lists = Http::withToken(config('services.tmdb.token'))
                ->get("http://api.themoviedb.org/3/movie/" . $mid['movieId'] . "?api_key=56fd71464778c111dcbc8f16b384cf2f&append_to_response=credits,videos,images")
                ->json();

            $res = [$lists, $mid];
        }

        return $res;
    }
}
