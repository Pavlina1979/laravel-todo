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

    $tasks = Task::latest()->paginate(5);

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

  public function store(Request $request)
  {
    $data = $this->validate($request);
    //$data = $request->validated();
    $task = new Task();
    $task->title = $data['title'];
    $task->description = $data['description'];
    $task->long_description = $data['long_description'];
    $task->until_when = $data['until_when'];
    $task->save();
    // $task = Task::create($request->validated());

    // return redirect()->route('tasks.show', ['id' => $task->id]);
    return redirect()->route('tasks.show', ['task' => $task->id])->with('success', "Task '{$task->title}' created successfully");
  }

  public function edit(Task $task): View
  {
    return view('edit', [
      'task' => $task
    ]);
  }

  public function update(Task $task, Request $request)
  {
    $data = $this->validate($request);
    // $data = $request->validated();
    //$task = Task::findOrFail($id);
    $task->title = $data['title'];
    $task->description = $data['description'];
    $task->long_description = $data['long_description'];
    $task->until_when = $data['until_when'];
    $task->completed = (isset($data['completed']) && $data['completed'] === 'on') ? 1 : 0;
    $task->save();

    // return redirect()->route('tasks.show', ['id' => $task->id]);
    return redirect()->route('tasks.show', ['task' => $task->id])->with('success', "Task '{$task->title}' updated successfully");
  }

  public function delete(Task $task)
  {
    $taskName = $task->title;
    $task->delete();
    return redirect()->route('tasks.index')->with('success', "Task '{$taskName}' removed successfully");
  }

  public function toggle(Task $task)
  {
    $task->completed = !$task->completed;

    return redirect()->back();
  }
  private function validate($request)
  {
    return $request->validate([
      'title' => 'required|max:255',
      'description' => 'required',
      'long_description' => 'required',
      'until_when' => 'required|date',
      'completed' => 'nullable'
    ]);
  }
}
