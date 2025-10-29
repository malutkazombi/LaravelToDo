<?php

namespace App\Http\Controllers;

use App\Models\Folder;

use Illuminate\Http\Request;
use App\Http\Requests\CreateFolder;

class FolderController extends Controller
{
    /*
    *GET /folders/create
    *@return \Illuminate\View\View
    */

    public function showCreateForm()
    {
        return view('folders/create');
    }

    /*
    *Post /folders/create
    *@param Request $request
    *@return \Illuminate\Http\RedirectResponse
    */
    public function create(CreateFolder $request)
    {
        $folder = new Folder();
        $folder->title = $request->title;
        $folder->save();

        return redirect()->route('tasks.index', ['id' => $folder->id,]);
    }
}
