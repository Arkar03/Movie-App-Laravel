<nav class="border-b border-gray-800 bg-slate-950 sticky top-0">

    <div class="container mx-15 flex flex-col md:flex-row items-center justify-between px-6 py-6">
        <ul class="flex flex-col md:flex-row items-center">
            <li>
                <a href="{{ route('movies.index') }}">
                    <h1 class="text-white text-3xl mb-2">
                        Dashboard
                    </h1>
                </a>
            </li>
        </ul>

        <div class="flex flex-col md:flex-row items-center">

            <div class="md:ml-4 mt-3 md:mt-0">
                <button id="dropdownUserAvatarButton" data-dropdown-toggle="dropdownAvatar"
                    class="flex mx-3 text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                    type="button">
                    <span class="sr-only">Open user menu</span>
                    <img class="w-8 h-8 rounded-full" src="{{ asset('img/profile.jpg') }}" alt="user photo">
                </button>
                <!-- Dropdown menu -->
                <div id="dropdownAvatar"
                    class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                    <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
                        <div>{{ auth()->user()->name }}</div>
                        <div class="font-medium truncate">{{auth()->user()->email}}</div>
                    </div>
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"

                        aria-labelledby="dropdownUserAvatarButton">
                        @if (auth()->user()->role > 0)
                            <li>
                                <a href="{{ route('admin.dashboard') }}"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
                            </li>
                        @endif

                        <li>
                            <a href="#"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
                        </li>
                        <li>
                            <a href="#"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Earnings</a>
                        </li>
                    </ul>
                    <div class="py-2">
                        <a href="{{ route('auth.logout') }}"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign
                            out
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
