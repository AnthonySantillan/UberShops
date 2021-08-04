<?php

namespace App\Http\Controllers;

use App\Models\Travel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class TravelsController extends Controller
{
    /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index()
        {
            $travel = Travel::get();
            return response()->json(
               ['data'=> $travel,
               'msg'=>['sumary'=> 'consulta correcta',
               'detail'=>'la consulta esta correcta', 
               'code'=>'201']], 201);
        }
    
        /**
         * Store a newly created resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return \Illuminate\Http\Response
         */
        public function store(Request $request)
        {
            $travel = new Travel();
            $travel->starting= $request->starting;
            $travel->arrival= $request->arrival;
            $travel->value= $request->value;
            $travel->save();
            
            return response()->json(
                ['data'=> null,
                'msg' => [
                'summary' => 'Creado correctamente',
                'detail' => 'El viaje se creo correctamente',
                'code' => '201']], 201
             );
        }
    
        /**
         * Display the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function show($travel)
        {
            $travel = DB::select('select * from app.travels where id = ?',[$travel]);
            return response()->json(
               ['data'=> $travel,
               'msg'=>['sumary'=> 'consulta correcta',
               'detail'=>'la consulta esta correcta', 
               'code'=>'200']], 200
            );
        }
    
        /**
         * Update the specified resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function update(Request $request, $travel)
        {
            $travel = Travel::find($travel);
            $travel->starting= $request->starting;
            $travel->arrival= $request->arrival;
            $travel->value= $request->value;
            $travel->save();
            return response()->json(
               [  'data' => null,
               'msg' => [
               'summary' => 'Actualizado correctamente',
               'detail' => 'EL viaje se actualizó correctamente',
               'code' => '201']], 201
            );
        }
    
        /**
         * Remove the specified resource from storage.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function destroy($travel)
        {
            $travel = Travel::find($travel);
            $travel->delete();
            return response()->json(
                ['data'=> $travel,
                'msg' => [
                'summary' => 'Eliminado correctamente',
                'detail' => 'EL viaje se eliminó correctamente',
                'code' => '201']], 201
             );
        }
    
        public function updateState()
        {
            return response()->json(
                ['data'=> null,
                'msg' => [
                'summary' => 'actualizado Correctamente',
                'detail' => 'EL viaje se actualizo correctamente',
                'code' => '201']], 201
             );
        }
}
