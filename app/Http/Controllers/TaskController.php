<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\View\View;


class TaskController extends Controller
{
  public function index(): View
  {

    $tasks = Task::latest()->get();

    return view('index', [
      'tasks' => $tasks
    ]);

  }

  public function show(int $id): View
  {
    $task = Task::findOrFail($id);

    return view('show', [
      'task' => $task
    ]);

  }

  public function store(Request $request)
  {
    $data = $request->validate([
      'title' => 'required|max:255',
      'description' => 'required',
      'long_description' => 'required',
    ]);

    $task = new Task();
    $task->title = $data['title'];
    $task->description = $data['description'];
    $task->long_description = $data['long_description'];

    $task->save();

    return redirect()->route('tasks.show', ['id' => $task->id]);
  }
}
