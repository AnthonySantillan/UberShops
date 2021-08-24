<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Products\DestroyProductRequest;
use App\Http\Requests\V1\Products\StoreProductRequest;
use App\Http\Requests\V1\Products\UpdateProductRequest;
use App\Http\Resources\V1\Products\ProductCollection;
use App\Http\Resources\V1\Products\ProductResource;
use App\Models\Product;


class ProductController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('role:admin|client');
    //     $this->middleware('permission:view-products')->only(['index', 'show']);
    //     $this->middleware('permission:store-products')->only(['store']);
    //     $this->middleware('permission:update-products')->only(['update']);
    //     $this->middleware('permission:delete-products')->only(['destroy', 'destroys']);
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @return ProductCollection
     */
    public function index()
    {
        return (new ProductCollection(Product::paginate()))
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
    public function store(StoreProductRequest $request)
    {
        $products = new Product();
        $products->name = $request->input('name');
        $products->code = $request->input('code');
        $products->amount = $request->input('amount');
        $products->price = $request->input('price');

        $products->save();

        return (new ProductResource($products))
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
    public function show(product $product)
    {
        return (new productResource($product))
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
    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->name = $request->input('name');
        $product->code = $request->input('code');
        $product->amount = $request->input('amount');
        $product->price = $request->input('price');
        $product->save();

        return (new ProductResource($product))
            ->additional([
                'msg' => [
                    'summary' => 'Actualziacion correcta',
                    'detail' => ' ',
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
    public function destroy($product)
    {
        $product = Product::find($product);
        $product->delete();

        return (new ProductResource($product))
            ->additional([
                'msg' => [
                    'summary' => 'eliminacion exitosa',
                    'detail' => ' ',
                    'code' => '200'
                ]
            ]);
    }
    public function destroys(DestroyProductRequest $request)
    {
        Product::destroy($request->input('ids'));

        return (new ProductResource($request))
            ->additional([
                'msg' => [
                    'summary' => 'producto eliminado',
                    'detail' => ' ',
                    'code' => '200'
                ]
            ]);
    }
}
