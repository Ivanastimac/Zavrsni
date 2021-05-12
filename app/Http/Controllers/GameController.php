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
use App\Models\UserAnsweredTasks;

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
        // polje broja točno riješenih zadataka iz određenog levela, index polja predstavlja level,
        // a vrijednost na indexu broj točno riješenih zadataka
        // ograniceno na 50 levela
        $count_answers = array_fill(0, 50, 0);
       
        session(['id' => $id]);
        $id_user = Auth::id();

        //svi leveli unutar lekcije
        $all_levels = Level::where('id_lesson', $id)->get();

        //polje svih riješenih zadataka
        $finished_tasks = UserTasks::where('id_user', $id_user)->pluck('id_task')->toArray();

        //provjera koliko je zadataka tocno riješeno iz svakog levela
        foreach($finished_tasks as $i){
            $task = Task::where('id', $i)->pluck('level')->toArray();
            $count_answers[$task[0]]++;
        }

        $next_level = 0;
        $condition = array();

        //petlja prolazi po svakom levelu, ako je jednostavan i nema 2 zadatka tocno rijesena vraca taj level,
        //ako je slozen provjerava jesu li rijeseni preduvijeti
        foreach($all_levels as $level){
            if ($level->complexity == 0){
                if ($count_answers[$level->id] < 2){
                    $next_level = $level->id;
                    break;
                } 
            } else {
                $condition = LevelLevel::where('level_1', $level->id)->pluck('level_0')->toArray();
                foreach ($condition as $i){
                    if ($count_answers[$i] < 2){
                        $next_level = $i;
                        break;
                    }
                }
                if ($count_answers[$level->id] < 2){
                    $next_level = $level->id;
                    break;
                } else if ($count_answers[$level->id] >= 2 && $level->id == Level::max('id')){
                    $lesson = Lesson::where('id', $id)->value('title');
                    return redirect('game')->with('alert', 'Cijelina "' . $lesson . '" je uspješno riješena! Za dodatnu vježbu pristupite kartici Vježbanje.');
                }
            }
        }

        //vraća sve zadatke iz sljedećeg levela koji nisu već riješeni
        $return_tasks = Task::where('level', $next_level)->whereNotIN('id', $finished_tasks)->get();

        //vraća random zadatak od mogućih
        $rand_task = $return_tasks[rand(0, count($return_tasks) - 1)];
  
        return view('game/game-task', [
            'task' => $rand_task
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

        $id_level = $task->level;

        //ako je zadatak tocno rijesen spremiti u user_tasks i u user_answered_tasks
        if ($request->answer == $task->solution){
            $exists1 = UserTasks::where([
                ['id_user', $id_user],
                ['id_task', $id_task]
            ])->get();
            
            if($exists1 == '[]'){
                $user_tasks = new UserTasks();
                $user_tasks->id_user = $id_user;
                $user_tasks->id_task = $id_task;
                $user_tasks->save();
            }

            $exists2 = UserAnsweredTasks::where([
                ['id_user', $id_user],
                ['id_answered_task', $id_task]
            ])->get();
            
            if($exists2 == '[]'){
                $user_answered_tasks = new UserAnsweredTasks();
                $user_answered_tasks->id_user = $id_user;
                $user_answered_tasks->id_answered_task = $id_task;
                $user_answered_tasks->save();
            }

            $lesson = Level::where('id', $id_level)->pluck('id_lesson')->toArray();
            /*RETURN SLJEDEĆI ZADATAK*/
            return redirect('/game/lesson/' . $lesson[0]);

        //ako zadatak nije tocno rijesen obrisati ostale zadatke iz baze
        } else {
            $level = Level::where('id', $id_level)->get();
            //svi zadaci u istom levelu u kojem se trenutno nalazimo
            $all_tasks = Task::where('level', $id_level)->pluck('id')->toArray();

            //pobrisi tocno rijesene zadatke iz ovog levela
            $user_tasks = UserTasks::all();
            
            foreach($user_tasks as $i){
               foreach($all_tasks as $j){
                    if ($i->id_task == $j){
                        $delete = UserTasks::where('id_task', $i->id_task)->delete();
                    }
               }
            }
            
            //ako se radi o kompleksnom levelu
            if ($level[0]->complexity != 0){
                //pobrisi tocno rijesene zadatke i iz svih condition levela
                $condition = LevelLevel::where('level_1', $id_level)->pluck('level_0')->toArray();

                foreach($condition as $i){
                    //svi zadaci unutar condition levela
                    $all_tasks = Task::where('level', $i)->pluck('id')->toArray();

                    //pobrisi tocno rijesene zadatke iz ovog levela
                    $user_tasks = UserTasks::all();
                    
                    foreach($user_tasks as $j){
                        foreach($all_tasks as $z){
                            if ($j->id_task == $z){
                                $delete = UserTasks::where('id_task', $j->id_task)->delete();
                            }
                        }
                    }
                }   
            }
            //prikazi objasnjenje zadatka
            return view('game/game-instructions', [
                'task' => $task
            ]);
        }
    }

}