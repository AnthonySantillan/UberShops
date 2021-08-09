<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VehiclesController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $driver =Vehicle::get();
        return response()->json(
            [
                'data' => $driver,
                'msg' => [
                    'sumary' => 'consulta correcta',
                    'detail' => 'la consulta esta correcta',
                    'code' => '201'
                ]
            ],
            201
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $vehicle = new Vehicle();
        $vehicle->plate= $request->plate;
        $vehicle->color= $request->color;
        $vehicle->enrollment= $request->enrollment;
        $vehicle->year= $request->year;
        $vehicle->save();

        return response()->json(
            [
                'data' => null,
                'msg' => [
                    'summary' => 'Creado correctamente',
                    'detail' => 'El empleado se creo correctamente',
                    'code' => '201'
                ]
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($vehicle)
    {
        $vehicle = DB::table('app.vehicles')->find($vehicle);

        // ELOQUENT
        //$vehicle = Vehicle::find($vehicle);
        // $vehicle = DB::('select * from app.vehicle where id = ?',[$vehicle]);
        return response()->json(
            [
                'data' => $vehicle[0],
                'msg' => [
                    'sumary' => 'consulta correcta',
                    'detail' => 'la consulta esta correcta',
                    'code' => '200'
                ]
            ],
            200
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $vehicle)
    {
        $vehicle = Vehicle::find($vehicle);
        $vehicle->age = $request->age;
        $vehicle->name = $request->name;
        $vehicle->email = $request->email;
        $vehicle->ponhe = $request->aproved;
        $vehicle->identification = $request->identification;
        $vehicle->save();

        return response()->json(
            [
                'data' => null,
                'msg' => [
                    'summary' => 'Actualizado correctamente',
                    'detail' => 'EL empleado se actualizó correctamente',
                    'code' => '201'
                ]
            ],
            201
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($vehicle)
    {
        $vehicle = Vehicle::find($vehicle);
        $vehicle->delete();
        return response()->json(
            [
                'msg' => [
                    'summary' => 'Eliminado correctamente',
                    'detail' => 'EL empleado se eliminó correctamente',
                    'code' => '201'
                ]
            ],
            201
        );
    }
}
