<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Sellers\DestroySellerRequest;
use App\Http\Requests\V1\Sellers\StoreSellerRequest;
use App\Http\Requests\V1\Sellers\UpdateSellerRequest;
use App\Http\Resources\V1\Sellers\SellerCollection;
use App\Http\Resources\V1\Sellers\SellerResource;
use App\Models\Seller;

class SellerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @return SellerCollection
     * 
     */
    public function index()
    {
        return (new SellerCollection(Seller::paginate()))
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
    public function store(StoreSellerRequest $request)
    {
        $sellers = new Seller();
        $sellers->user_id = $request->input('user_id');
        $sellers->role_id = $request->input('role_id');
        $sellers->ruc = $request->ruc;
        $sellers->save();


        return (new SellerResource($sellers))
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
    public function show(Seller $seller)
    {
        return (new SellerResource($seller))
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
    public function update(UpdateSellerRequest $request, Seller $seller)
    {
        $seller->ruc = $request->input('ruc');
        $seller->save();

        return (new SellerResource($seller))
            ->additional([
                'msg' => [
                    'summary' => 'actualizacion exitosa',
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
    public function delete(Seller $seller)
    {
        $seller->delete();

        return response()->json(
            [
                'data' => $seller,
                'msg' => [
                    'summary' => 'Usuario Eliminado',
                    'detail' => '',
                    'code' => '201'
                ]
            ],
            201
        );
    }
    public function destroy(DestroySellerRequest $request)
    {
        Seller::destroy($request->input('ids'));

        return response()->json(
            [
                'data' => null,
                'msg' => [
                    'summary' => 'eliminacion correcta',
                    'detail' => 'dato eliminado',
                    'code' => '201'
                ]

            ],
            201
        );
    }
}
