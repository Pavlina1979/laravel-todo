@extends('layouts.app')

@section('title', $task->title)

@section('content')
  <nav class="mb-5"><a class="text-gray-700 border-2 px-3 rounded-md hover:bg-slate-300"
      href="{{ route('tasks.index') }}">Go back</a>
  </nav>
  <p class="mb-4 text-slate-800">{{ $task->description }}</p>

  @if($task->long_description)
    <p class="mb-4 text-slate-800">{{ $task->long_description }}</p>
  @endif
  <p class="mb-5 text-sm text-slate-700">Created: {{ $task->created_at->diffForHumans() }} &bull; Last updated:
    {{ $task->updated_at->diffForHumans() }}
  </p>

  @if(!$task->completed)
    <p class="my-5">Until when: {{ Carbon\Carbon::parse($task->until_when)->format('d. m. Y') }}</p>
  @endif

  @if(!$task->completed)
    <p class="text-red-800">Not completed !!!</p>
  @else
    <p class="text-green-800">Completed</p>
  @endif

  <div class="flex gap-2 mt-5">
    <a class="font-medium text-gray-700 border-2 px-3 inline-block rounded-md hover:bg-slate-300"
      href="{{ route('tasks.edit', ['task' => $task->id]) }}">Edit</a>


    <form action="{{ route('tasks.destroy', ['task' => $task->id]) }}" method="post">
      @csrf
      @method('DELETE')

      <button class="font-medium text-gray-700 border-2 px-3 rounded-md hover:bg-slate-300" type="submit">Delete
        task</button>


    </form>
  </div>
@endsection