<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Zadaci') }}
        </h2>
    </x-slot>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Naslov</th>
                <th scope="col">Razina</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
                <tr>
                <th scope="col"> {{ $task->id }} </th>
                <th scope="col"> {{ $task->title }} </th>
                <th scope="col"> {{ $task->level }} </th>
                <th class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <a href = "/tasks/edit/{{ $task->id }}"><button class="btn btn-success">Promjeni</button></a>
                    <a href = "/tasks/show/{{ $task->id }}"><button class="btn btn-success">Detalji</button></a>
                    <a href = "/tasks/delete/{{ $task->id }}"><button class="btn btn-success">Obriši</button></a>
                </th>
                </tr>
            @endforeach    
        </tbody>
    </table>
    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
        <x-jet-nav-link href="{{ route('tasks/create') }}" :active="request()->routeIs('tasks/create')">
            {{ __('Dodaj zadatak') }}
        </x-jet-nav-link>
    </div>
</x-app-layout>
