<div>
    <h1>
        The List Of Tasks
    </h1>
</div>

<div>
    @forelse( $tasks as $task)
        <div>
            <a href="{{route('tasks.show', ['id' => $task->id])}}">{{$task -> title}}</a>
        </div>
    @empty
        <div>
            There are no tasks!
        </div>
    @endforelse
</div>
