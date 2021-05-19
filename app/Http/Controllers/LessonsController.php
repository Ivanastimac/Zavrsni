<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lesson;

class LessonsController extends Controller
{
   
    // prikaz svih cjelina
    public function index()
    {
        $all = Lesson::all();
        
        return view('lessons/lessons-index', [
            'lessons' => $all
        ]);
    }

    // vraća view za ubacivanje cjelina, a spremanje se obavlja unutar livewire komponente
    public function create()
    {
        return view('lessons/lessons-create');
    }

}
