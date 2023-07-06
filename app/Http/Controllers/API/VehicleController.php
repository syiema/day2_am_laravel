<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vehicle;

class VehicleController extends Controller
{
    public function index()
    {
        //query all vehicles using Vehicle model
        $vehicles = Vehicle::all();

        //return in JSON format
        return response()->json([
            'success'=> true,
            'no_of_visit'=> $vehicles->count(),
            'message'=> 'List of all vehicles',
            'data' => $vehicles
        ]);
    }

    public function store(Request $request)
    {
        //store data
        $vehicle = new Vehicle();
        $vehicle->type = $request->type;
        $vehicle->model = $request->model;
        $vehicle->plate_number = $request->plate_number;
        $vehicle->save();

        //return in JSON format
        return response()->json([
            'success'=> true,
            'message'=> 'Vehicle successfully saved',
        ]);

    }

    public function show(Vehicle $vehicle)
    {
        //return in JSON format
        return response()->json([
            'success'=> true,
            'message'=> 'Vehicles details',
            'data' => $vehicle
        ]);

    }

    public function delete(Vehicle $vehicle)
    {
        //delete visit
        $vehicle->delete();

        //return in json format
        return response()->json([
            'success'=> true,
            'message'=> 'Vehicle deleted',
        ]);

    }
}
