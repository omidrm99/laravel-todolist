@extends('layouts.format')

@section('title', 'My Tasks')

@section('content')
    @if(Auth::check())
        <div>
                <a style="color: red" href="{{ route('dashboard') }}">Dashboard</a>
        </div>
        <br>
        <div>
            <a style="color: darkorchid" href="{{ route('tasks.create') }}"> ADD TASK !!! </a>
        </div>
        <br>
        @forelse($tasks as $task)
            <div>
                <a href="{{ route('tasks.show', ['task' => $task->id]) }}">{{ $task->title }}</a>
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

    @else
        <div>
            <a href="{{ route('login') }}">Log in</a>
        </div>
        <div>
            <a href="{{ route('register') }}">Register</a>
        </div>
        <div>
            <p style="color: blue">
                Log In to See All Tasks List
            </p>
        </div>
    @endif

@endsection
