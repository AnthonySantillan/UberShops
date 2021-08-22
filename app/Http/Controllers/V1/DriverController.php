<?php

namespace App\Http\Controllers\V1;

use App\Models\Driver;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Drivers\DestroyDriverRequest;
use App\Http\Requests\V1\Drivers\StoreDriverRequest;
use App\Http\Requests\V1\Drivers\UpdateDriverRequest;
use App\Http\Resources\V1\Drivers\DriverCollection;
use App\Http\Resources\V1\Drivers\DriverResource;

class DriverController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin|driver');
        $this->middleware('permission:view-drivers')->only(['index', 'show']);
        $this->middleware('permission:store-drivers')->only(['store']);
        $this->middleware('permission:update-drivers')->only(['update']);
        $this->middleware('permission:delete-drivers')->only(['destroy', 'destroys']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @return DriverCollection
     */
    public function index()
    {
        return (new DriverCollection(Driver::paginate()))
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
    public function store(StoreDriverRequest $request)
    {
        $driver = new Driver();
        $driver->license = $request->input('license');
        $driver->user_id = $request->input('user_id');
        $driver->vehicle_id = $request->input('vehicle_id');
        $driver->role_id = $request->input('role_id');
        $driver->save();

        return (new DriverResource($driver))
            ->additional([
                'msg' => [
                    'summary' => 'Creacion exitosa',
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
    public function show(Driver $driver)
    {

        return (new DriverResource($driver))
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
    public function update(UpdateDriverRequest $request, Driver $driver)
    {
        $driver->license = $request->license;
        $driver->save();

        return (new DriverResource($driver))
            ->additional([
                'msg' => [
                    'summary' => 'Conductor actualizado',
                    'detail' => '',
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
    public function destroy($driver)
    {
        $driver = Driver::find($driver);
        $driver->delete();

        return (new DriverResource($driver))
            ->additional([
                'msg' => [
                    'summary' => 'Conductor eliminado',
                    'detail' => '',
                    'code' => '200'
                ]
            ]);
    }
    public function destroys(DestroyDriverRequest $request)
    {
        Driver::destroy($request->input('ids'));

        return (new DriverResource($request))
            ->additional([
                'msg' => [
                    'summary' => 'eliminacion exitosa',
                    'detail' => '',
                    'code' => '200'
                ]
            ]);
    }
}
