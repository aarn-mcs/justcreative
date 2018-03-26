<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Task;
use App\User;
use DateTime;

class TaskController extends Controller
{
	    /**
     * Create a new controller instance.
     *
     * @return void
     */
    //protection to avoid user no auth
    public function __construct()
    {
        $this->middleware('auth');
    }
    
        /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('task.index', [
            'users' => User::all(),
            'tasks' => Task::all()
        ]);
    }
    //Function to add new task
    public function add()
    {
        Task::create([
            'userId' => Input::get('userId'),
            'status' => 'pendiente',
            'name' => Input::get('taskName'),
            'description' => Input::get('descripcion'),
            'endTask' => '--',
            'hours' => '--'

        ]);
        return redirect()->action('TaskController@index');
    }
    //function to change status of task
    public function change ($id)
    {
        $task = Task::find($id);
        $task->status = "en proceso";
        $task->save();           
        return redirect()->action('TaskController@index');
    }

    public function endTask($id)
    {
        $task = Task::find($id);
        $fecha1 = new DateTime($task->created_at);//fecha inicial
        $fecha2 = new DateTime();//fecha de cierre

        $diff = $fecha2->diff($fecha1);
        $task->endTask = $fecha2;
        $task->hours = $diff->format('%a días and %h horas');
        $task->status = "terminada";
        $task->save(); 
        return redirect()->action('TaskController@index');
    }
}

