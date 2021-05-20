<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Zadaci') }}
        </h2>
    </x-slot>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Naslov</th>
                <th scope="col">Tekst zadatka</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
                <tr>
                <th scope="col"> {{ $task->title }} </th>
                <th scope="col">
                @if($task->bodyText != NULL)
                    <span class="d-inline-block text-truncate" style="max-width: 200px;">
                        {{ $task->bodyText }}
                    </span>
                @else 
                    Priložena je slika teksta zadatka
                @endif
                </th>
                <th class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <a href = "/tasks/edit/{{ $task->id }}"><button class="btn btn-success">Promjeni</button></a>
                    <a href = "/tasks/show/{{ $task->id }}"><button class="btn btn-success">Detalji</button></a>
                    <a href = "/tasks/delete/{{ $task->id }}" onclick = "return confirm('Jeste li sigurni da želite izbrisati ovaj zadatak?')"><button class="btn btn-success">Obriši</button></a>
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
