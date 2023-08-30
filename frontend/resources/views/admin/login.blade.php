@extends('layouts.main')
@section('title', 'Admin Login')

@section('content')
    <section class="bg-gray-50 min-h-screen flex items-center justify-center">
        @if (session('noauth'))
            <div class="alert alert-success">
                {{ session('noauth', 'Please login to continue') }}
            </div>
        @endif
        <!-- login container -->
        <div class="bg-gray-100 flex rounded-2xl shadow-lg max-w-3xl p-5 items-center">
            <!-- form -->
            <div class="md:w-1/2 px-8 md:px-16">
                <h2 class="font-bold text-2xl text-[#002D74] pl-2">Admin Login</h2>
                <form action="" method="POST" class="flex flex-col gap-4">
                    @csrf
                    <input class="p-2 mt-8 rounded-xl border text-black" type="email" name="email" placeholder="Email">
                    <div class="relative">
                        <input class="p-2 rounded-xl border w-full text-black" type="password" name="password"
                            placeholder="Password">
                    </div>
                    <button type="submit"
                        class="bg-[#002D74] rounded-xl text-white py-2 hover:scale-105 duration-300 text-center">Login</button>
                </form>


            </div>

            <!-- image -->
            <div class="md:block hidden w-1/2">
                <img class="rounded-2xl lg:h-[650px]" src="{{ asset('img/login.jpg') }}">
            </div>
        </div>
    </section>

@endsection
