<?php

namespace App\Http\Controllers;

use App\Models\task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = task::orderBy('created_at', 'desc')->get();

        return view('welcome', compact('tasks'));
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
        $this->validate($request, [
            'title' => 'required|max:255'
        ]);

        Task::create($request->all());

        return redirect()->back()->with('message', 'Task created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(task $task)
    {
        return view('edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, task $task)
    {

        $this->validate($request, [
            'title' => 'required|max:255'
        ]);

        $task->update(['title' => $request->title]);

        return redirect()->back()->with('message', 'Task Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(task $task)
    {
        $task->delete();
        return redirect()->back()->with('message', 'Task Deleted Successfully');
    }

    public function active(task $task)
    {
        $task->update(['completed' => false]);
        return redirect()->back()->with('message', 'Task Marked As Active');
    }

    public function completed(task $task)
    {
        $task->update(['completed' => true]);
        return redirect()->back()->with('message', 'Task Marked As Completed');
    }

    public function activeTasks()
    {
        $tasks = Task::orderBy('created_at', 'desc')->where('completed', false)->get();

        return view('activetask', compact('tasks'));
    }

    public function completedTasks()
    {
        $tasks = Task::orderBy('created_at', 'desc')->where('completed', true)->get();

        return view('completedtask', compact('tasks'));
    }    

}
