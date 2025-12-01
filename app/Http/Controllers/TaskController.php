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
    var_dump($id);
    $task = Task::findOrFail($id);

    return view('show', [
      'task' => $task
    ]);

  }
}
