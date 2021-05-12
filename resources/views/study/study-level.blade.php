<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Zadaci') }}
        </h2>
    </x-slot>
    <table class="table">
        <tbody>
            @foreach ($all as $a)
                <tr>
                <th class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <a href = "/study/task/{{ $a->id }}"><button class="btn btn-success"> {{ $a->title }} </button></a>
                    @foreach ($finished as $b)
                        @if ($a->id == $b->id)
                            <div style="font-family: DejaVu Sans, sans-serif; color: green; vertical-align: bottom;">✔</div>
                        @endif
                    @endforeach 
                </th>
                </tr>
            @endforeach    
        </tbody>
    </table>
</x-app-layout>