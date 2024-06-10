<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Salesperson extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'hired_flg', 'seniority_lv', 'cost', 'time_new_project'];
}
