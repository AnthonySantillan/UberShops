<?php

namespace App\Http\Controllers\V1;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;


class PaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments = Payment::get();
        return response()->json(
            [
                'data' => $payments,
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
        $payment = new Payment();
        $payment->name = $request->name;
        $payment->value = $request->value;
        $payment->save();

        return response()->json(
            [
                'data' => $payment,
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
    public function show($payment)
    {

        $payment = DB::select('select * from app.payments where id = ?', [$payment]);
        return response()->json(
            [
                'data' => $payment,
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
    public function update(Request $request, $payment)
    {
        $payment = Payment::find($payment);
        $payment->name = $request->name;
        $payment->value = $request->value;
        $payment->save();

        return response()->json(
            [
                'data' => $payment,
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
    public function destroy($payment)
    {
        $payment = Payment::find($payment);
        $payment->delete();
        return response()->json(
            [
                'data' => $payment,
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
