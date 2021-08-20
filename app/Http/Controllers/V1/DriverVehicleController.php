<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Models\Driver;
use App\Models\Vehicle;

class DriverVehicleController extends Controller
{
    public function index()
    {
        $drivers = Driver::get();
        $vehicles = Vehicle::get();
        return response()->json(
            [
                'data' => $vehicles, $drivers,
                'msg' => [
                    'summary' => 'consulta correcta',
                    'detail' => 'la consulta de la tienda  y el dueño es correcta',
                    'code' => '200'
                ]

            ],
            200
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($driver, $vehicle)
    {
        $driver = Driver::find($driver);
        $vehicle = Vehicle::find($vehicle);

        return response()->json(
            [
                'driver' => $driver,
                'vehicle' => $vehicle,
                'msg' => [
                    'summary' => 'consulta correcta',
                    'detail' => 'la consulta de la tienda  y el dueño es correcta',
                    'code' => '200'
                ]

            ],
            200
        );
    }
}
