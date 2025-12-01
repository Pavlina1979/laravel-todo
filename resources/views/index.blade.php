@extends('layouts.app')

@section('title', 'Tasks list')

@section('content')
    <div>
        @forelse ($tasks as $task)
            <div><a href="{{ route('tasks.show', ['task' => $task->id]) }}">{{ $task->title }}</a></div>
        @empty
            <h2>There are no tasks</h2>
        @endforelse
    </div>
@endsection
