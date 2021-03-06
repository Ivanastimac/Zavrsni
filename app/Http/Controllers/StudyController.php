<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Auth;
use App\Models\Lesson;
use App\Models\Level;
use App\Models\LevelLevel;
use App\Models\Task;
use App\Models\User;
use App\Models\UserTasks;
use App\Models\UserAnsweredTasks;

class StudyController extends Controller
{
    
    public function index()
    {
        $allLessons = Lesson::all();
        
        return view('study/study-index', [
            'lessons' => $allLessons,
        ]);
    }

    // kad student stisne na cjelinu provjerava se ako je riješio cijelu cjelinu
    public function getLesson($id)
    {
        session(['id' => $id]);
        $id_user = Auth::id();
        $count_answers = array_fill(0, 1000, 0);

        //svi leveli unutar lekcije
        $all_levels = Level::where('id_lesson', $id)->get();

        //zadnji level na kojem je korisnik tocno rijesio 2 zadatka
        $answered_tasks = UserAnsweredTasks::where('id_user', $id_user)->pluck('id_answered_task')->toArray();

        foreach($answered_tasks as $i){
            $task = Task::where('id', $i)->pluck('level')->toArray();
            //sprema samo levele unutar trenutne lekcije
            if (Level::where('id_lesson', $id)->where('id', $task)->exists()){
                $count_answers[$task[0]]++;
            }
        }

        $index = 0;
        $last_level = 0;
        foreach($count_answers as $i){
            if ($i >= 2){
                $last_level = $index;
            }
            $index++;
        }

        if($last_level == Level::where('id_lesson', $id)->max('id')){
            return view('study/study-lesson', [
                'levels' => $all_levels
            ]);
        } else {
            return redirect('/study')->with('alert', 'Zadaci će biti dostupni nakon što uspješno riješite cjelinu u igrici!');
        }

    }

    // kada student stisne na razinu izlistaju mu se svi zadaci
    public function getLevel($id)
    {
        session(['id' => $id]);
        $id_user = Auth::id();
        
        $all = Task::where('level', $id)->get();
        
        $answered = UserAnsweredTasks::where('id_user', $id_user)->pluck('id_answered_task')->toArray();

        if ($answered != null){
            // zadaci koje je student već riješio
            $finished = Task::where('level', $id)->whereIn('id', $answered)->get();
            
            if ($finished != null){
                return view('study/study-level', [
                    'finished' => $finished,
                    'all' => $all
                ]);
            }
        }

        return view('study/study-level', [
            'all' => $all
        ]);
    
    }

    public function getTask($id)
    {
        $task = Task::find($id);

        return view('study/study-task', [
            'task' => $task
        ]);
    }

    public function getSolution(Request $request, $id)
    {
        $id_user = Auth::id();
        $id_task = $id;
        $task = Task::find($id_task);

        $id_level = $task->level;

        //ako je zadatak tocno rijesen spremiti u user_answered_tasks
        if ($request->answer == $task->solution){
            $exists = UserAnsweredTasks::where([
                ['id_user', $id_user],
                ['id_answered_task', $id_task]
            ])->get();
            
            if($exists == '[]'){
                $user_answered_tasks = new UserAnsweredTasks();
                $user_answered_tasks->id_user = $id_user;
                $user_answered_tasks->id_answered_task = $id_task;
                $user_answered_tasks->save();
            }

            $lesson = Level::where('id', $id_level)->pluck('id_lesson')->toArray();
            return redirect('/study/lesson/' . $lesson[0]);

        //ako zadatak nije tocno rijesen prikazujemo objasnjenje
        } else {

            return view('study/study-instructions', [
                'task' => $task,
                'level' => $id_level
            ]);
        }
    }
    
}
