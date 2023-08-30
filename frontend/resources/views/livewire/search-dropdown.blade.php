<div class="relative" x-data="{ isOpen: true }" @click.away="isOpen=false">
    <input wire:model.debouce.500ms="search" type="text"
        class="bg-gray-800 rounded-full w-64 px-4 pl-8 py-1 focus:outline-none focus:outline-shodow text-white text-small"
        placeholder="Search" @keypress.all.input="isOpen= true" @keydown.escape.window=" isOpen= false" x-ref="search"
        @keydown.window="
        if(event.keyCode === 191) {
            event.preventDefault();
            $refs.search.focus();
        }">
    <div class="absolute w-4 top-0 mt-1.5 ml-2">
        <span class="material-symbols-sharp">
            search
        </span> 
    </div>
    @if (strlen($search) > 0)
        <div class="z-50 absolute bg-gray-800 rounded w-64 mt-4 text-sm" x-show="isOpen">
            @if ($searchResults->count() > 0)
                <ul>
                    @foreach ($searchResults as $result)
                        <li class="border-b border-gray-700">
                            <a href="{{ route('movies.show', $result['id']) }}"
                                class="block hover:bg-gray-700 px-3 py-3 transition-ease-in-out duration-150 flex items-center"
                                @if ($loop->last) @keydown.tab= "isOpen= false" @endif>
                                @if ($result['poster_path'])
                                    <img class="w-8"
                                        src="https://image.tmdb.org/t/p/w92/.{{ $result['poster_path'] }}"
                                        alt="">
                                @else
                                    <img src="https://placehold.co/8?text=poster" class="w-8" alt="poster">
                                @endif
                                <span class="ml-4">{{ $result['title'] }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            @else
                <div class="px-3 py-3">No result for {{ $search }}</div>
            @endif
        </div>

    @endif

</div>
