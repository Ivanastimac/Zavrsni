<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Zadatak') }}
        </h2>
    </x-slot>
    <table class="table">
        <tbody>

            @if($task->bodyText != NULL)
                {{ $task->bodyText }}
            @endif
            @if($task->bodyImage != NULL)
                <img src = "{{ asset('images-tasks/task' . $task->id) }}" alt="{{ asset('images-tasks/task' . $task->id) }}">
            @endif
            
            <br />

            <form method="POST" action="{{ url('/study/solution/'. $task->id) }}">
                @csrf
                <input type="radio" id="1" name="answer" value="1">
                <label for="1">{{ $task->firstAnswer }}</label><br />
                <input type="radio" id="2" name="answer" value="2">
                <label for="2">{{ $task->secondAnswer }}</label><br />
                <input type="radio" id="3" name="answer" value="3">
                <label for="3">{{ $task->thirdAnswer }}</label><br />
                <input type="radio" id="4" name="answer" value="4">
                <label for="4">{{ $task->fourthAnswer }}</label><br />
                <input type="submit" value="Predaj odgovor">
            </form>
        </tbody>
    </table>
</x-app-layout>