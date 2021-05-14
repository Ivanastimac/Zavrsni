<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Level;

class LevelsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        session(['id_lesson' => $id]);

        $all = Level::where('id_lesson', $id)->get();
        
        return view('levels/levels-index', [
            'levels' => $all
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $all = Level::where('id_lesson', session('id_lesson'))->get();
        
        return view('levels/levels-create', [
            'levels' => $all
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
        if ($request->complexity == 'complex') {
            foreach ($request->flexCheck as $idLevel => $value) {
                array_push($array, $idLevel);
            }
        }
        
        return redirect('/levellevel/store/' . $id . '/' . session('id_lesson') . '/'  . serialize($array));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
    }
}