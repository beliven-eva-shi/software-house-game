<?php

namespace App\Http\Controllers;

use App\Models\Developer;
use Illuminate\Http\Request;

class DeveloperController extends Controller
{
    public function edit($id)
    {

        $dev = Developer::findOrFail($id);
        $dev->hired_flg = 1;
        $dev->save();

        return redirect("/hr")->with('success', 'Developer hired!');
    }
}
