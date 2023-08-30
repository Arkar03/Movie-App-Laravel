@extends('layouts.main')
@extends('layouts.nav')


@section('title', 'Movie App')


@section('content')
    {{-- checkout tester start --}}


    {{-- checkout tester end --}}
    <div class="container pt-16">
        @if ($watchlists != [])
            <div class="watchlist mb-20 px-20">
                <h2 class="uppercase tracking-wider text-orange-400 text-lg font-semibold">
                    Watchlists
                </h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                    @foreach ($watchlists as $list)
                        {{-- @dd($list['movie_id'][0]) --}}
                        <div class="mt-8">
                            <a href="{{ route('movies.show', $list['movie_id'][0]) }}">
                                <img src='http://image.tmdb.org/t/p/w500{{ $list['image'][0] }}' alt="poster"
                                    class="hover:opacity-75 transition-ease-in-out duration-150">
                            </a>
                            <div class="mt-2">
                                <a href="{{ route('movies.show', $list['movie_id'][0]) }}"
                                    class="text-lg mt-2 hover:text-gray-300">{{ $list['title'][0] }}</a>
                                <div class="flex items-center text-gray-400 text-sm mt-1">
                                    <i class="fa-solid fa-star text-yellow-500"></i>
                                    <span class="ml-1">{{ $list['rate'][0] * 10 }}%</span>
                                    <span class="mx-2">|</span>
                                    <span>{{ $list['release_date'][0] }}</span>
                                </div>
                                <div class="text-gray-400 text-sm">

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        <div class="popular-movies px-20">
            <h2 class="uppercase tracking-wider text-orange-400 text-lg font-semibold">
                Popular Movies
            </h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                @foreach ($popularMovies as $popularMovie)
                    <x-movie-card :movie="$popularMovie" :genres="$genres" />
                @endforeach

            </div>
        </div>
        <div class="nowplaying-movies mt-20 px-20">
            <h2 class="uppercase tracking-wider text-orange-400 text-lg font-semibold">
                Now Playing
            </h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                @foreach ($nowPlayingMovies as $nowPlayingMovie)
                    <x-movie-card :movie=$nowPlayingMovie />
                @endforeach

            </div>
        </div>
    </div>
@endsection
