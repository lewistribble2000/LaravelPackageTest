<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeatherDays extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function shouldSearch($time, $ip)
    {
        $days = WeatherDays::where('ip', $ip)->get();
        foreach ($days as $day)
        {
            if(Carbon::parse($day->date)->isToday()) {return false;}
        }
        return true;
    }
}
