<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Zadaci') }}
        </h2>
    </x-slot>
    Razina: {{ $level }} <br>
    Naslov: {{ $task->title }} <br>
    <div class="col-md-3 px-0">
    Tekst zadatka:
    @if($task->bodyText != NULL)
        {{ $task->bodyText }}
    @endif
    @if($task->bodyImage != NULL)
            <img src = "{{ asset('images-tasks/task' . $task->id) }}" class="img-fluid" alt="{{ asset('images-tasks/task' . $task->id) }}">
    @endif
    </div>
    Prvo ponuđeno rješenje: {{ $task->firstAnswer }}
    @if ($task->solution == '1')
        (točno)
    @endif
    <br>
    Drugo ponuđeno rješenje: {{ $task->secondAnswer }}
    @if ($task->solution == '2')
        (točno)
    @endif
    <br>
    Treće ponuđeno rješenje: {{ $task->thirdAnswer }}
    @if ($task->solution == '3')
        (točno)
    @endif
    <br>
    Četvrto ponuđeno rješenje: {{ $task->fourthAnswer }}
    @if ($task->solution == '4')
        (točno)
    @endif
    <br>
    <div class="col-md-3 px-0">
    Objašnjenje:
    @if($task->instructions != NULL)
        {{ $task->instructions }}
    @endif
    @if($task->bodyImageInstructions != NULL)
        <img src = "{{ asset('images-instructions/instructions' . $task->id) }}" class="img-fluid" alt="{{ asset('images-instructions/instructions' . $task->id) }}">
    @endif
    </div>
</x-app-layout>