@extends('layouts.main')
@extends('layouts.nav')

@section('title', 'Show All Movies')
@section('content')

    <div class="tv-info border-b border-gray-800">
        <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
            <img src="{{ $tvshow['poster_path'] }}" alt="parasite-details" class="w-64 md:w-96 pl-10">
            <div class="md:ml-24 lg:ml-24">
                <h2 class="text-4xl semibold mt-5 md:mt-0">{{ $tvshow['name'] }}</h2>
                <div class="flex items-center text-gray-400 text-sm">
                    <i class="fa-solid fa-star text-yellow-500"></i>
                    <span class="ml-1">{{ $tvshow['vote_average'] }}%</span>
                    <span class="mx-2">|</span>
                    <span>{{ $tvshow['first_air_date'] }}</span>
                    <span class="mx-2">|</span>
                    <span>
                        {{ $tvshow['genres'] }}
                    </span>
                </div>
                <p class="text-gray-300 mt-8">
                    {{ $tvshow['overview'] }}
                </p>
                <div class="mt-12">
                    <h4 class="text-white font-semibold">
                        Creators
                    </h4>
                    <div class="flex mt-4">
                        @foreach ($tvshow['crew'] as $crew)
                            <div class="mr-8">
                                <div>{{ $crew['name'] }}</div>
                                <div class="text-sm text-gray-400">
                                    {{ $crew['job'] }}
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>

                <div class="mt-12">


                    <!-- Modal toggle -->
                    @if ($playable != null)
                        <button onclick="setSrc()" data-modal-target="defaultModal" data-modal-toggle="defaultModal"
                            id="trailerButton"
                            class="flex inline-flex items-center text-white-900 bg-yellow-600  text-gray-900 rounded font-semibold px-5 py-4 hover:bg-yellow-500 transition-ease-in-out duration-150"
                            type="button">
                            <span class="material-symbols-outlined">
                                play_circle
                            </span>
                            <span class="ml-2">Play Trailer</span>
                        </button>
                    @endif

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
    <div class="movie-cast border-b border-gray-800">
        <div class="container mx-auto px-20 py-16">
            <h2 class="text-4xl pl-10">Cast</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">


                @foreach ($tvshow['cast'] as $cast)
                    <div class="mt-8">
                        <a href="{{ route('actors.show', $cast['id']) }}">
                            <img src="{{ 'http://image.tmdb.org/t/p/w500' . $cast['profile_path'] }}" alt="actor"
                                class="hover:opacity-75 transition-ease-in-out duration-150">
                        </a>
                        <div class="mt-2">
                            <a href="{{ route('actors.show', $cast['id']) }}"
                                class="text-lg mt-2 hover:text-gray-300">{{ $cast['name'] }}</a>
                            <div class="text-gray-400">{{ $cast['character'] }}.</div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
    </div>
    <div class="movie-cast border-b border-gray-800">
        <div class="container mx-auto px-20 py-16">
            <h2 class="text-4xl pl-10">Images</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-8">
                @foreach ($tvshow['images'] as $image)
                    <div class="mt-8">
                        <div draggable="false">
                            <img src="{{ 'http://image.tmdb.org/t/p/w500' . $image['file_path'] }}" alt="actor"
                                class="hover:opacity-75 transition-ease-in-out duration-150" draggable="false">
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>

@endsection

@if ($playable != null)
    <script>
        function removeSrc() {
            var iframe = document.getElementById("ytvid");
            iframe.src = "";
        }


        function setSrc() {
            var trailerButton = document.getElementById("trailerButton");
            var iframe = document.getElementById("ytvid");
            if ()
                iframe.src = "{{ 'https://www.youtube.com/embed/' . $tvshow['videos']['results'][0]['key'] }}  }}";
        }
    </script>
@endif
