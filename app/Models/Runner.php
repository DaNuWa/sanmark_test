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

        $start_datetime = new DateTime(date('Y-m-d').' '.$this->start_time);
        $end_datetime = new DateTime(date('Y-m-d').' '.$this->end_time);
        $duration=strtotime($this->end_time) - strtotime($this->start_time);
       return $duration;
    }


    public function getSpeedAttribute()
    {
        $distance=(((2*3.14)*$this->radius)*$this->laps)/1000;

        return $distance;
    }
}
