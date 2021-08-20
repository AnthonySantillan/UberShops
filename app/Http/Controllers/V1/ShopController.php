<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Shops\DestroyShopRequest;
use App\Http\Requests\V1\Shops\StoreShopRequest;
use App\Http\Requests\V1\Shops\UpdateShopRequest;
use App\Http\Resources\V1\Shops\ShopCollection;
use App\Http\Resources\V1\Shops\ShopResource;
use App\Models\Shop;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @return ShopCollection
     * 
     */
    public function index()
    {
        return (new ShopCollection(Shop::paginate()))
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
    public function store(StoreShopRequest $request)
    {
        $shop = new Shop();
        $shop->seller_id = $request->input('seller_id');
        $shop->product_id = $request->input('product_id');
        $shop->name = $request->input('name');
        $shop->code = $request->input('code');
        $shop->direction = $request->input('direction');
        $shop->save();

        return (new ShopResource($shop))
            ->additional([
                'msg' => [
                    'summary' => 'Tienda creada',
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
    public function show(Shop $shop)
    {
        return (new ShopResource($shop))
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
    public function update(UpdateShopRequest $request, Shop $shop)
    {
        $shop->name = $request->name;
        $shop->code = $request->code;
        $shop->direction = $request->direction;

        $shop->save();

        return (new ShopResource($shop))
            ->additional([
                'msg' => [
                    'summary' => 'Tienda actualizada',
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
    public function delete(Shop $shop)
    {
        $shop->delete();

        return (new ShopResource($shop))
            ->additional([
                'msg' => [
                    'summary' => 'Tienda eliminada',
                    'detail' => '',
                    'code' => '200'
                ]
            ]);
    }
    public function destroy(DestroyShopRequest $request)
    {
        Shop::destroy($request->input('ids'));

        return (new ShopResource($request))
            ->additional([
                'msg' => [
                    'summary' => 'eliminado correctamente',
                    'detail' => '',
                    'code' => '200'
                ]
            ]);
    }
}
