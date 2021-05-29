<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="{{ asset('css/background.css') }}">
</head>
<body> 
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Zadatak') }}
        </h2>
    </x-slot>
    <x-slot name="slot">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 p-5">
        <div class="grid grid-cols-3">
            <div class="col-start-2 py-3">
                <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            @if($task->instructions != NULL)
                                {{ $task->instructions }}
                            @endif
                            @include('image-instructions-display')
                            @yield('link')
                            <div class="pt-2">
                                <button class="btn btn-primary btn-sm"> Povratak na zadatke </button></a>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
    </x-slot>
</x-app-layout>