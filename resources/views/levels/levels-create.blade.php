<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Razine') }}
        </h2>
    </x-slot>
    <form method = "POST" action="/levels/store">
    @csrf
    <div class="row g-3 align-items-center mx-3">
    <div class="col-xs-2">
        <label for="levelTitle" class="form-label">Naslov razine</label> </br>
        <input type="text" id="levelTitle" name = "title">
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="complexity" id="complexitySimple" value="simple">
            <label class="form-check-label" for="complexitySimple">
                Jednostavna razina
            </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="complexity" id="complexityComplex" value="complex">
            <label class="form-check-label" for="complexityComplex">
                Složena razina
            </label>
    </div>
    <div>
        Razine o kojima ovisi: </br>
        @foreach ($levels as $level)
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="flexCheck{{ $level->id }}" id="flexCheck{{ $level->id }}">
            <label class="form-check-label" for="flexCheck{{ $level->id }}">
                {{ $level->title }}
            </label>
            </div>
        @endforeach
    </div>
    <div>
    <input type="submit" value = "Spremi razinu" class="btn btn-primary mb-3">
    </div>
    </div>
    </form>
</x-app-layout>

