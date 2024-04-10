<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeekModel extends Model
{
    use HasFactory;

    protected $table = "week";

    static function getRecord() {
        return WeekModel::get();
    }

    static function getWeekUsingName($weekName){
        return WeekModel::where('name', '=', $weekName)->first();
    }
}
