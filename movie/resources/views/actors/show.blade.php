@extends('layouts.main')
@extends('layouts.nav')

@section('title', 'Show All Movies')

@section('content')
    <div class="movie-info border-b border-gray-800">
        <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
            <div class="flex-none">
                <img src='{{ $actor['profile_path'] }}' alt="parasite-details" class="w-64 md:w-96 pl-10">
                <ul class="flex items-center mt-4 gap-4 ml-10">
                    @if ($social['facebook'])
                        <li>
                            <a target="_blank" href="{{ $social['facebook'] }}" title="Facebook">
                                <i class="fa-brands fa-square-facebook fa-2xl"></i>
                            </a>
                        </li>
                    @endif
                    @if ($social['instagram'])
                        <li>
                            <a target="_blank" href="{{ $social['instagram'] }}" title="Instagram">
                                <i class="fa-brands fa-instagram fa-2xl"></i>
                            </a>
                        </li>
                    @endif
                    @if ($social['twitter'])
                        <li>
                            <a target="_blank" href="{{ $social['twitter'] }}" title="Twitter">
                                <i class="fa-brands fa-twitter fa-2xl"></i>
                            </a>
                        </li>
                    @endif
                    @if ($actor['homepage'])
                        <li>
                            <a target="_blank" href="{{ $actor['homepage'] }}" title="Website">
                                <i class="fa-solid fa-earth-africa fa-2xl"></i>
                            </a>
                        </li>
                    @endif

                </ul>
            </div>
            <div class="md:ml-24 lg:ml-24">
                <h2 class="text-4xl semibold mt-5 md:mt-0">{{ $actor['name'] }}</h2>
                <div class="flex items-center text-gray-400 text-sm">
                    <i class="fa-solid fa-cake-candles fa-xl mt-0"></i>
                    <span class="ml-2 mt-2">{{ $actor['birthday'] }}( {{ $actor['age'] }} years old ) in
                        {{ $actor['place_of_birth'] }}</span>

                </div>
                <p class="text-gray-300 mt-8">
                    {{ $actor['biography'] }}
                </p>
                <h4 class="font-semibold mt-12">Known For</h4>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-8">


                    @foreach ($knownForMovies as $movie)
                        <div class="mt-4">
                            <a href="{{ $movie['linkToPage'] }}"><img src="{{ $movie['poster_path'] }}" alt="poster"
                                    class="hover:opacity-75 transition ease-in-out duration-150"></a>
                            <a href="{{ $movie['linkToPage'] }}"
                                class="text-sm leading-normal block text-gray-400 hover:text-white mt-1">{{ $movie['title'] }}</a>
                        </div>
                    @endforeach
                </div>


                <div class="mt-12">


                    <!-- Modal toggle -->
                    {{-- <button onclick="setSrc()" data-modal-target="defaultModal" data-modal-toggle="defaultModal"
                        id="trailerButton"
                        class="flex inline-flex items-center text-white-900 bg-yellow-600  text-gray-900 rounded font-semibold px-5 py-4 hover:bg-yellow-500 transition-ease-in-out duration-150"
                        type="button">
                        <span class="material-symbols-outlined">
                            play_circle
                        </span>
                        <span class="ml-2">Play Trailer</span>
                    </button> --}}

                    <!-- Main modal -->
                    <div onclick="removeSrc()" id="defaultModal" tabindex="-1" aria-hidden="true"
                        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative w-full max-w-2xl max-h-full">
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <div class="videoWrapper">
                                    <iframe id="ytvid" class="w-800 h-450" title="YouTube video player" frameborder="0"
                                        allowfullscreen>
                                    </iframe>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

    <div class="credits border-b border-gray-800">
        <div class="container mx-auto px-20 py-16">
            <h2 class="text-4xl pl-10">Credits</h2>
            <ul>
                @foreach ($credits as $credit)
                    <li>
                        {{ $credit['release_year'] }} &middot;
                        <strong><a href="{{ $credit['linkToPage'] }}"
                                class="hover:underline">{{ $credit['title'] }}</a></strong>
                        as {{ $credit['character'] }}
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    </div>
    <div class="movie-cast border-b border-gray-800">
        <div class="container mx-auto px-20 py-16">
            <h2 class="text-4xl pl-10">Images</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-8">
                {{-- @foreach ($movie['images'] as $image)
                    <div class="mt-8">
                        <a href="#">
                            <img src="{{ 'http://image.tmdb.org/t/p/w500' . $image['file_path'] }}" alt="actor"
                                class="hover:opacity-75 transition-ease-in-out duration-150">
                        </a>
                    </div>
                @endforeach --}}
            </div>
        </div>

    </div>

@endsection
