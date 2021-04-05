<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Razine') }}
        </h2>
    </x-slot>
    <form method = "POST" action="/levels/update/{{ $level->id }}">
    @csrf
    @method('PUT')
    <div class="row g-3 align-items-center">
    <div class="col-xs-2">
        <label for="levelTitle" class="form-label" >Naslov razine</label> </br>
        <input type="text" id="levelTitle" name = "title" value = "{{ $level->title }}">
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="complexity" id="complexitySimple" value="simple" {{ ($level->complexity=="0") ? "checked" : "" }} >
            <label class="form-check-label" for="complexitySimple">
                Jednostavna razina
            </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="complexity" id="complexityComplex" value="complex" {{ ($level->complexity=="1") ? "checked" : "" }}>
            <label class="form-check-label" for="complexityComplex">
                Složena razina
            </label>
    </div>
    <div>
        Razine o kojima ovisi: </br>
        @foreach ($levels as $element)
        @if ($element->id != $level->id)
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="flexCheck{{ $element->id }}" id="flexCheck{{ $element->id }}">
            <label class="form-check-label" for="flexCheck{{ $element->id }}">
                {{ $element->title }}
            </label>
        </div>
        @endif
        @endforeach
    </div>
    <div>
    <input type="submit" value = "Spremi promjene" class="btn btn-primary mb-3">
    </div>
    </div>
    </form>
</x-app-layout>

