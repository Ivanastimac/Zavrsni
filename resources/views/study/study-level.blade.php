<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="{{ asset('css/background.css') }}">
</head>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Zadaci') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 p-5">
        <div class="grid grid-cols-3">
            <div class="col-start-2 py-3">
                <div class="shadow overflow-hidden sm:rounded-md">
                    <div class="px-4 py-5 bg-white sm:p-6">
                        @foreach ($all as $a)
                            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex p-2">
                                <a href = "/study/task/{{ $a->id }}"><button class="btn btn-primary btn-sm"> {{ $a->title }} </button></a>
                                @foreach ($finished as $b)
                                    @if ($a->id == $b->id)
                                        <div style="font-family: DejaVu Sans, sans-serif; color: green; vertical-align: bottom;">✔</div>
                                    @endif
                                @endforeach 
                            </div>
                        @endforeach    
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>