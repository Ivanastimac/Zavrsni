<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Razine') }}
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
    
    <form method = "POST" action="/levels/store">
    @csrf
    <div class="row g-3 align-items-center mx-3">
    <div class="col-xs-2">
        <label for="levelTitle" class="form-label">Naslov razine</label> </br>
        <input type="text" id="levelTitle" name = "titleLevel">
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="complexity" id="complexitySimple" value="simple" onchange = 'divShow()'>
            <label class="form-check-label" for="complexitySimple">
                Jednostavna razina
            </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="complexity" id="complexityComplex" value="complex" onchange = 'divShow()'>
            <label class="form-check-label" for="complexityComplex">
                Složena razina
            </label>
    </div>
    <div id = "levelsDiv" style="display:none">
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
    <input type="submit" value = "Spremi razinu" class="btn btn-primary mb-3" onclick = "return confirm('Jeste li sigurni da želite spremiti ovu razinu? Naknadne izmjene nisu moguće!')">
    </div>
    </div>
    </form>
</x-app-layout>

<script>
    function divShow() {
        if (document.getElementById("complexitySimple").checked) {
            document.getElementById("levelsDiv").style.display = 'none';
        }
        if (document.getElementById("complexityComplex").checked) {
            document.getElementById("levelsDiv").style.display = 'block';
        }
    }
</script>

