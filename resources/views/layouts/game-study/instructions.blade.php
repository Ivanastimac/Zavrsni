<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Zadatak') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="py-3">
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
</x-app-layout>