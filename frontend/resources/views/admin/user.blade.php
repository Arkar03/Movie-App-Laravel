@extends('layouts.main')

@section('content')
    <div class="flex">
        <!-- Sidebar -->
        <div class="w-1/5">
            <!-- Sidebar content goes here -->
            <div class="border-r border-b sticky top-0">
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
            @include('layouts.admin.nav')

            <!-- Main content goes here -->
            <div class="container mx-auto px-20 pt-6 flex flex-col justify-evenly">
                <h1 class="text-2xl font-bold mb-4 ">Your Account</h1>
                <div class="flex flex-row">

                    <div
                        class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 mr-10">

                        <div class="flex flex-col items-center py-10 max-h-1">
                            <img class="w-24 h-24 mb-3 rounded-full shadow-lg" src="{{ asset('img/profile.jpg') }}"
                                alt="Profile" />
                            <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">
                                {{ strtoupper(auth()->user()->name) }}</h5>
                            <span
                                class="text-sm text-gray-500 dark:text-gray-400">{{ auth()->user()->role > 0 ? 'Admin' : 'User' }}</span>
                            <div class="flex mt-4 space-x-3 md:mt-6">
                                <a href="#"
                                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 transition-ease-in-out duration-150">Edit
                                    Profile
                                </a>
                                <a href="#"
                                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-red-600 bg-red border border-red-300 rounded-lg hover:bg-red-100 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-700 dark:focus:ring-gray-700 transition-ease-in-out duration-150">Delete
                                    Account</a>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col">
                        <div
                            class="w-full max-w-sm h-1/2 mb-4 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                            <div
                                class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">

                                <div class="flex flex-row items-center px-10 pt-5">
                                    <span class="material-symbols-outlined text-black mr-5 text-4xl">
                                        shield_person
                                    </span>
                                    <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">
                                        Total Admins</h5>
                                </div>
                                <div class="flex flex-row justify-start pb-10 pt-2 px-5 text-black text-5xl">
                                    {{ $total_admin_count }}
                                </div>
                            </div>
                        </div>
                        <div
                            class="w-full max-w-sm h-1/2 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                            <div
                                class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">

                                <div class="flex flex-row items-center px-3 pt-1">
                                    <span class="material-symbols-outlined text-black mr-5 text-4xl">
                                        groups
                                    </span>
                                    <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">
                                        Total Users</h5>
                                </div>
                                <div class="flex flex-row items-center pb-10 pt-5 text-black px-5 text-5xl">
                                    {{ $total_user_count }}
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-row justify-end pl-20 pr-60 my-10">
                            <a href="{{ route('admin.createadmin') }}"
                                class="inline-flex items-center px-6 py-4 text-sm font-medium text-center text-black bg-white rounded-lg hover:bg-gray-400 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 transition-ease-in-out duration-150">
                                Create New Admin
                            </a>
                        </div>
                    </div>


                </div>
            </div>
            {{-- <div class="flex flex-row justify-end pl-20 pr-60 my-10">
                <a href="{{ route('admin.createadmin') }}"
                    class="inline-flex items-center px-6 py-4 text-sm font-medium text-center text-black bg-white rounded-lg hover:bg-gray-400 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 transition-ease-in-out duration-150">
                    Create New Admin
                </a>


            </div> --}}

            <div class="container mx-auto px-20 pt-6">
                <h1 class="text-2xl font-bold mb-4">User Details</h1>
                <div class="bg-white rounded-lg shadow overflow-x-auto">
                    <table class="min-w-full">
                        <thead class="bg-zinc-600">
                            <tr>
                                <th class="py-3 px-4 text-left">Name</th>
                                <th class="py-3 px-4 text-left">Email</th>
                                <th class="py-3 px-4 text-left">Role</th>
                                <th class="py-3 px-4 text-left">Change Role</th>
                                <th class="py-3 px-4 text-left">Status</th>
                                <th class="py-3 px-4 text-left">Suspend & Release</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-950">
                            @foreach ($userDatas as $userData)
                                <tr class="text-black">
                                    <td class="py-3 px-4 ">

                                        <a href="{{ route('admin.user.detail', $userData['id']) }}">
                                            {{ $userData['name'] }}
                                        </a>
                                    </td>
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
                                         bg-blue-800 text-white hover:bg-blue-800 @endif

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
