<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="{{ asset('css/tasks-index.css') }}">
</head>
<body>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Zadaci') }}
        </h2>
    </x-slot>
    <table class="table table-striped">
        <thead>
            <tr>
                <th class="fs-5 text-secondary p-1" scope="col">Naslov zadatka</th>
                <th class="fs-5 text-secondary p-1" scope="col">Tekst zadatka</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
                <tr>
                <td scope="col"> {{ $task->title }} </td>
                <td scope="col">
                @if($task->bodyText != NULL)
                    <span class="d-inline-block text-truncate" style="max-width: 200px;">
                        {{ $task->bodyText }}
                    </span>
                @else 
                    Priložena je slika teksta zadatka
                @endif
                </td>
                <td class="hidden space-x-8 sm:-my-px sm:flex ps-5" style="background-color:white;border:none">
                    <a href = "/tasks/edit/{{ $task->id }}"><button class="btn btn-primary btn-sm">Promjeni</button></a>
                    <a href = "/tasks/show/{{ $task->id }}"><button class="btn btn-primary btn-sm">Detalji</button></a>
                    <a href = "/tasks/delete/{{ $task->id }}" onclick = "return confirm('Jeste li sigurni da želite izbrisati ovaj zadatak?')"><button class="btn btn-primary btn-sm">Obriši</button></a>
                </td>
                </tr>
            @endforeach    
        </tbody>
    </table>
    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
        <x-jet-nav-link class="hover:border-blue-500" href="{{ route('tasks/create') }}" :active="request()->routeIs('tasks/create')">
            {{ __('Dodaj zadatak') }}
        </x-jet-nav-link>
    </div>
</x-app-layout>
</body>
</html>
