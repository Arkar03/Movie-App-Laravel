@extends('layouts.main')
@extends('layouts.admin.nav')

@section('content')
    <div class="flex">
        <!-- Sidebar -->
        <div class="w-1/5">
            <!-- Sidebar content goes here -->
            <div class="border-r border-b">
                <a href="{{ route('admin.dashboard') }}"
                    class="relative inline-flex items-center w-full px-4 py-2 text-lg  border-b border-gray-200  hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:border-gray-600 dark:hover:bg-gray-600 dark:hover:text-white dark:focus:ring-gray-500 dark:focus:text-white transition-ease-in-out duration-150">
                    <span class="material-symbols-outlined mr-3">
                        dashboard
                    </span>
                    Dashboard
                </a>

                <a href="{{ route('admin.dashboard') }}"
                    class="relative inline-flex items-center w-full px-4 py-2 text-lg  border-b border-gray-200  hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:border-gray-600 dark:hover:bg-gray-600 dark:hover:text-white dark:focus:ring-gray-500 dark:focus:text-white transition-ease-in-out duration-150">
                    <span class="material-symbols-outlined mr-3">
                        account_circle
                    </span>
                    Profile
                </a>
                <a href="{{ route('admin.dashboard') }}"
                    class="relative inline-flex items-center w-full px-4 py-2 text-lg border-b border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:border-gray-600 dark:hover:bg-gray-600 dark:hover:text-white dark:focus:ring-gray-500 dark:focus:text-white transition-ease-in-out duration-150">
                    <span class="material-symbols-outlined mr-3">
                        movie
                    </span>
                    Movies
                </a>
                <a href="{{ route('admin.user') }}"
                    class="relative inline-flex items-center w-full px-4 py-2 text-lg bg-gray-100 text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:border-gray-600 dark:hover:bg-gray-600 dark:hover:text-white dark:focus:ring-gray-500 dark:focus:text-white transition-ease-in-out duration-150">
                    <span class="material-symbols-outlined mr-3">
                        group
                    </span>
                    Users
                </a>

            </div>


        </div>

        <!-- Content Area -->

        <div class="w-4/5 p-4 flex flex-col">
            <!-- Main content goes here -->
            <div class="d-block ">
                <h1 class="text-3xl my-10 ml-2">{{ $user['name'] }}'s profile</h1>
            </div>
            <div class="bg-white rounded shadow-md  w-full relative" style="height: 240px">
                <a href="{{ route('admin.user') }}" class="absolute top-2 ml-10 mt-5 z-10 ">
                    {{-- <span class="material-symbols-outlined text-gray-800 text-3xl">
                        arrow_back_ios
                    </span> --}}
                    <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 -960 960 960" width="48"><path d="M400-80 0-480l400-400 56 57-343 343 343 343-56 57Z"/></svg>
                </a>
            </div>
            @if ($user['avatar'] === null)
                <div class="bg-green-500 flex justify-center items-center rounded-full z-10 ml-5"
                    style="width: 9rem; height:9rem; margin-top:-80px">
                    <span class="text-white text-lg font-bold">{{ $user_profile }}</span>
                </div>
            @else
                <img src="{{ $user_profile }}" alt="profile" class="rounded-full z-10 ml-5"
                    style="width: 9rem; height:9rem; margin-top:-80px">
            @endif

            <div class="mt-10 mx-auto container">
                <div class="flex flex-col justify-center">
                    <h1 class="d-inline">User Details</h1>
                    <div>
                        <h1>{{ $user['name'] }}</h1>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>
@endsection
