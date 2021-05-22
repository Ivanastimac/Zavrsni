<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Zadatak') }}
        </h2>
    </x-slot>
    <table class="table">
        <tbody>
            @if($task->instructions != NULL)
                {{ $task->instructions }}
            @endif
            @include('image-instructions-display')
            <br />
            @yield('link')
            <button class="btn btn-success"> Povratak na zadatke </button></a>
        </tbody>
    </table>
</x-app-layout>