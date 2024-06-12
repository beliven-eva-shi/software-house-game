<?php

namespace App\Http\Controllers;

use App\Models\Developer;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function edit(Request $request, $id)
    {

        $project = Project::findOrFail($id);
        $project->dev_id = $request->input('assign');
        $dev = Developer::findOrFail($request->input('assign'));
        $project->time_for_completion = ceil($project->complexity / $dev->seniority_lv);
        $dev->available_flg = 0;
        $dev->save();
        $project->save();

        return redirect("/production")->with('success', 'Project assigned!');
    }
}
