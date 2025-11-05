<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Folder;
use App\Models\Task;
use App\Http\Requests\CreateTask;

class TaskController extends Controller
{
    /**
     *
     * GET /folders/{id}/tasks
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function index(int $id)
    {
        $folders = Folder::all();

        $folder = Folder::find($id);

        $tasks = $folder->tasks()->get();

        return view(
            'tasks/index',
            [
                'folders' => $folders,
                'folder_id' => $id,
                'tasks' => $tasks
            ]
        );
    }
    public function showCreateForm(int $id)
    {
        return view('tasks/create', ['folder_id' => $id]);
    }
    public function create(int $id, CreateTask $request)
    {
        $folder = Folder::find($id);

        $task = new Task();
        $task->title = $request->title;
        $task->due_date = $request->due_date;
        $folder->tasks()->save($task);

        return redirect()->route('tasks.index', [
            'id' => $folder->id,
        ]);
    }
}
