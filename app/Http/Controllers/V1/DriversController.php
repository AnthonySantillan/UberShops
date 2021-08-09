<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DriversController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drivers =Driver::get();
        return response()->json(
            [
                'data' => $drivers,
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
        $driver = new Driver();
        $driver->name= $request->name;
        $driver->phone= $request->phone;
        $driver->email= $request->email;
        $driver->password= $request->password;
        $driver->direction= $request->direction;
        $driver->license= $request->license;
        $driver->save();

        return response()->json(
            [
                'data' => $driver,
                'msg' => [
                    'summary' => 'Creado correctamente',
                    'detail' => 'El conductor se creo correctamente',
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
    public function show($driver)
    {
        //$driver = DB::table('app.drivers')->find($driver);

        // ELOQUENT
        //$driver = Driver::find($driver);
         $driver = DB::select('select * from app.drivers where id = ?',[$driver]);
        return response()->json(
            [
                'data' => $driver[0],
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
    public function update(Request $request, $driver)
    {
        $driver = Driver::find($driver);
        $driver->name= $request->name;
        $driver->phone= $request->phone;
        $driver->email= $request->email;
        $driver->password= $request->password;
        $driver->direction= $request->direction;
        $driver->license= $request->license;
        $driver->save();

        return response()->json(
            [
                'data' => $driver,
                'msg' => [
                    'summary' => 'Actualizado correctamente',
                    'detail' => 'EL conductor se actualizó correctamente',
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
    public function destroy($driver)
    {
        $driver = Driver::find($driver);
        $driver->delete();
        return response()->json(
            [
                'data' => $driver,
                'msg' => [
                    'summary' => 'Eliminado correctamente',
                    'detail' => 'EL conductor se eliminó correctamente',
                    'code' => '201'
                ]
            ],
            201
        );
    }
}
