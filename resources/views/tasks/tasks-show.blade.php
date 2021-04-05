<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Zadaci') }}
        </h2>
    </x-slot>
    ID: {{ $task->id }} <br>
    Naslov: {{ $task->title }} <br>
    Tijelo zadatka: {{ $task->body }} <br>
    Riješnje: {{ $task->solution }} <br>
    Objašnjenje: {{ $task->instructions }} <br>
    Razina: {{ $task->level }} <br>
</x-app-layout>