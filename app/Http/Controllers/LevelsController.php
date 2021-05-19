<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Level;

class LevelsController extends Controller
{

    // prikazivanje svih levela unutar cjeline
    public function index($id)
    {
        session(['id_lesson' => $id]);

        $all = Level::where('id_lesson', $id)->get();
        
        return view('levels/levels-index', [
            'levels' => $all
        ]);
    }

    // vraća view za stvaranje nove razine
    // šalju se sve razine unutar trenutne cjeline ako je razina koja se stvara složena pa treba izabrati o kojim razinama ona ovisi
    public function create()
    {
        $all = Level::where('id_lesson', session('id_lesson'))->get();
        
        return view('levels/levels-create', [
            'levels' => $all
        ]);
    }

    // spremanje razine
    public function store(Request $request)
    {
        // provjera ako su uneseni svi potrebni podaci
        $validated = $request->validate([
            'titleLevel' => 'required',
            'complexity' => 'required',
            'flexCheck' => 'required_if:complexity,complex|min:2',
        ]);

        $level = new Level();
        $level->title = $request->titleLevel;
        $id = session('id_lesson');
        $level->id_lesson = $id;
        if ($request->complexity == 'simple') {
            $level->complexity = 0;
        } else {
            $level->complexity = 1;
        }
        $level->save();
        $id = $level->id;

        $all = Level::where('id_lesson', session('id_lesson'))->get();

        $array = [];
        // flexCheck je polje koje sadrži parove key, value, gdje je key id razine, a value je uvijek on
        if ($request->complexity == 'complex') {
            foreach ($request->flexCheck as $idLevel => $value) {
                array_push($array, $idLevel);
            }
        }
        
        // šalje se id stvorene razine i polje svih razina od kojih je ta razina složena
        return redirect('/levellevel/store/' . $id . '/' . session('id_lesson') . '/'  . serialize($array));
    }

}