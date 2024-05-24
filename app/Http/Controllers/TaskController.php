<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\DocBlock\Tags\Deprecated;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::latest()->paginate();
        return view('index', compact('tasks'));
    }

    public function create()
    {
        return view('create');
    }

    public function edit(Task $task)
    {
        return view('edit', compact('task'));
    }
    public function show(Task $task)
    {
        return view('show', compact('task'));
    }
    public function store(TaskRequest $request)
    {
        Task::create($request->validated());
        return redirect()->route('tasks.index')->with('success', 'Task created!');
    }
    public function update(TaskRequest $request, Task $task)
    {
        $task->update($request->validated());
        return redirect()->route('tasks.index')->with('success', 'Task updated!');
    }
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Task deleted!');
    }
}
