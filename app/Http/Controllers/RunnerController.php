<?php

namespace App\Http\Controllers;

use App\Models\Radius;
use App\Models\Runner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RunnerController extends Controller
{
    public function store(Request $request)
    {
        $radius = Radius::all();
        $max = $radius[0]->radius??50;

        //Validating the records before store
        $validated = $request->validate([
            'radius' => "required|numeric|max:$max",
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

        DB::table('radius')->delete();
        //Create the record
        Radius::create($validated);
        return redirect(route('records.report'));
    }


    public function reportAjax()
    {
        $data =Runner::all();

        $runner_info = $data->map(function ($runner){
          $speed=($runner->speed/$runner->duration)*3.6;
            return ["name"=>$runner->name,"radius" => $runner->radius , "laps" => $runner->laps,"start_time"=>$runner->start_time,
            "end_time"=>$runner->end_time,"duration"=>$runner->duration,"speed"=>round($speed,2)];
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
