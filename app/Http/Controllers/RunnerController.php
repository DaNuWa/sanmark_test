<?php

namespace App\Http\Controllers;

use App\Models\Runner;
use Illuminate\Http\Request;

class RunnerController extends Controller
{
    public function store(Request $request)
    {
        //Validating the records before store
        $validated = $request->validate([
            'radius' => 'required|numeric|max:80',
            'name' => 'required',
            'laps' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
        ]);



        //Create the record
        Runner::create($validated);
        return redirect(route('records.report'));
    }

    public function radius(Request $request)
    {
        //Validating the records before store
        $validated = $request->validate([
            'radius' => 'required|numeric',
        ]);



        //Create the record
        Runner::create($validated);
        return redirect(route('records.report'));
    }


    public function reportAjax()
    {
        $data =Runner::all();

        $runner_info = $data->map(function ($runner){
         //   $speed=0 ? 0 :((int)$runner->speed/(int)$runner->duration);
            return ["name"=>$runner->name,"radius" => $runner->radius , "laps" => $runner->laps,"start_time"=>$runner->start_time,
            "end_time"=>$runner->end_time,"duration"=>$runner->duration];//,"speed"=>round($speed,2)];
        });
        try {
            return ((new \Yajra\DataTables\DataTables)::of($runner_info)->addIndexColumn()->make(true));

        }
        catch (\Exception $e) {
        }



}

    public function report(Request $request)
    {
        return view('form');
    }
}
