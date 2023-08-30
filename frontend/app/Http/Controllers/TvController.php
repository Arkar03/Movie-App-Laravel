<?php

namespace App\Http\Controllers;

use App\ViewModels\TvShowViewModel;
use App\ViewModels\TvViewModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class TvController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::check()) {
            try {
                $popularTv = Http::withToken(config('services.tmdb.token'))
                    ->get('http://api.themoviedb.org/3/tv/popular?api_key=56fd71464778c111dcbc8f16b384cf2f')
                    ->json()['results'];
                $topRatedTv = Http::withToken(config('services.tmdb.token'))
                    ->get('http://api.themoviedb.org/3/tv/top_rated?api_key=56fd71464778c111dcbc8f16b384cf2f')
                    ->json()['results'];
                $genres = Http::withToken(config('services.tmdb.token'))
                    ->get('http://api.themoviedb.org/3/genre/tv/list?api_key=56fd71464778c111dcbc8f16b384cf2f')
                    ->json()['genres'];

            } catch (\Throwable $th) {
                $popularTv = [];
                $topRatedTv = [];
                $genres = [];
            }
            $viewModel = new TvViewModel(
                $popularTv,
                $topRatedTv,
                $genres
            );
            return view('tv.index', $viewModel);
        } else {
            return redirect('/')->with('noauth', 'Please Login to continue');
        }
    }


    public function show(string $id)
    {
        if (Auth::check()) {
            $tvshow = Http::withToken(config('services.tmdb.token'))
                ->get("http://api.themoviedb.org/3/tv/$id?api_key=56fd71464778c111dcbc8f16b384cf2f&append_to_response=credits,videos,images")
                ->json();
            $viewModel = new TvShowViewModel($tvshow);
            return view('tv.show', $viewModel);
        } else {
            return redirect('/')->with('noauth', 'Please Login to continue');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
