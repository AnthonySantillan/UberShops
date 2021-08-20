<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Models\Seller;
use App\Models\Shop;

class SellerShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     */
    public function index()
    {
        $shops = Shop::get();
        $sellers = Seller::get();
        return response()->json(
            [
                'data' => $sellers, $shops,
                'msg' => [
                    'summary' => 'consulta correcta',
                    'detail' => 'la consulta de la tienda  y el dueño es correcta',
                    'code' => '200'
                ]

            ],
            200
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($shop, $seller)
    {
        $shop = Shop::find($shop);
        $seller = Seller::find($seller);

        return response()->json(
            [
                'shop' => $shop,
                'seller' => $seller,
                'msg' => [
                    'summary' => 'consulta correcta',
                    'detail' => 'la consulta de la tienda  y el dueño es correcta',
                    'code' => '200'
                ]

            ],
            200
        );
    }
}
