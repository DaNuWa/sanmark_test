<?php

namespace App\Models;

use Carbon\Carbon;
use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Self_;

class Runner extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function getDurationAttribute()
    {
        $actual_start_at = Carbon::parse($this->start_time);
        $actual_end_at   = Carbon::parse($this->end_time);
        $duration            = $actual_end_at->diffInSeconds($actual_start_at, true);
       return $duration;
    }


    public function getSpeedAttribute()
    {
        $distance=(((2*3.14)*$this->radius)*$this->laps);

        return $distance;
    }
}
