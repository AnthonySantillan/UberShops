<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Details\UpdateDetailRequest;
use App\Http\Requests\V1\Details\DestroyDetailRequest;
use App\Http\Requests\V1\Details\StoreDetailRequest;
use App\Http\Resources\V1\Details\DetailCollection;
use App\Http\Resources\V1\Details\DetailResource;
use App\Models\Detail;

class DetailController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin|client');
        $this->middleware('permission:view-details')->only(['index', 'show']);
        $this->middleware('permission:store-details')->only(['store']);
        $this->middleware('permission:update-details')->only(['update']);
        $this->middleware('permission:delete-details')->only(['destroy', 'destroys']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @return DetailCollection
     */
    public function index()
    {
        return (new DetailCollection(Detail::paginate()))
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
    public function store(StoreDetailRequest $request)
    {
        $details = new Detail();
        $details->product_id = $request->input('product_id');
        $details->payment_id = $request->input('payment_id');
        $details->amount = $request->input('amount');
        $details->delivery_date = $request->input('delivery_date');
        $details->delivery_time = $request->input('delivery_time');
        $details->value = $request->input('value');

        $details->save();

        return (new DetailResource($details))
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
     * @param  \Illuminate\Http\Request  $request
     * 
     */
    public function show(Detail $detail)
    {
        return (new DetailResource($detail))
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
    public function update(UpdateDetailRequest $request, Detail $detail)
    {
        $detail->amount = $request->amount;
        $detail->delivery_date = $request->delivery_date;
        $detail->delivery_time = $request->delivery_time;
        $detail->value = $request->value;
        $detail->save();

        return response()->json(
            [
                'data' => $detail,
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
    public function destroy($detail)
    {
        $detail = Detail::find($detail);
        $detail->delete();

        return (new DetailResource($detail))
            ->additional([
                'msg' => [
                    'summary' => 'detalle eliminado',
                    'detail' => ' ',
                    'code' => '200'
                ]
            ]);
    }
    public function destroys(DestroyDetailRequest $request)
    {
        Detail::destroy($request->input('ids'));

        return (new DetailResource($request))
            ->additional([
                'msg' => [
                    'summary' => 'detalle eliminado',
                    'detail' => ' ',
                    'code' => '200'
                ]
            ]);
    }
}
