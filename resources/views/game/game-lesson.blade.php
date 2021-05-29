<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="{{ asset('css/background.css') }}">
</head>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Razine') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 p-5">
        <div class="grid grid-cols-3">
            <div class="col-start-2 py-3">
                <div class="shadow overflow-hidden sm:rounded-md">
                    <div class="px-4 py-5 bg-white sm:p-6">
                        @foreach ($levels as $level)
                            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex p-2">
                                <a href = "/game/level/{{ $level->id }}"><button class="btn btn-primary btn-sm"> {{ $level->title }} </button></a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>