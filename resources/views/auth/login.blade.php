@extends('layouts.app')

@section('title', 'Sign in')

@section('content')
    <div class="max-w-md mx-auto mt-12 bg-white rounded-2xl shadow-lg overflow-hidden">

        <div class="bg-emerald-600 text-white px-6 py-5">
            <h1 class="text-2xl font-bold">Bakuna Tracker</h1>
            <p class="text-emerald-100 text-sm">Purok Palparan</p>
        </div>

        <form method="POST" action="/login" class="p-6 space-y-4">
            @csrf

            <div>
                <label for="email" class="block text-sm font-medium mb-1">Email address</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}"
                       class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-emerald-500">
                @error('email')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password" class="block text-sm font-medium mb-1">Password</label>
                <input id="password" type="password" name="password"
                       class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-emerald-500">
                @error('password')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button class="w-full bg-emerald-600 hover:bg-emerald-700 text-white font-semibold rounded-lg p-2">
                Sign in
            </button>
        </form>
    </div>
@endsection