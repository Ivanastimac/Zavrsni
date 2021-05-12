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

class StudyController extends Controller
{
    /**
     * Display all lessons.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allLessons = Lesson::all();
        
        return view('study/study-index', [
            'lessons' => $allLessons,
        ]);
    }

    /**
     * Display all levels in the lesson.
     *
     * @return \Illuminate\Http\Response
     */
    public function getLesson($id)
    {
        session(['id' => $id]);
        $id_user = Auth::id();

        //svi leveli unutar lekcije
        $all_levels = Level::where('id_lesson', $id)->get();

        return view('study/study-lesson', [
            'levels' => $all_levels
        ]);
    }

    /**
     * Display all tasks in the level.
     *
     * @return \Illuminate\Http\Response
     */
    public function getLevel($id)
    {
        session(['id' => $id]);
        $id_user = Auth::id();
        
        $all = Task::where('level', $id)->get();
        
        $answered = UserTasks::where([
            ['id_user', $id_user]
        ])->pluck('id_task')->toArray();
        
        if ($answered != null){
            $available = Task::where('level', $id)->whereNotIn('id', $answered)->get();
            
            if ($available != null){
                return view('study/study-level', [
                    'tasks' => $available
                ]);
            }
        }

        return view('study/study-level', [
            'tasks' => $all
        ]);
    
    }

    /**
     * Show the body of task.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getTask($id)
    {
        $task = Task::find($id);

        return view('study/study-task', [
            'task' => $task
        ]);
    }


}
