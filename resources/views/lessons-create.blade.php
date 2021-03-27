<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cjeline') }}
        </h2>
    </x-slot>
    <form method = "POST" action="/lessons/store">
    @csrf
    <div class="row g-3 align-items-center">
    <div class="col-xs-2">
        <label for="lessonTitle" class="form-label">Naslov cjeline</label> </br>
        <input type="text" id="lessonTitle" name = "title">
    </div>
    <div>
    <input type="submit" value = "Spremi cjelinu" class="btn btn-primary mb-3">
    </div>
    </div>
    </form>
</x-app-layout>

