@extends('layouts.app')

@section('title')
    <h1>{{$task->title}}</h1>
@endsection

@section('content')
    <p>{{$task->description}}</p>

    @if($task->long_description)
        <p>{{$task->long_description}}</p>
    @endif

    <p>{{$task->created_at}}</p>
    <p>{{$task->updated_at}}</p>

<p>
    @if($task->completed)
        THIS TAST IS COMPLETED
    @else
        NOOOOOOOOO COMPLETE ME
    @endif
</p>
    <div>
        <button>
            <a href="{{route('tasks.edit', ['task' => $task->id]) }}">Edit</a>
        </button>
    </div>


    <div>
        <form action="{{route('tasks.destroy' , ['task' => $task->id]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit"> DELETE !</button>
        </form>
    </div>



    <div>
        <button>
            <a href={{route('tasks.index')}}>
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
