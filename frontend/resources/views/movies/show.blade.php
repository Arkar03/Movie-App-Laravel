@extends('layouts.main')
@extends('layouts.nav')

@section('title', 'Show All Movies')

@section('content')
    <div class="movie-info border-b border-gray-800">
        <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
            <img src="{{ $movie['poster_path'] }}" alt="parasite-details" class="w-64 md:w-96 pl-10">
            <div class="md:ml-24 lg:ml-24">
                <h2 class="text-4xl semibold mt-5 md:mt-0">{{ $movie['title'] }}</h2>
                <div class="flex items-center text-gray-400 text-sm">
                    <i class="fa-solid fa-star text-yellow-500"></i>
                    <span class="ml-1">{{ $movie['vote_average'] }}%</span>
                    <span class="mx-2">|</span>
                    <span>{{ $movie['release_date'] }}</span>
                    <span class="mx-2">|</span>
                    <span>
                        {{ $movie['genres'] }}
                    </span>
                </div>
                <p class="text-gray-300 mt-8">
                    {{ $movie['overview'] }}
                </p>
                <div class="mt-12">
                    <h4 class="text-white font-semibold">
                        Featured Crew
                    </h4>
                    <div class="flex mt-4">
                        @foreach ($movie['crew'] as $crew)
                            <div class="mr-8">
                                <div>{{ $crew['name'] }}</div>
                                <div class="text-sm text-gray-400">
                                    {{-- {{ $crew['job'] }} --}}
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
                <div class="mt-12">

                    <button onclick="setStream()"  data-modal-target="streamModal" data-modal-toggle="streamModal" id="playButton"
                        class="mr-5 flex inline-flex items-center text-white-900 bg-yellow-600  text-gray-900 rounded font-semibold px-5 py-4 hover:bg-yellow-500 transition-ease-in-out duration-150">
                        <span class="material-symbols-outlined">
                            play_circle
                        </span>
                        <span class="ml-2">Play</span>
                    </button>
                    <!-- Main modal -->
                    <div onclick="removeSrc()" id="streamModal" tabindex="-1" aria-hidden="true"
                        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative w-full max-w-2xl max-h-full">
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">

                                <div class="videoWrapper">
                                    <video autoplay  width="1600" height="800" preload="auto" autobuffer controls  id="stream">This Video is not available</video>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Main modal end -->

                    <!-- Modal toggle -->
                    <button onclick="setSrc()" data-modal-target="defaultModal" data-modal-toggle="defaultModal"
                        id="trailerButton"
                        class="flex inline-flex items-center text-white-900 bg-yellow-600  text-gray-900 rounded font-semibold px-5 py-4 hover:bg-yellow-500 transition-ease-in-out duration-150"
                        type="button">
                        <span class="material-symbols-outlined">
                            play_circle
                        </span>
                        <span class="ml-2">Play Trailer</span>
                    </button>

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
                    <!-- Main modal end -->


                    @if ($watched === false)
                        <a href="{{ route('watchlist.add', $movie['id']) }}" id="watchlist"
                            class="ml-5 flex inline-flex items-center text-white-900 bg-yellow-600  text-gray-900 rounded font-semibold px-5 py-4 hover:bg-yellow-500 transition-ease-in-out duration-150"
                            type="button">
                            <span class="material-symbols-outlined">
                                bookmark
                            </span>
                        </a>
                    @else
                        <a href="{{ route('watchlist.remove', $movie['id']) }}" id="watchlist"
                            class="ml-5 flex inline-flex items-center text-white-900 bg-yellow-600  text-gray-900 rounded font-semibold px-5 py-4 hover:bg-yellow-500 transition-ease-in-out duration-150"
                            type="button">
                            <span class="material-symbols-outlined">
                                bookmark_added
                            </span>
                        </a>
                    @endif

                </div>
            </div>
        </div>
    </div>
    <div class="movie-cast border-b border-gray-800">
        <div class="container mx-auto px-20 py-16">
            <h2 class="text-4xl pl-10">Cast</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">


                @foreach ($movie['cast'] as $cast)
                    <div class="mt-8">
                        <a href="{{ route('actors.show', $cast['id']) }}">
                            <img src="{{ 'http://image.tmdb.org/t/p/w500' . $cast['profile_path'] }}" alt="actor"
                                class="hover:opacity-75 transition-ease-in-out duration-150">
                        </a>
                        <div class="mt-2">
                            <a href="{{ route('actors.show', $cast['id']) }}"
                                class="text-lg mt-2 hover:text-gray-300">{{ $cast['name'] }}</a>
                            {{-- <div class="text-gray-400">{{ $cast['character'] }}.</div> --}}
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
                @foreach ($movie['images'] as $image)
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

<script>
    const removeSrc = () => {
        var iframe = document.getElementById("ytvid");
        var stream = document.getElementById("stream");
        stream.src = "";
        iframe.src = "";
    }

    const setSrc = () => {
        var trailerButton = document.getElementById("trailerButton");
        var iframe = document.getElementById("ytvid");
        iframe.src = "{{ 'https://www.youtube.com/embed/' . $movie['videos']['results'][0]['key'] }}";
    }
    const setStream = () => {
        var playButton = document.getElementById("playButton");
        var stream = document.getElementById("stream");
        stream.src = "{{ asset('vid/569094.mp4') }}";
    }

    const watchlist = (movieId) => {

        console.log(movieId);
        axios.get(`/watchlist/add/${movieId}`)
            .then(function(response) {
                console.log(response);
            }).catch(error => {
                console.log(error);
            })
    }
</script>
