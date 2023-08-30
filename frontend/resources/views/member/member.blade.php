@extends('layouts.main')

@section('title', 'Members')

@section('content')

    <div class="flex flex-wrap justify-center gap-4  items-center justify-center pt-20">
        <!-- Member 1 -->
        <div class="w-full sm:w-1/2 md:w-1/5 mt-20 ">
            <a href="{{ route('auth.login') }}">
                <img class="hover:opacity-75 transition-ease-in-out duration-150"
                    src="https://images.unsplash.com/photo-1680506068034-c6e4f36b7efb?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=580&q=80"
                    alt="">
                <div class="mt-5 text-center">Arkar Min</div>
            </a>
        </div>

        <!-- Member 2 -->
        <div class="w-full sm:w-1/2 md:w-1/5 mt-20">
            <a href="{{ route('auth.login') }}">
                <img class="hover:opacity-75 transition-ease-in-out duration-150"
                    src="https://images.unsplash.com/photo-1680506068034-c6e4f36b7efb?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=580&q=80"
                    alt="">
                <div class="mt-5 text-center">ARKAR MIN</div>
            </a>
        </div>

        <!-- Member 3 -->
        <div class="w-full sm:w-1/2 md:w-1/5 mt-20">
            <img class="hover:opacity-75 transition-ease-in-out duration-150"
                src="https://images.unsplash.com/photo-1680506068034-c6e4f36b7efb?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=580&q=80"
                alt="">
            <div class="mt-5 text-center">Member 3</div>
        </div>

        <!-- Member 4 -->
        <div class="w-full sm:w-1/2 md:w-1/5 mt-20">
            <img class="hover:opacity-75 transition-ease-in-out duration-150"
                src="https://images.unsplash.com/photo-1680506068034-c6e4f36b7efb?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=580&q=80"
                alt="">
            <div class="mt-5 text-center">Member 3</div>
        </div>
    </div>

@endsection
