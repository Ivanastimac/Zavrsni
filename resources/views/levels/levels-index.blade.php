<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Razine') }}
        </h2>
    </x-slot>
    <table class="table">
        <tbody>
            @foreach ($levels as $level)
                <tr>
                <th class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <a href = "/tasks/index/{{ $level->id }}"><button class="btn btn-primary btn-sm"> {{ $level->title }} </button></a>
                </th>
                </tr>
            @endforeach    
        </tbody>
    </table>
    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
        <x-jet-nav-link class="hover:border-blue-500" href="{{ route('levels/create') }}" :active="request()->routeIs('levels/create')">
            {{ __('Dodaj razinu') }}
        </x-jet-nav-link>
    </div>
</x-app-layout>
