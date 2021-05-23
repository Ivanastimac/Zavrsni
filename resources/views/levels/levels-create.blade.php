@extends('layouts.admin-errors')

@section('header')
    {{ __('Razine') }}
@endsection

@section('content')
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="grid grid-cols-3">
        <div class="py-3">
            <form method = "POST" action="/levels/store">
            @csrf
                <div class="shadow overflow-hidden sm:rounded-md">
                    <div class="px-4 py-5 bg-white sm:p-6">
                        <div>
                            <label for="levelTitle" class = "fs-6 p-1">Naslov razine</label> </br>
                            <input type="text" id="levelTitle" name = "titleLevel" class = "shadow p-1 mb-2 rounded border-secondary">
                        </div>
                        <div class="form-check py-2">
                            <input class="form-check-input" type="radio" name="complexity" id="complexitySimple" value="simple" onchange = 'divShow()'>
                            <label class="form-check-label" for="complexitySimple">
                                Jednostavna razina
                            </label>
                        </div>
                        <div class="form-check py-2">
                            <input class="form-check-input" type="radio" name="complexity" id="complexityComplex" value="complex" onchange = 'divShow()'>
                            <label class="form-check-label" for="complexityComplex">
                                Složena razina
                            </label>
                        </div>
                        <!-- ne vidi se dok se ne stisne radio button da je razina složena -->
                        <div id = "levelsDiv" style="display:none">
                            Razine o kojima ovisi: </br>
                            @foreach ($levels as $level)
                                <div class="form-check py-1">
                                    <!-- ime checkboxa je polje zbog validacije -->
                                    <input class="form-check-input" type="checkbox" name="flexCheck[{{ $level->id }}]" id="flexCheck{{ $level->id }}">
                                    <label class="form-check-label" for="flexCheck{{ $level->id }}">
                                        {{ $level->title }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                        <div class = "py-2">
                            <input type="submit" value = "Spremi razinu" class="btn btn-primary btn-sm" onclick = "return confirm('Jeste li sigurni da želite spremiti ovu razinu? Naknadne izmjene nisu moguće!')">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

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

