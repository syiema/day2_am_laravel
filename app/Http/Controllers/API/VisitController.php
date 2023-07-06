<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Visit;

class VisitController extends Controller
{
    public function index()
    {
        //query all visits using Visit model
        $visits = Visit::all();

        //return in JSON format
        return response()->json([
            'success'=> true,
            'no_of_visit'=> $visits->count(),
            'message'=> 'List of all visits',
            'data' => $visits
        ]);
    }

    public function store(Request $request)
    {
        //validation
        //laravel validation
        $request->validate([
            'visitor_name' => 'required',
            'purpose' => 'required',
            'temperature' => 'required',
        ]);


        //store data - POPO
        $visit = new Visit();
        $visit->visitor_name = $request->visitor_name;
        $visit->purpose = $request->purpose;
        $visit->temperature = $request->temperature;
        $visit->save();

        //return success in json format
        return response()->json([
            'success'=> true,
            'message'=> 'Visit saved',
        ]);
    }

    public function show(Visit $visit)
    {
        //return in json format
        return response()->json([
            'success'=> true,
            'message'=> 'Visit details',
            'data' => $visit
        ]);

    }

    public function delete(Visit $visit)
    {
        //delete visit
        $visit->delete();

        //return in json format
        return response()->json([
            'success'=> true,
            'message'=> 'Visit deleted',
        ]);
    }
}
