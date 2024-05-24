<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;

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
        $task = Task::create($request->validated());
        return redirect()->route('tasks.show', ['task' => $task->id])->with('success', 'Task created!');
    }
}
