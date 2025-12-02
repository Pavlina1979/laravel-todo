@extends('layouts.app')

<!-- @section('title', "Edit {$task->title} task")

@section('styles')
  <style>
    .error-message {
      color: rgb(195, 6, 6);
      font-size: .8rem;
    }
  </style>
@endsection -->

@section('content')
  <!-- <form action="{{ route('tasks.update', ['task' => $task->id]) }}" method="post">
        @csrf
        @method('PUT')
        <div>
          <label for="title">Title</label>
          <input type="text" name="title" id="title" value="{{ old('title') ?? $task->title }}">
          @error('title')
              <p class="error-message">{{ $message }}</p>
          @enderror
        </div>
        <div>
          <label for="description">Description</label>
          <textarea name="description" id="description" rows="5">{{ old('description') ?? $task->description }}</textarea>
          @error('description')
              <p class="error-message">{{ $message }}</p>
          @enderror
        </div>
        <div>
          <label for="long_description">Long description</label>
          <textarea name="long_description" id="long_description" rows="10">{{ old('long_description') ?? $task->long_description }}</textarea>
          @error('long_description')
              <p class="error-message">{{ $message }}</p>
          @enderror
        </div>
        <div>
          <button type="submit">Edit task</button>
        </div>

      </form> -->
  @include('form', ['task' => $task])
@endsection