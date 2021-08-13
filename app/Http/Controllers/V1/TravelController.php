<?php

namespace App\Http\Controllers;

use App\Http\Requests\V1\Travels\DestroyTravelRequest;
use App\Http\Resources\V1\Travels\TravelCollection;
use App\Http\Resources\V1\Travels\TravelResource;
use App\Models\Travel;

class TravelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @return TravelCollection
     * 
     */
    public function index()
    {
        return new TravelCollection(Travel::paginate());
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
    public function show(Travel $travel)
    {
        return new TravelResource($travel);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Travel $travel)
    {
        $travel->delete();

        return response()->json(
            [
                'data' => $travel,
                'msg' => [
                    'summary' => 'Usuario Eliminado',
                    'detail' => '',
                    'code' => '201'
                ]
            ],
            201
        );
    }
    public function destroy(DestroyTravelRequest $request)
    {
        Travel::destroy($request->input('ids'));

        return response()->json(
            [
                'data' => null,
                'msg' => [
                    'summary' => 'Eliminado correctamente',
                    'detail' => 'EL viaje se eliminó correctamente',
                    'code' => '201'
                ]
            ],
            201
        );
    }
}
