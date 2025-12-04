@extends('layouts.app')

@section('title', 'Tasks list')

@section('content')
  <nav class="mb-5"><a class="text-gray-700 border-2 px-3" href="{{ route('tasks.create') }}">Add task</a>
  </nav>

  <div>
    @forelse ($tasks as $task)
      <div><a @class(['font-bold', 'line-through font-normal' => $task->completed])
          href="{{ route('tasks.show', ['task' => $task->id]) }}">{{ $task->title }}</a>
      </div>
    @empty
      <h2>There are no tasks</h2>
    @endforelse
  </div>
  @if ($tasks->count())
    <nav class="mt-6">
      {{ $tasks->links() }}
    </nav>

  @endif
@endsection