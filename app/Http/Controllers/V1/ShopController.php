<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Shops\DestroyShopRequest;
use App\Http\Requests\V1\Shops\StoreShopRequest;
use App\Http\Requests\V1\Shops\UpdateShopRequest;
use App\Http\Resources\V1\Shops\ShopCollection;
use App\Http\Resources\V1\Shops\ShopResource;
use App\Models\Shop;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

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
        return new ShopCollection(Shop::paginate());
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
        $shop->name = $request->name;
        $shop->code = $request->code;
        $shop->direction = $request->direction;
        $shop->save();

        return response()->json(
            [
                'data' => $shop,
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
    public function show($shop)
    {
        return new ShopResource($shop);
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

        return response()->json(
            [
                'data' => $shop,
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
    public function delete(Shop $shop)
    {
        $shop->delete();

        return response()->json(
            [
                'data' => $shop,
                'msg' => [
                    'summary' => 'Usuario Eliminado',
                    'detail' => '',
                    'code' => '201'
                ]
            ],
            201
        );
    }
    public function destroy(DestroyShopRequest $request)
    {
        Shop::destroy($request->input('ids'));

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
