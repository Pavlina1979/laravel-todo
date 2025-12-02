@extends('layouts.app')

<!-- @section('title', 'Create task')

@section('styles')
  <style>
    .error-message {
      color: rgb(195, 6, 6);
      font-size: .8rem;
    }
  </style>
@endsection -->

@section('content')
  <!-- <form action="{{ route('tasks.store') }}" method="post">
      @csrf
      <div>
        <label for="title">Title</label>
        <input type="text" name="title" id="title" value="{{ old('title') }}">
        @error('title')
            <p class="error-message">{{ $message }}</p>
        @enderror
      </div>
      <div>
        <label for="description">Description</label>
        <textarea name="description" id="description" rows="5">{{ old('description') }}</textarea>
        @error('description')
            <p class="error-message">{{ $message }}</p>
        @enderror
      </div>
      <div>
        <label for="long_description">Long description</label>
        <textarea name="long_description" id="long_description" rows="10">{{ old('long_description') }}</textarea>
        @error('long_description')
            <p class="error-message">{{ $message }}</p>
        @enderror
      </div>
      <div>
        <button type="submit">Add task</button>
      </div>

    </form> -->
  @include('form')
@endsection