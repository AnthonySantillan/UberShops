<?php

namespace App\Http\Controllers\V1;

use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Vehicles\DestroyVehicleRequest;
use App\Http\Requests\V1\Vehicles\StoreVehicleRequest;
use App\Http\Requests\V1\Vehicles\UpdateVehicleRequest;
use App\Http\Resources\V1\Travels\TravelResource;
use App\Http\Resources\V1\Vehicles\VehicleCollection;
use App\Http\Resources\V1\Vehicles\VehicleResource;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @return VehicleCollection
     * 
     */
    public function index()
    {
        return new VehicleCollection(Vehicle::paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVehicleRequest $request)
    {
        $vehicle = new Vehicle();
        $vehicle->plate = $request->plate;
        $vehicle->color = $request->color;
        $vehicle->enrollment = $request->enrollment;
        $vehicle->year = $request->year;
        $vehicle->save();

        return response()->json(
            [
                'data' => $vehicle,
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
    public function show(Vehicle $vehicle)
    {
        return new VehicleResource($vehicle);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVehicleRequest $request, Vehicle $vehicle)
    {
        $vehicle->plate = $request->plate;
        $vehicle->color = $request->color;
        $vehicle->enrollment = $request->enrollment;
        $vehicle->year = $request->year;
        $vehicle->save();

        return response()->json(
            [
                'data' => $vehicle,
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
    public function delete(Vehicle $vehicle)
    {
        $vehicle->delete();

        return response()->json(
            [
                'data' => $vehicle,
                'msg' => [
                    'summary' => 'Usuario Eliminado',
                    'detail' => '',
                    'code' => '201'
                ]
            ],
            201
        );
    }
    public function destroy(DestroyVehicleRequest $request)
    {
        Vehicle::destroy($request->input('ids'));

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
