<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Http\Request;

class Developer extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'available_flg', 'hired_flg'];

    public function setSeniorityAttribute($value)
    //$dev->seniority=3
    {
        $this->attributes['seniority_lv'] = $value;
        $this->attributes['cost'] = $value * 2;
    }
    public function project(): HasOne
    {
        return $this->hasOne(Project::class);
    }
}
