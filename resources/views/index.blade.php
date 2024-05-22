@extends('layouts.format')

@section('title', 'The List Of All Tasks')

@section('content')

    @if(Auth::check())
        <div>
                <a href="{{ url('/dashboard') }}">Dashboard</a>
        </div>
        <div>
            <a href="{{ route('tasks.create') }}"> ADD TASK !!! </a>
        </div>

        @forelse($tasks as $task)
            <div>
                <a href="{{ route('tasks.show', ['task' => $task->id]) }}">{{ $task->title }}</a>
            </div>
        @empty
            <div>
                There are no tasks!
            </div>
        @endforelse

        @if($tasks->count())
            <nav>
                {{ $tasks->links() }}
            </nav>
        @endif

    @else
        <a href="{{ route('login') }}">Log in</a>
        <a href="{{ route('register') }}">Register</a>
    @endif

@endsection
