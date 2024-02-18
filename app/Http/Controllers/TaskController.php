<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $tasks = Task::latest()->get();
        // $tasks = DB::table('tasks')->paginate(15);
        $tasks = Task::paginate(25);

        return view('tasks.index', [
            'tasks' => $tasks
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required | max:60',
        ]);

        Task::create($request->all());
        return redirect()->route('tasks.index')
            ->with('success','Task created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        $task = Task::find($task->id);
        return view('tasks.show', [
            'task' => $task
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        $task = Task::find($task->id);
        return view('tasks.edit', [
            'task' => $task
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {   
        $task = Task::find($request->id);
        $task->title = $request->title;
        $task->content = $request->content;
        $task->status = $request->status;
        $task->save();
        return redirect()->route('tasks.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task = Task::find($task->id);
        $task->delete();
        // $task-> forcedelete();
        return redirect()->route('tasks.index');
    }
}
