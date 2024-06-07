<?php

namespace App\Http\Controllers;

use App\Models\Salesperson;
use Illuminate\Http\Request;

class SalespersonController extends Controller
{
    public function edit(Request $request, $id)
    {

        $task = Salesperson::findOrFail($id);
        $task->hired_flg = $request->input('hired_flg');
        $task->save();

        return redirect("/hr")->with('success', 'Salesperson hired!');
    }
}
