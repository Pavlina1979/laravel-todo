@extends('layouts.app')

@section('title', $task->title)

@section('content')
  <p>{{ $task->description }}</p>

  @if($task->long_description)
    <p>{{ $task->long_description }}</p>
  @endif
  <p>{{ $task->created_at }}</p>
  <p>{{ $task->updated_at }}</p>

  @if(!$task->completed)
    <p>Not completed !!!</p>
  @else
    <p>Completed</p>
  @endif

  <div>
    <a class="font-medium text-gray-700 border-2 px-3 my-5 inline-block"
      href="{{ route('tasks.edit', ['task' => $task->id]) }}">Edit</a>
  </div>

  <form action="{{ route('tasks.destroy', ['task' => $task->id]) }}" method="post">
    @csrf
    @method('DELETE')
    <div>
      <button class="font-medium text-gray-700 border-2 px-3" type="submit">Delete task</button>
    </div>

  </form>
@endsection