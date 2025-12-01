<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
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

  public function show(Task $task): View
  {
    // $task = Task::findOrFail($id);

    return view('show', [
      'task' => $task
    ]);

  }

  public function store(TaskRequest $request)
  {
    // $request = $this->validate($request);
    // $data = $request->validated();
    // $task = new Task();
    // $task->title = $data['title'];
    // $task->description = $data['description'];
    // $task->long_description = $data['long_description'];
    // $task->save();
    $task = Task::create($request->validated());

    // return redirect()->route('tasks.show', ['id' => $task->id]);
    return redirect()->route('tasks.show', ['task' => $task->id])->with('success', "Task {$task->title} created successfully");
  }

  public function edit(Task $task): View
  {
    return view('edit', [
      'task' => $task
    ]);
  }

  public function update(Task $task, TaskRequest $request)
  {
    // $data = $this->validate($request);
    $data = $request->validated();
    //$task = Task::findOrFail($id);
    $task->title = $data['title'];
    $task->description = $data['description'];
    $task->long_description = $data['long_description'];
    $task->save();

    // return redirect()->route('tasks.show', ['id' => $task->id]);
    return redirect()->route('tasks.show', ['task' => $task->id])->with('success', "Task {$task->title} updated successfully");
  }

  // private function validate($request)
  // {
  //   return $request->validate([
  //     'title' => 'required|max:255',
  //     'description' => 'required',
  //     'long_description' => 'required',
  //   ]);
  // }
}
