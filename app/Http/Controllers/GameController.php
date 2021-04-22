<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;
use App\Models\Lesson;
use App\Models\Level;
use App\Models\LevelLevel;
use App\Models\Task;
use App\Models\User;
use App\Models\UserTasks;

class GameController extends Controller
{
    /**
     * Display all lessons.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allLessons = Lesson::all();
        
        return view('game/game-index', [
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
        $all = Level::where('id_lesson', $id)->get();
        $return = array();
        $final = array();
        $check = 0;

        foreach($all as $all_levels){
            //svi leveli koji imaju preduvijet
            $conditioned_levels = LevelLevel::all();
            
            //svi leveli unutar lekcije koji imaju preduvijet
            $levels = array();
            foreach($conditioned_levels as $c){
                if ($all_levels->id == $c->level_1) array_push($levels, $all_levels);
            }
                
            $levels = array_unique($levels);
            
            //polje svih levela unutar lekcije koji su preduvijet složenim levelima
            $condition = array();
            foreach($conditioned_levels as $l1){
                foreach($levels as $l2){
                    if ($l1->level_1 == $l2->id) array_push($condition, $l1->level_0);
                }
            }
            
            //polje svih riješenih zadataka
            $finished_tasks = UserTasks::where('id_user', $id_user)->pluck('id_task')->toArray(); 
            
            //polje svih riješenih levela
            $finished_levels = Task::whereIn('id', $finished_tasks)->pluck('level')->toArray();
            
            //polje ne riješenih preduvijeta
            foreach($finished_levels as $f){
                unset($condition[array_search($f, $condition)]);
            }
            
            //ako su svi preduvijeti riješeni
            if(empty($condition)){   
                $final = array_merge($return, $levels);
                $check++;
            //ako nisu
            } else {
                $check = 0;
                $final = $return;                
                $new = Level::where('id_lesson', $id)->whereIn('id', $condition)->pluck('id')->toArray();                
                foreach($new as $n){
                    array_push($return, $n);
                }
            }
        }
        
        if ($check){
            $final = array_unique($final);
            $return_levels = Level::where('id_lesson', $id)->whereIn('id', $final[0])->get();
        } else {
            $return_levels = Level::where('id_lesson', $id)->whereIn('id', $return)->get();
        }
        
        return view('game/game-lesson', [
            'levels' => $return_levels
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
                return view('game/game-level', [
                    'tasks' => $available
                ]);
            }
        }

        return view('game/game-level', [
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

        return view('game/game-task', [
            'task' => $task
        ]);
    }

    /**
     * Post from form arrives.
     *
     * @param  int  $id
     * @param  \Illuminate\Http\Request  $request
     */

    public function getSolution(Request $request, $id)
    {
        $id_user = Auth::id();
        $id_task = $id;
        $task = Task::find($id_task);

        if ($request->odg == $task->solution){
            $exists = UserTasks::where([
                ['id_user', $id_user],
                ['id_task', $id_task]
            ])->get();
            
            if($exists == '[]'){
                $user_tasks = new UserTasks();
                $user_tasks->id_user = $id_user;
                $user_tasks->id_task = $id_task;
                $user_tasks->save();
            }
            /*RETURN SLJEDEĆI ZADATAK*/
            return redirect('/game/level/' . $task->level);
        } else {
            return view('game/game-instructions', [
                'task' => $task
            ]);
        }
    }

}
