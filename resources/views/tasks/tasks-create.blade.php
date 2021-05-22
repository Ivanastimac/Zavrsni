@extends('layouts.admin-errors')

@section('header')
    {{ __('Zadaci') }}
@endsection

@section('content')
    <form method = "POST" action="/tasks/store" enctype="multipart/form-data">
    @csrf
    <div class="row g-3 align-items-center">
    <div class="col-xs-2">
        <label for="taskTitle" class="form-label">Naslov zadatka</label> </br>
        <input type="text" id="taskTitle" name = "titleTask">
    </div>
    <div class="col-xs-2">
        <label for="taskBody" class="form-label">Tekst zadatka</label></br>
        <textarea id="taskBody" name = "body" rows="3"></textarea>
    </div>
    <div>
        Slika zadatka </br>
        <input type="file" name="taskImage" class="custom-file-input" id="chooseFile">
    </div>
    <div class="col-xs-2">
        <label for="taskAnswer1" class="form-label">Prvi odgovor</label></br>
        <input type="text" id="taskAnswer1" name = "taskAnswer1">
    </div>
    <div class="col-xs-2">
        <label for="taskAnswer2" class="form-label">Drugi odgovor</label></br>
        <input type="text" id="taskAnswer2" name = "taskAnswer2">
    </div>
    <div class="col-xs-2">
        <label for="taskAnswer3" class="form-label">Treći odgovor</label></br>
        <input type="text" id="taskAnswer3" name = "taskAnswer3">
    </div>
    <div class="col-xs-2">
        <label for="taskAnswer4" class="form-label">Četvrti odgovor</label></br>
        <input type="text" id="taskAnswer4" name = "taskAnswer4">
    </div>
    Točan odgovor: </br>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="solution" id="solution1" value="1">
            <label class="form-check-label" for="solution1">
                Prvi
            </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="solution" id="solution2" value="2">
            <label class="form-check-label" for="solution2">
                Drugi
            </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="solution" id="solution3" value="3">
            <label class="form-check-label" for="solution3">
                Treći
            </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="solution" id="solution4" value="4">
            <label class="form-check-label" for="solution4">
                Četvrti
            </label>
    </div>
    <div class="col-xs-2">
        <label for="taskInstructions" class="form-label">Objašnjenje zadatka</label></br>
        <textarea id="taskInstructions" name = "instructions" rows="3"></textarea>
    </div>
    <div>
        Slika objašnjenja </br>
        <input type="file" name="taskImageInstructions" class="custom-file-input" id="chooseFileInstructions">
    </div>
    <div>
    <input type="submit" value = "Spremi zadatak" class="btn btn-primary mb-3">
    </div>
    </div>
    </form>
@endsection
