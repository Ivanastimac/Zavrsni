<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Zadaci') }}
        </h2>
    </x-slot>
    <table class="table">
        <tbody>
            @foreach ($tasks as $task)
                <tr>
                <th class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <a href = "/study/task/{{ $task->id }}"><button class="btn btn-success"> {{ $task->title }} </button></a>
                </th>
                </tr>
            @endforeach    
        </tbody>
    </table>
</x-app-layout>