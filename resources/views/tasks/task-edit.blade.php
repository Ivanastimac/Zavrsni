<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Zadaci') }}
        </h2>
    </x-slot>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form method = "POST" action="/tasks/update/{{ $task->id }}">
    @csrf
    @method('PUT')
    <div class="row g-3 align-items-center">
    <div class="col-xs-2">
        <label for="taskTitle" class="form-label" >Naslov zadatka</label> </br>
        <input type="text" id="taskTitle" name = "titleTask" value = "{{ $task->title }}">
    </div>
    <div class="col-xs-2">
        <label for="taskBody" class="form-label">Tekst zadatka</label></br>
        <textarea id="taskBody" name = "body" rows="3"> {{ $task->bodyText }} </textarea>
    </div>
    <div>
    <!-- prikaz slike -->
        Slika zadatka </br>
        @if($task->bodyImage != NULL)
                <img src = "{{ asset('images-tasks/task' . $task->id) }}" alt="{{ asset('images-tasks/task' . $task->id) }}">
        @endif
        <input type="file" name="taskImage" class="custom-file-input" id="chooseFile">
    </div>
    <div class="col-xs-2">
        <label for="taskAnswer1" class="form-label">Prvi odgovor</label></br>
        <input type="text" id="taskAnswer1" name = "taskAnswer1" value = "{{ $task->firstAnswer }}">
    </div>
    <div class="col-xs-2">
        <label for="taskAnswer2" class="form-label">Drugi odgovor</label></br>
        <input type="text" id="taskAnswer2" name = "taskAnswer2" value = "{{ $task->secondAnswer }}">
    </div>
    <div class="col-xs-2">
        <label for="taskAnswer3" class="form-label">Treći odgovor</label></br>
        <input type="text" id="taskAnswer3" name = "taskAnswer3" value = "{{ $task->thirdAnswer }}">
    </div>
    <div class="col-xs-2">
        <label for="taskAnswer4" class="form-label">Četvrti odgovor</label></br>
        <input type="text" id="taskAnswer4" name = "taskAnswer4" value = "{{ $task->fourthAnswer }}">
    </div>
    Točan odgovor: </br>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="solution" id="solution1" value="1" {{ ($task->solution=="1") ? "checked" : "" }}>
            <label class="form-check-label" for="solution1">
                Prvi
            </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="solution" id="solution2" value="2" {{ ($task->solution=="2") ? "checked" : "" }}>
            <label class="form-check-label" for="solution2">
                Drugi
            </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="solution" id="solution3" value="3" {{ ($task->solution=="3") ? "checked" : "" }}>
            <label class="form-check-label" for="solution3">
                Treći
            </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="solution" id="solution4" value="4" {{ ($task->solution=="4") ? "checked" : "" }}>
            <label class="form-check-label" for="solution4">
                Četvrti
            </label>
    </div>
    <div class="col-xs-2">
        <label for="taskInstructions" class="form-label" >Objašnjenje zadatka</label></br>
        <textarea id="taskInstructions" name = "instructions" rows="3"> {{ $task->instructions }} </textarea>
    </div>
    <div>
        Slika objašnjenja </br>
        @if($task->bodyImageInstructions != NULL)
            <img src = "{{ asset('images-instructions/instructions' . $task->id) }}" alt="{{ asset('images-instructions/instructions' . $task->id) }}">
        @endif
        <input type="file" name="taskImageInstructions" class="custom-file-input" id="chooseFileInstructions">
    </div>
    <div>
    <input type="submit" value = "Spremi promjene" class="btn btn-primary mb-3">
    </div>
    </div>
    </form>
</x-app-layout>

