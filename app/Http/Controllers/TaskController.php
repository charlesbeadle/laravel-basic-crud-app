<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Carbon\Carbon;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return abort(404);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $task_attributes = $request->validate([
            'task' => ['required', 'max:255'],
            'description' => ['required', 'max:500'],
            'due' => ['date']
        ]);
        Task::create($task_attributes);
        return redirect('/')->with('success', 'Task creation successful');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::find($id); 
        if ($task) {
            return view('tasks.edit', ['task' => $task]); 
        } else {
            return abort(404);
        }        
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
        $request->validate([
            'task' => ['required', 'max:255'],
            'description' => ['required', 'max:500'],
            'due' => ['date']
        ]);

        $task = Task::find($id);
        if ($task) {
            $task->task = request('task');
            $task->description = request('description');
            $task->due = request('due');
            $task->save();
            return redirect('/')->with('success', 'Task edit successful');
        } else {
            return abort(404);
        }        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect('/');
    }
}
