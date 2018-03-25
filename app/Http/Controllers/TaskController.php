<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Task;
use App\User;

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
            'status' => 'active',
            'name' => Input::get('taskName'),
            'description' => Input::get('descripcion') 
        ]);
        return redirect()->action('TaskController@index');
    }
    //function to change status of task
    public function change ($id)
    {
        $task = Task::find($id);
        if($task->status == "active")
            $task->status = "deactive";
        else
            $task->status = "active";
        $task->save();           
        return redirect()->action('TaskController@index');
    }
}

