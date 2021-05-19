<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LevelLevel;
use App\Models\Level;

class LevelLevelController extends Controller
{
    
    // u tablicu levellevel sprema od kojih je razina složena stvorena razina 
    public function store($id, $id_lesson, $array)
    {
        $new_array = unserialize($array);
        foreach ($new_array as $element) {
            $levellevel = new LevelLevel();
            $levellevel->level_1 = $id;
            $levellevel->level_0 = $element;
            $levellevel->save();
        }

        return redirect('/levels/index/' . $id_lesson);
    }

}
