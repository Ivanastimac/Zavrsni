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
                    <a href = "/levels/index/{{ $lesson->id }}"><button class="btn btn-primary btn-sm"> {{ $lesson->title }} </button></a>
                </th>
                </tr>
            @endforeach    
        </tbody>
    </table>
    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
        <x-jet-nav-link class="hover:border-blue-500" href="{{ route('lessons/create') }}" :active="request()->routeIs('lessons/create')">
            {{ __('Dodaj cjelinu') }}
        </x-jet-nav-link>
    </div>
</x-app-layout>
