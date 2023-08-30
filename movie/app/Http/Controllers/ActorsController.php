<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ViewModels\ActorViewModel;
use App\ViewModels\ActorsViewModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class ActorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($page = 1)
    {
        if (Auth::check()) {
            abort_if($page > 500, 204);

            try {
                $popularActors = Http::withToken(config('services.tmdb.token'))
                    ->get('http://api.themoviedb.org/3/person/popular?api_key=56fd71464778c111dcbc8f16b384cf2f&page=' . $page)
                    ->json()['results'];
            } catch (\Throwable $th) {
                $popularActors = [];
            }
            $viewModel = new ActorsViewModel($popularActors, $page);

            return view('actors.index', $viewModel);
        } else {
            return redirect('/')->with('noauth', 'Please login to continue');
        }
    }

    public function show($id)
    {
        $actor = Http::withToken(config('services.tmdb.token'))
            ->get("http://api.themoviedb.org/3/person/$id?api_key=56fd71464778c111dcbc8f16b384cf2f")
            ->json();

        $social = Http::withToken(config('services.tmdb.token'))
            ->get("http://api.themoviedb.org/3/person/$id/external_ids?api_key=56fd71464778c111dcbc8f16b384cf2f")
            ->json();

        $credits = Http::withToken(config('services.tmdb.token'))
            ->get("http://api.themoviedb.org/3/person/$id/combined_credits?api_key=56fd71464778c111dcbc8f16b384cf2f")
            ->json();

        $viewModel = new ActorViewModel($actor, $social, $credits);

        return view('actors.show', $viewModel);
    }
}
