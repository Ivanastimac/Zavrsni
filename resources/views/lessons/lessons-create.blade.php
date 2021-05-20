<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="{{ asset('css/lessons-create.css') }}">

    <!-- Include the Livewire styles -->
    @livewireStyles
</head>
<body>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cjeline') }}
        </h2>
    </x-slot>

@livewire('lessons-create')

</x-app-layout>
</body>
</html>

