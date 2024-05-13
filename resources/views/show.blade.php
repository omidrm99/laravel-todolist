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





    <div>
        <form action="{{route('tasks.destroy' , ['task' => $task->id])}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">  DELETE ! </button>
        </form>
    </div>



    <div>
        <button>
            <a href={{route('tasks.index')}}>
                HOME
            </a>
        </button>

    </div>


@endsection
