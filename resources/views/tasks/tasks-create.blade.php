@extends('layouts.admin-errors')

@section('header')
    {{ __('Zadaci') }}
@endsection

@section('content')
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="grid grid-cols-8">
        <div class="col-span-6 py-3">
            <form method = "POST" action="/tasks/store" enctype="multipart/form-data">
            @csrf
                <div class="shadow overflow-hidden sm:rounded-md">
                    <div class="col-span-4 px-4 py-5 bg-white sm:p-6">
                        <div class="grid grid-cols-6 gap-y-2">
                            <div class="col-span-6">
                                <label for="taskTitle" class="fs-6 p-1">Naslov zadatka</label> </br>
                                <input type="text" id="taskTitle" name = "titleTask" class="shadow p-1 mb-2 rounded border-secondary">
                            </div>

                            <div class="col-span-2">
                                <label for="taskBody" class="fs-6 p-1">Tekst zadatka</label>
                            </div>
                            <div class="col-span-4">
                                <span class="fs-6 p-1"> Slika zadatka </span>
                            </div>

                            <div class="col-span-2">
                                <textarea id="taskBody" name = "body" rows="3" class="shadow p-1 mb-2 rounded border-secondary"></textarea>
                            </div>
                            <div class="col-span-4">
                                <input type="file" name="taskImage" class="form-control-file" id="chooseFile">
                            </div>

                            <div class="col-span-2">
                                <label for="taskAnswer1" class="fs-6 p-1">Prvi odgovor</label></br>
                                <input type="text" id="taskAnswer1" name = "taskAnswer1" class="shadow p-1 mb-2 rounded border-secondary">
                            </div>
                            <div class="col-span-4">
                                <label for="taskAnswer2" class="fs-6 p-1">Drugi odgovor</label></br>
                                <input type="text" id="taskAnswer2" name = "taskAnswer2" class="shadow p-1 mb-2 rounded border-secondary">
                            </div>

                            <div class="col-span-2">
                                <label for="taskAnswer3" class="fs-6 p-1">Treći odgovor</label></br>
                                <input type="text" id="taskAnswer3" name = "taskAnswer3" class="shadow p-1 mb-2 rounded border-secondary">
                            </div>
                            <div class="col-span-4">
                                <label for="taskAnswer4" class="fs-6 p-1">Četvrti odgovor</label></br>
                                <input type="text" id="taskAnswer4" name = "taskAnswer4" class="shadow p-1 mb-2 rounded border-secondary">
                            </div>

                            <div class="col-span-6 pt-2">
                                <span class="fs-6 p-1"> Točan odgovor: </span>
                            </div>  

                            <div class="col-span-1 py-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="solution" id="solution1" value="1">
                                    <label class="form-check-label" for="solution1">
                                        Prvi
                                    </label>
                                </div>
                            </div>
                            <div class="col-span-1 py-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="solution" id="solution2" value="2">
                                    <label class="form-check-label" for="solution2">
                                        Drugi
                                    </label>
                                </div>
                            </div>
                            <div class="col-span-1 py-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="solution" id="solution3" value="3">
                                    <label class="form-check-label" for="solution3">
                                        Treći
                                    </label>
                                </div>
                            </div>
                            <div class="col-span-1 py-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="solution" id="solution4" value="4">
                                    <label class="form-check-label" for="solution4">
                                        Četvrti
                                    </label>
                                </div>
                            </div>
                            <div class="col-span-2">
                            </div>

                            <div class="col-span-2">
                                <label for="taskInstructions" class="fs-6 p-1">Objašnjenje zadatka</label>
                            </div>
                            <div class="col-span-4">
                                <span class="fs-6 p-1"> Slika objašnjenja </span>
                            </div>

                            <div class="col-span-2">
                                <textarea id="taskInstructions" name = "instructions" rows="3" class="shadow p-1 mb-2 rounded border-secondary"></textarea>
                            </div>
                            <div class="col-span-4">
                                <input type="file" name="taskImageInstructions" class="custom-file-input" id="chooseFileInstructions">
                            </div>  
                            <div class="col-span-6">
                                <input type="submit" value = "Spremi zadatak" class="btn btn-primary mb-3">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
