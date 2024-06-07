@extends('layouts.format')

@section('title', 'My Tasks')

@section('content')
    <div>
        <a style="color: red" href="{{ route('dashboard') }}">Dashboard</a>
    </div>
    <br>
    <div>
        <a style="color: darkorchid" href="{{ route('tasks.create') }}"> ADD TASK !!! </a>
    </div>
    <br>
    <div>
        <a style="color: blue"
           href="{{ route('tasks.index', ['sort' => $sort == 'asc' ? 'desc' : 'asc', 'filter' => $filter]) }}">
            Sort by Date ({{ $sort == 'asc' ? 'Descending' : 'Ascending' }})
        </a>
    </div>
    <br>
    <div>
        <a style="color: green" href="{{ route('tasks.index', ['filter' => 'completed', 'sort' => $sort]) }}">Show
            Completed</a>
        <a style="color: red" href="{{ route('tasks.index', ['filter' => 'not_completed', 'sort' => $sort]) }}">Show Not
            Completed</a>
        <a style="color: black" href="{{ route('tasks.index', ['filter' => 'all', 'sort' => $sort]) }}">Show All</a>
    </div>
    <br>

    @forelse($tasks as $task)
        <div>
            <a href="{{ route('tasks.show', ['task' => $task->id]) }}">
                @if($task->completed)
                    <p style="color: green">
                        {{$task->title}}
                    </p>
                @else
                    <p style="color: red">
                        {{$task->title}}
                    </p>
                @endif
            </a>

            @can('update', $task)
                <a href="{{ route('tasks.edit', ['task' => $task->id]) }}">Edit</a>
            @endcan

            @can('delete', $task)
                <form action="{{ route('tasks.destroy', ['task' => $task->id]) }}" method="POST"
                      style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            @endcan
        </div>
    @empty
        <div>
            There are no tasks!
        </div>
    @endforelse
    <br>
    @if($tasks->count())
        <nav>
            {{ $tasks->links() }}
        </nav>
    @endif
@endsection
