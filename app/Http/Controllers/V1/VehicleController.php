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
        return (new VehicleCollection(Vehicle::paginate()))
            ->additional([
                'msg' => [
                    'summary' => 'consulta exitosa',
                    'detail' => '',
                    'code' => '200'
                ]
            ]);
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
        $vehicle->plate = $request->input('plate');
        $vehicle->color = $request->input('color');
        $vehicle->enrollment = $request->input('enrollment');
        $vehicle->year = $request->input('year');
        $vehicle->save();

        return (new VehicleResource($vehicle))
            ->additional([
                'msg' => [
                    'summary' => 'vehiculo creado',
                    'detail' => '',
                    'code' => '200'
                ]
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Vehicle $vehicle)
    {
        return (new VehicleResource($vehicle))
            ->additional([
                'msg' => [
                    'summary' => 'success',
                    'detail' => 'consulta exitosa',
                    'code' => '200'
                ]
            ]);
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
        $vehicle->plate = $request->input('plate');
        $vehicle->color = $request->input('color');
        $vehicle->enrollment = $request->input('enrollment');
        $vehicle->year = $request->input('year');
        $vehicle->save();

        return (new VehicleResource($vehicle))
            ->additional([
                'msg' => [
                    'summary' => 'vehiculo actualizado',
                    'detail' => ' ',
                    'code' => '200'
                ]
            ]);
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

        return (new VehicleResource($vehicle))
            ->additional([
                'msg' => [
                    'summary' => 'vehiculo eliminado',
                    'detail' => ' ',
                    'code' => '200'
                ]
            ]);
    }
    public function destroys(DestroyVehicleRequest $request)
    {
        Vehicle::destroy($request->input('ids'));

        return (new VehicleResource($request))
            ->additional([
                'msg' => [
                    'summary' => 'eliminacion exitosa',
                    'detail' => ' ',
                    'code' => '200'
                ]
            ]);
    }
}
