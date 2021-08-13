<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Details\UpdateDetailRequest;
use App\Http\Requests\V1\Users\DestroyDeatilRequest;
use App\Http\Requests\V1\Users\StoreDetailRequest;
use App\Http\Resources\V1\Details\DetailCollection;
use App\Http\Resources\V1\Details\DetailResource;
use App\Models\Detail;

class DetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @return DetailCollection
     */
    public function index()
    {
        return new DetailCollection(Detail::paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDetailRequest $request)
    {
        $detail = new Detail();
        $detail->amount = $request->amount;
        $detail->delivery_date = $request->delivery_date;
        $detail->delivery_time = $request->delivery_time;
        $detail->value = $request->value;

        $detail->save();

        return response()->json(
            [
                'data' => $detail,
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
     * @param  \Illuminate\Http\Request  $request
     * 
     */
    public function show(Detail $detail)
    {
        return new DetailResource($detail);
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
    public function delete(Detail $detail)
    {
        $detail->delete();

        return response()->json(
            [
                'data' => $detail,
                'msg' => [
                    'summary' => 'Usuario Eliminado',
                    'detail' => '',
                    'code' => '201'
                ]
            ],
            201
        );
    }
    public function destroy(DestroyDeatilRequest $request)
    {
        Detail::destroy($request->input('ids'));

        return response()->json(
            [
                'data' => null,
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
