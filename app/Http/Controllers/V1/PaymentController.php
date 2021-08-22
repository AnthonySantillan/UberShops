<?php

namespace App\Http\Controllers\V1;

use App\Models\Payment;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Payments\DestroyPaymentRequest;
use App\Http\Requests\V1\Payments\StorePaymentRequest;
use App\Http\Requests\V1\Payments\UpdatePaymentRequest;
use App\Http\Resources\V1\Payments\PaymentCollection;
use App\Http\Resources\V1\Payments\PaymentResource;

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin|client');
        $this->middleware('permission:view-payments')->only(['index', 'show']);
        $this->middleware('permission:store-payments')->only(['store']);
        $this->middleware('permission:update-payments')->only(['update']);
        $this->middleware('permission:delete-payments')->only(['destroy', 'destroys']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @return PaymentCollection
     * 
     */
    public function index()
    {
        return (new PaymentCollection(Payment::paginate()))
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
    public function store(StorePaymentRequest $request)
    {
        $payment = new Payment();
        $payment->name = $request->input('name');
        // $payment->value = $request->input('value');
        $payment->save();

        return (new PaymentResource($payment))
            ->additional([
                'msg' => [
                    'summary' => 'creacion exitosa',
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
    public function show(Payment $payment)
    {
        return (new PaymentResource($payment))
            ->additional([
                'msg' => [
                    'summary' => 'consulta exitosa',
                    'detail' => '',
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
    public function update(UpdatePaymentRequest $request, Payment $payment)
    {
        $payment->name = $request->name;
        // $payment->value = $request->value;
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

        return (new PaymentResource($payment))
            ->additional([
                'msg' => [
                    'summary' => 'metodo de pago eliminado',
                    'detail' => '',
                    'code' => '200'
                ]
            ]);
    }
    public function destroys(DestroyPaymentRequest $request)
    {
        Payment::destroy($request->input('ids'));

        return (new PaymentResource($request))
            ->additional([
                'msg' => [
                    'summary' => 'eliminacion exitosa',
                    'detail' => '',
                    'code' => '200'
                ]
            ]);
    }
}
