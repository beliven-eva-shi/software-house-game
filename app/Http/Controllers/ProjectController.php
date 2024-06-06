<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function edit(Request $request, $id)
    {

        $task = Project::findOrFail($id);
        $task->dev_id = $request->input('dev_id');
        $task->save();

        return redirect("/production")->with('success', 'Project assigned!');
    }
}
