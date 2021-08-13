<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Sellers\DestroySellerRequest;
use App\Http\Requests\V1\Sellers\StoreSellerRequest;
use App\Http\Requests\V1\Sellers\UpdateSellerRequest;
use App\Http\Requests\V1\Shops\DestroyShopRequest;
use App\Http\Requests\V1\Shops\UpdateShopRequest;
use App\Http\Resources\V1\Sellers\SellerCollection;
use App\Http\Resources\V1\Sellers\SellerResource;
use App\Models\Seller;
use App\Models\Shop;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

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
        return new SellerCollection(Seller::paginate());
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
        $sellers->ruc = $request->ruc;
        $sellers->save();


        return response()->json(
            [
                'data' => $sellers,
                'msg' => [
                    'summary' => 'consulta correcta',
                    'detail' => 'la consulta de la computadora y la empresa es correcta',
                    'code' => '200'
                ]

            ],
            200
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Seller $sellers)
    {
        return new SellerResource($sellers);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSellerRequest $request, Seller $sellers)
    {
        $sellers->ruc = $request->ruc;
        $sellers->save();

        return response()->json(
            [
                'data' => $sellers,
                'msg' => [
                    'summary' => 'actualizacion correcta',
                    'detail' => 'los datos se han actualizado',
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
