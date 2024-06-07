@extends('layouts.format')

@section('title')
    <h1>{{ $task->title }}</h1>
@endsection

@section('content')
    <p>{{ $task->description }}</p>

    @if($task->long_description)
        <p>{{ $task->long_description }}</p>
    @endif

    <p>{{ $task->created_at }}</p>
    <p>{{ $task->updated_at }}</p>

    <p>
        @if($task->completed)
            I AM A COMPLETED TASK
        @else
            PLEASE COMPLETE ME MASTER
        @endif
    </p>

    <div>
        <button>
            <a href={{ route('tasks.index') }}>
                HOME
            </a>
        </button>

    </div>

    <div>
        <form method="post" action="{{ route('tasks.toggle-complete', ['task' => $task->id]) }}">
            @csrf
            @method('PUT')
            <button type="submit">
                Mark as {{$task->completed ? 'not completed' : 'completed'}}
            </button>
        </form>
    </div>

@endsection
