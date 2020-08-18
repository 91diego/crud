<?php

namespace App\Http\Controllers;

use App\Task;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::latest()->get();
        $tasks->load('user');
        $users = User::get();
        return view('tasks.index', [
            'tasks' => $tasks,
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'task_name' => [
                'required',
                'unique:tasks'
            ],
            'user_id' => 'required',
            'start_task_date' => 'required',
            'end_task_date' => 'required',
        ]);
        $task = new Task;
        $task->task_name = $request->task_name;
        $task->start_task_date = $request->start_task_date;
        $task->end_task_date = $request->end_task_date;
        $task->user_id = $request->user_id;
        $task->save();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        $users = User::get();
        return view('tasks.edit', [
            'task' => $task,
            'users' => $users
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'task_name' => 'required',
            'user_id' => 'required',
            'start_task_date' => 'required',
            'end_task_date' => 'required',
        ]);
        $taskUpdate = Task::find($task->id);
        $taskUpdate->task_name = $request->task_name;
        $taskUpdate->start_task_date = $request->start_task_date;
        $taskUpdate->end_task_date = $request->end_task_date;
        $taskUpdate->user_id = $request->user_id;
        $taskUpdate->save();
        // session()->flash('message', 'La tarea ha sido actualizada.');
        return redirect('/home')->with('message', 'Recolección generada exitosamente');
        // return redirect('/home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return back();
    }
}
