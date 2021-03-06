<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\UserTasks;
use App\Models\UserAnsweredTasks;
use App\Models\Level;
use App\Models\LevelLevel;
use Illuminate\Support\MessageBag;
use Auth;

class TasksController extends Controller
{
    
    public function index($id)
    {
        session(['id_level' => $id]);

        $all = Task::where('level', $id)->get();

        return view('tasks/tasks-index', [
            'tasks' => $all
        ]);   
    }

    public function create()
    {
        return view('tasks/tasks-create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'body' => 'required_without_all:taskImage',
            'taskImage' => 'required_without_all:body',
            'titleTask' => 'required',
            'taskAnswer1' => 'required',
            'taskAnswer2' => 'required',
            'taskAnswer3' => 'required',
            'taskAnswer4' => 'required',
            'solution' => 'required',
            'instructions' => 'required_without_all:taskImageInstructions',
            'taskImageInstructions' => 'required_without_all:instructions',
        ]);
        
        $task = new Task();
        $task->title = $request->titleTask;
        $task->bodyText = $request->body;
        $task->firstAnswer = $request->taskAnswer1;
        $task->secondAnswer = $request->taskAnswer2;
        $task->thirdAnswer = $request->taskAnswer3;
        $task->fourthAnswer = $request->taskAnswer4;
        $task->solution = $request->solution;
        $task->instructions = $request->instructions;
        $task->level = session('id_level');
        $task->save();

        // ako je dodana slika zadatka sprema se putanja u bazu
        if ($request->file('taskImage')) {
            // dobivanje slike: <img src = "{{ asset('images-tasks/task2') }}">
            $path = $request->file('taskImage')->storeAs('images/tasks', 'task' . $task->id);

            $task->bodyImage = $path;
            $task->save();   
        }     

        if ($request->file('taskImageInstructions')) {
            $path = $request->file('taskImageInstructions')->storeAs('images/instructions', 'instructions' . $task->id);

            $task->bodyImageInstructions = $path;
            $task->save();    
        } 

        return redirect('/tasks/index/' . session('id_level'));
    }

    public function show($id)
    {
        $task = Task::find($id);
        $level = Level::find(session('id_level'));
        
        return view('tasks/tasks-show', [
            'task' => $task,
            'level' => $level->title
        ]);
    }

    public function edit($id)
    {
        $task = Task::find($id);

        return view('tasks/task-edit', [
            'task' => $task
        ]);
    }

    public function update(Request $request, $id)
    {

        $validated = $request->validate([
            'body' => 'required_without_all:taskImage',
            'taskImage' => 'required_without_all:body',
            'titleTask' => 'required',
            'taskAnswer1' => 'required',
            'taskAnswer2' => 'required',
            'taskAnswer3' => 'required',
            'taskAnswer4' => 'required',
            'solution' => 'required',
            'instructions' => 'required_without_all:taskImageInstructions',
            'taskImageInstructions' => 'required_without_all:instructions',
        ]);

        $task = Task::find($id);

        $task->title = $request->titleTask;
        $task->bodyText = $request->body;
        $task->firstAnswer = $request->taskAnswer1;
        $task->secondAnswer = $request->taskAnswer2;
        $task->thirdAnswer = $request->taskAnswer3;
        $task->fourthAnswer = $request->taskAnswer4;
        $task->solution = $request->solution;
        $task->instructions = $request->instructions;
        $task->level = session('id_level');
        $task->save();

        if ($request->file('taskImage')) {
            $path = $request->file('taskImage')->storeAs('images/tasks', 'task' . $task->id);

            $task->bodyImage = $path;
            $task->save();    
        }   

        if ($request->file('taskImageInstructions')) {
            $path = $request->file('taskImageInstructions')->storeAs('images/instructions', 'instructions' . $task->id);

            $task->bodyImageInstructions = $path;
            $task->save();    
        }    
    
        return redirect('/tasks/index/' . session('id_level'));
    }

    public function destroy($id)
    {
        $task = Task::find($id);
        $user_task = UserTasks::where('id_task', $id);
        $user_answered_task = UserAnsweredTasks::where('id_answered_task', $id);

        if($user_answered_task != null){
            $user_answered_task->delete();
        }

        if($user_task != null){
            $user_task->delete();
        }

        if($task != null){
            $task->delete();
        }
        
        return redirect('/tasks/index/' . session('id_level'));
    }
}
