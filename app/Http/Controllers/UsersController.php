<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class UsersController extends Controller

    {
        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index()
        {
            $user =User::get();
            return response()->json(
               ['data'=> $user,
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
            $user = new User();
            $user->name= $request->name;
            $user->phone= $request->phone;
            $user->email= $request->email;
            $user->password= $request->password;
            $user->direction= $request->direction;
            $user->save();

            
            return response()->json(
                ['data'=> $user,
                'msg' => [
                'summary' => 'Creado correctamente',
                'detail' => 'El empleado se creo correctamente',
                'code' => '201']], 201
             );
        }
    
        /**
         * Display the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function show($user)
        {
            $user = DB::select('select * from app.payments where id = ?',[$user]);
            return response()->json(
               ['data'=> $user,
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
        public function update(Request $request, $user)
        {
            $user = User::find($user);
            $user->name= $request->name;
            $user->phone= $request->phone;
            $user->email= $request->email;
            $user->password= $request->password;
            $user->direction= $request->direction;
            $user->save();
            return response()->json(
               [  'data' => $user,
               'msg' => [
               'summary' => 'Actualizado correctamente',
               'detail' => 'EL empleado se actualizó correctamente',
               'code' => '201']], 201
            );
        }
    
        /**
         * Remove the specified resource from storage.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function destroy($user)
        {
            $user = User::find($user);
            $user->delete();
            return response()->json(
                ['data'=> $user,
                'msg' => [
                'summary' => 'Eliminado correctamente',
                'detail' => 'EL empleado se eliminó correctamente',
                'code' => '201']], 201
             );
        }
    
        public function updateState()
        {
            return response()->json(
                ['data'=> null,
                'msg' => [
                'summary' => 'actualizado Correctamente',
                'detail' => 'EL empleado se actualizo correctamente',
                'code' => '201']], 201
             );
        }
    }
