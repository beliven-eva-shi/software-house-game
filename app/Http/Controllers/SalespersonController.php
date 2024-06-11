<?php

namespace App\Http\Controllers;

use App\Models\Salesperson;


class SalespersonController extends Controller
{
    public function edit($id)
    {


        $sales = Salesperson::findOrFail($id);
        $sales->hired_flg = 1;
        $sales->save();

        return redirect("/hr")->with('success', 'Developer hired!');
    }
}
