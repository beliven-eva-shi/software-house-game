<?php

namespace App\Http\Controllers;

use App\Models\Developer;
use Illuminate\Http\Request;

class DeveloperController extends Controller
{
    public function edit(Request $request, $id)
    {

        $task = Developer::findOrFail($id);
        $task->hired_flg = $request->input('hired_flg');
        $task->save();

        return redirect("/hr")->with('success', 'Developer hired!');
    }
}
