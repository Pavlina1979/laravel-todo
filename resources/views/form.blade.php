@extends('layouts.app')

@section('title', isset($task) ? 'Edit task' : 'Create task')



@section('content')
  <form action="{{ isset($task) ? route('tasks.update', ['task' => $task->id]) : route('tasks.store') }}" method="post">
    @csrf
    @isset($task)
      @method('PUT')
    @endisset
    <div class="mb-5">
      <label for="title">Title</label>
      <input type="text" name="title" id="title" value="{{ $task->title ?? old('title') }}" @class(['border-red-500' => $errors->has('title')])>
      @error('title')
        <p class="error">{{ $message }}</p>
      @enderror
    </div>
    <div class="mb-5">
      <label for="description">Description</label>
      <textarea @class(['border-red-500' => $errors->has('description')]) name="description" id="description"
        rows="5">{{ $task->description ?? old('description') }}</textarea>
      @error('description')
        <p class="error">{{ $message }}</p>
      @enderror
    </div>

    <div class="mb-5">
      <label for="long_description">Long description</label>
      <textarea name="long_description" id="long_description" @class(['border-red-500' => $errors->has('long_description')]) rows="10">{{ $task->long_description ?? old('long_description') }}</textarea>
      @error('long_description')
        <p class="error">{{ $message }}</p>
      @enderror
    </div>

    <div class="mb-5">

      <label for="until_when">Until when</label>
      <input type="date" name="until_when" id="until_when" @class(['border-red-500' => $errors->has('until_when')])
        @isset($task) value="{{ Carbon\Carbon::parse($task->until_when)->format('Y-m-d') }}" @else
          value="{{ Carbon\Carbon::parse(today())->format('Y-m-d') }}">
        @endisset

      @error('until_when')
        <p class="error">{{ $message }}</p>
      @enderror
    </div>

    @isset($task)
      <div class="flex items-start gap-2 mt-5 mb-4">
        <input id="completed" type="checkbox" name="completed"
          class="w-4 h-4 border border-default-medium rounded-xs bg-neutral-secondary-medium focus:ring-2 focus:ring-brand-soft"
          @if ($task->completed === 1) checked @endif>
        <label for="completed" class="select-none mb-0 text-sm font-medium text-heading">Completed</label>
      </div>
    @endisset

    <div class="mb-5 flex gap-3">
      <button type="submit"
        class="font-medium text-gray-700 border-2 px-3 inline-block rounded-md hover:bg-slate-300">@isset($task)
          Update task
        @else
          Add task
        @endisset
      </button>
      <a href="{{ route('tasks.index') }}">Cancel</a>
    </div>

  </form>
@endsection