<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PaymentsController extends Controller
{
    /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index()
        {
            $payments =Payment::get();
            return response()->json(
               ['data'=> $payments,
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
            $payment = new Payment();
            $payment->cash= $request->cash;
            $payment->card= $request->card;
            $payment->save();
            
            return response()->json(
                ['data'=> null,
                'msg' => [
                'summary' => 'Creado correctamente',
                'detail' => 'El pago se creo correctamente',
                'code' => '201']], 201
             );
        }
    
        /**
         * Display the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function show($payment)
        {
            $payment = DB::select('select * from app.payments where id = ?',[$payment]);

            $employee = 'ofice1, Pao';
            return response()->json(
               ['data'=> $employee,
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
        public function update(Request $request, $payment)
        {
            $driver = Payment::find($payment);
            $payment->cash= $request->cash;
            $payment->card= $request->card;
            $payment->save();

            return response()->json(
               [  'data' => null,
               'msg' => [
               'summary' => 'Actualizado correctamente',
               'detail' => 'EL pago se actualizó correctamente',
               'code' => '201']], 201
            );
        }
    
        /**
         * Remove the specified resource from storage.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function destroy($payment)
        {
            $payment = Payment::find($payment);
            $payment->delete();
            return response()->json(
                ['data'=> null,
                'msg' => [
                'summary' => 'Eliminado correctamente',
                'detail' => 'EL pago se eliminó correctamente',
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
