<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Self_;

class Runner extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function getDurationAttribute()
    {
        $start  = new Carbon($this->end_time);
        $end  = new Carbon($this->start_time);
       $duration=$start->diff($end)->format('%H:%I:%S');
       return $duration;
    }


    public function getSpeedAttribute()
    {
        $distance=(((2*3.14)*$this->radius)*$this->laps)/1000;

        return $distance;
    }
}
