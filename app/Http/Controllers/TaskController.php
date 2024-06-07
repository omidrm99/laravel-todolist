<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    use AuthorizesRequests;
    public function index()
    {
        $sort = request()->query('sort', 'desc');
        $filter = request()->query('filter', 'all');

        $query = Task::query();

        if ($filter == 'completed') {
            $query->where('completed', true);
        } elseif ($filter == 'not_completed') {
            $query->where('completed', false);
        }

        $tasks = $query->orderBy('created_at', $sort)->paginate(4);

        return view('index', compact('tasks', 'sort', 'filter'));
    }

    public function create()
    {
        return view('create');
    }

    public function edit(Task $task)
    {
        $this->authorize('update', $task);
        return view('edit', compact('task'));
    }

    public function show(Task $task)
    {
        return view('show', compact('task'));
    }

    public function store(TaskRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = Auth::id();
        $data['completed'] = $request->has('completed');
        Task::create($data);
        return redirect()->route('tasks.index')->with('success', 'Task created!');
    }

    public function update(TaskRequest $request, Task $task)
    {
        $this->authorize('update', $task);
        $data = $request->validated();
        $data['completed'] = $request->has('completed');
        $task->update($data);
        return redirect()->route('tasks.index')->with('success', 'Task updated!');
    }

    public function destroy(Task $task)
    {
        $this->authorize('delete', $task);
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Task deleted!');
    }

    public function toggleComplete(Task $task)
    {
        $this->authorize('update', $task);
        $task->toggleComplete();
        return redirect()->back()->with('success', 'Task updated!');
    }
}
