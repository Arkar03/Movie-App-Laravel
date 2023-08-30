@extends('layouts.main')
@extends('layouts.nav')

@section('content')
    <div class="container mx-auto px-4 pt-16">
        <div class="popular-tv px-20">
            <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">Popular Shows</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                @foreach ($popularTv as $tvshow)
                    <x-tv-card :tvShow="$tvshow" />
                @endforeach

            </div>
        </div>

        <div class="top-rated-shows py-24 px-20">
            <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">Top Rated Shows</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                @foreach ($topRatedTv as $tvshow)
                    <x-tv-card :tvShow="$tvshow" />
                @endforeach
            </div>
        </div>
    </div>
@endsection
