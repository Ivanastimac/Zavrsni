<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cjeline') }}
        </h2>
    </x-slot>
    <table class="table">
        <tbody>
            @foreach ($lessons as $lesson)
                <tr>
                <th class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <a href = "/game/lesson/{{ $lesson->id }}"><button class="btn btn-success"> {{ $lesson->title }} </button></a>
                </th>
                </tr>
            @endforeach
            @if (session('alert'))
                <div class="alert alert-success">
                    {{ session('alert') }}
                </div>
            @endif   
        </tbody>
    </table>
</x-app-layout>