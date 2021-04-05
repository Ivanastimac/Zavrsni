<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Zadaci') }}
        </h2>
    </x-slot>
    <form method = "POST" action="/tasks/update/{{ $task->id }}">
    @csrf
    @method('PUT')
    <div class="row g-3 align-items-center">
    <div class="col-xs-2">
        <label for="taskTitle" class="form-label" >Naslov zadatka</label> </br>
        <input type="text" id="taskTitle" name = "title" value = "{{ $task->title }}">
    </div>
    <div class="col-xs-2">
        <label for="taskBody" class="form-label">Tekst zadatka</label></br>
        <textarea id="taskBody" name = "body" rows="3"> {{ $task->body }} </textarea>
    </div>
    <div class="col-xs-2">
        <label for="taskSolution" class="form-label" >Riješenje zadatka</label></br>
        <textarea id="taskSolution" name = "solution" rows="3"> {{ $task->solution }} </textarea>
    </div>
    <div class="col-xs-2">
        <label for="taskInstructions" class="form-label" >Objašnjenje zadatka</label></br>
        <textarea id="taskInstructions" name = "instructions" rows="3"> {{ $task->instructions }} </textarea>
    </div>
    <div>
    <input type="submit" value = "Spremi promjene" class="btn btn-primary mb-3">
    </div>
    </div>
    </form>
</x-app-layout>

