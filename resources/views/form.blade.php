@extends('layouts.app')

@section('title', isset($task) ? 'Edit task' : 'Create task')

@section('styles')
  <style>
    .error-message {
      color: rgb(195, 6, 6);
      font-size: .8rem;
    }
  </style>
@endsection

@section('content')
  <form action="{{ isset($task) ? route('tasks.update', ['task' => $task->id]) : route('tasks.store') }}" method="post">
    @csrf
    @isset($task)
      @method('PUT')
    @endisset
    <div>
      <label for="title">Title</label>
      <input type="text" name="title" id="title" value="{{ $task->title ?? old('title') }}">
      @error('title')
        <p class="error-message">{{ $message }}</p>
      @enderror
    </div>
    <div>
      <label for="description">Description</label>
      <textarea name="description" id="description" rows="5">{{ $task->description ?? old('description') }}</textarea>
      @error('description')
        <p class="error-message">{{ $message }}</p>
      @enderror
    </div>

    <div>
      <label for="long_description">Long description</label>
      <textarea name="long_description" id="long_description"
        rows="10">{{ $task->long_description ?? old('long_description') }}</textarea>
      @error('long_description')
        <p class="error-message">{{ $message }}</p>
      @enderror
    </div>

    <div class="flex items-center mb-4">
      <input id="completed" type="checkbox" name="completed"
        class="w-4 h-4 border border-default-medium rounded-xs bg-neutral-secondary-medium focus:ring-2 focus:ring-brand-soft"
        @if ($task->completed === 1) checked @endif>
      <label for="completed" class="select-none ms-2 text-sm font-medium text-heading">Completed</label>
    </div>
    <div>
      <button type="submit">@isset($task)
        Update task
      @else
          Add task
        @endisset
      </button>
    </div>

  </form>
@endsection