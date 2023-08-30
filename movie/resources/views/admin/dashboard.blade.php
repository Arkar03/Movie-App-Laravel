@extends('layouts.main')


@section('content')
    <div class="flex">
        <!-- Sidebar -->
        <div class="w-1/5">
            <!-- Sidebar content goes here -->
            <div class="border-r border-b pt70-10 sticky top-0">
                <div class="flex flex-col items-center border-b border-gray-200 bg-slate-950 py-5">
                    <img class="w-24 h-24 mb-3 rounded-full shadow-lg" src="{{ asset('img/profile.jpg') }}" alt="Profile" />
                    <h5 class="mb-1 text-xl font-medium text-white dark:text-white">
                        {{ strtoupper(auth()->user()->name) }}</h5>
                    <span
                        class="text-sm text-gray-500 dark:text-gray-400">{{ auth()->user()->role > 0 ? 'Admin' : 'User' }}</span>
                    <div class="flex mt-4 space-x-3 md:mt-6">
                        <a href="#"
                            class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 transition-ease-in-out duration-150">Edit
                            Profile
                        </a>
                        <a href="#"
                            class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-red-500 border-red-300 rounded-lg hover:opacity-70 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-700 dark:focus:ring-gray-700 transition-ease-in-out duration-150">Delete
                            Account</a>
                    </div>
                </div>
                <a href="{{ route('admin.dashboard') }}"
                    class="relative inline-flex items-center w-full px-4 py-2 text-lg  border-b border-gray-200  hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:border-gray-600 dark:hover:bg-gray-600 dark:hover:text-white dark:focus:ring-gray-500 dark:focus:text-white "">
                    <span class="material-symbols-outlined mr-3">
                        dashboard
                    </span>
                    Dashboard
                </a>

                <a href="{{ route('admin.dashboard') }}"
                    class="relative inline-flex items-center w-full px-4 py-2 text-lg  border-b border-gray-200  hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:border-gray-600 dark:hover:bg-gray-600 dark:hover:text-white dark:focus:ring-gray-500 dark:focus:text-white "">
                    <span class="material-symbols-outlined mr-3">
                        account_circle
                    </span>
                    Profile
                </a>
                <a href="{{ route('admin.dashboard') }}"
                    class="relative inline-flex items-center w-full px-4 py-2 text-lg border-b border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:border-gray-600 dark:hover:bg-gray-600 dark:hover:text-white dark:focus:ring-gray-500 dark:focus:text-white">
                    <span class="material-symbols-outlined mr-3">
                        movie
                    </span>
                    Movies
                </a>
                <a href="{{ route('admin.user') }}"
                    class="relative inline-flex items-center w-full px-4 py-2 text-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:border-gray-600 dark:hover:bg-gray-600 dark:hover:text-white dark:focus:ring-gray-500 dark:focus:text-white">
                    <span class="material-symbols-outlined mr-3">
                        group
                    </span>
                    Users
                </a>

            </div>


        </div>

        <!-- Content Area -->
        <div class="w-4/5 px-4 pb-4 pt-0">
            @include('layouts.admin.nav')
            <!-- Main content goes here -->
            <div class="container mx-auto px-20 pt-6">

                <div
                    class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex justify-end px-4 pt-4">
                        <button id="dropdownButton" data-dropdown-toggle="dropdown"
                            class="inline-block text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-1.5"
                            type="button">
                            <span class="sr-only">Open dropdown</span>
                            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                viewBox="0 0 16 3">
                                <path
                                    d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
                            </svg>
                        </button>
                        <!-- Dropdown menu -->
                        <div id="dropdown"
                            class="z-10 hidden text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                            <ul class="py-2" aria-labelledby="dropdownButton">
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Edit</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Export
                                        Data</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Delete</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    {{-- <div class="flex flex-col items-center pb-10">
                        <img class="w-24 h-24 mb-3 rounded-full shadow-lg" src="/docs/images/people/profile-picture-3.jpg"
                            alt="Bonnie image" />
                        <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">Bonnie Green</h5>
                        <span class="text-sm text-gray-500 dark:text-gray-400">Visual Designer</span>
                        <div class="flex mt-4 space-x-3 md:mt-6">
                            <a href="#"
                                class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add
                                friend</a>
                            <a href="#"
                                class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-gray-900 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-700 dark:focus:ring-gray-700">Message</a>
                        </div>
                    </div> --}}
                </div>

            </div>
            <div class="container mx-auto px-20 pt-6">
                <h1 class="text-2xl font-bold mb-4">User Details</h1>
                <div class="bg-white rounded-lg shadow overflow-x-auto">
                    <table class="min-w-full">
                        <thead class="bg-blue-800">
                            <tr>
                                <th class="py-3 px-4 text-left">Name</th>
                                <th class="py-3 px-4 text-left">Email</th>
                                <th class="py-3 px-4 text-left">Role</th>
                                <th class="py-3 px-4 text-left">Change Role</th>
                                <th class="py-3 px-4 text-left">Status</th>
                                <th class="py-3 px-4 text-left">Suspend & Release</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-blue-700">
                            @foreach ($userDatas as $userData)
                                <tr class="text-black">
                                    <td class="py-3 px-4 ">{{ $userData['name'] }}</td>
                                    <td class="py-3 px-4">{{ $userData['email'] }}</td>
                                    <td class="py-3 px-4">
                                        {!! $userData['role'] > 0
                                            ? " <span class='rounded-full bg-blue-700 px-3 py-2 text-white text-sm'>Admin</span>"
                                            : " <span class='rounded-full bg-yellow-400 px-4 py-2 text-white text-sm'>User</span> " !!}
                                    </td>
                                    <td>

                                        <a class="border
                                         @if ($userData['role'] > 0) border-yellow-400 text-yellow-400 hover:bg-yellow-400
                                         @else
                                         border-blue-800 text-blue-800 hover:bg-blue-800 @endif

                                          hover:text-white px-4 py-2 rounded-md transition-colors duration-300"
                                            href="{{ route('admin.changerole', $userData['id']) }}">{{ $userData['role'] > 0 ? 'User' : 'Admin' }}</a>
                                    </td>
                                    <td class="py-3 px-4">
                                        {!! $userData['ban'] > 0
                                            ? " <span class='rounded-full bg-red-600 px-2 py-2 text-white text-sm'>Banned</span>"
                                            : " <span class='rounded-full bg-green-600 px-3 py-2 text-white text-sm'>Active</span>" !!}
                                    </td>
                                    <td class="py-3 px-4">
                                        @if ($userData['ban'] > 0)
                                            <a href="{{ route('admin.suspend', $userData['id']) }}"
                                                class="border border-green-500 text-green-500 hover:bg-green-500 hover:text-white px-4 py-2 rounded-md transition-colors duration-300">
                                                Active
                                            </a>
                                        @else
                                            <a href="{{ route('admin.suspend', $userData['id']) }}"
                                                class="border border-red-600 text-red-600 hover:bg-red-600 hover:text-white px-4 py-2 rounded-md transition-colors duration-300">
                                                Suspend
                                            </a>
                                        @endif

                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>


    </div>
@endsection
