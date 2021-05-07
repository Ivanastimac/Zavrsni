<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cjeline') }}
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
    
    <form method = "POST" action="/lessons/store">
    @csrf
    <div class="row g-3 align-items-center">
    <div class="col-xs-2">
        <label for="lessonTitle" class="form-label">Naslov cjeline</label> </br>
        <input type="text" id="lessonTitle" name = "titleLesson">
    </div>
    <div>
    <input type="submit" value = "Spremi cjelinu" class="btn btn-primary mb-3" onclick = "return confirm('Jeste li sigurni da želite spremiti ovu cjelinu? Naknadne izmjene nisu moguće!')">
    </div>
    </div>
    </form>
</x-app-layout>

