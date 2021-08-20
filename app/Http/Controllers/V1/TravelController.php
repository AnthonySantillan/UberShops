<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
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
        return (new TravelCollection(Travel::paginate()))
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Travel $travel)
    {
        return (new TravelResource($travel))
            ->additional([
                'msg' => [
                    'summary' => 'success',
                    'detail' => 'consulta exitosa',
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
    public function destroy($travel)
    {
        $travel = Travel::find($travel);
        $travel->delete();

        return (new TravelResource($travel))
            ->additional([
                'msg' => [
                    'summary' => 'viaje eliminado exitosamente ',
                    'detail' => ' ',
                    'code' => '200'
                ]
            ]);
    }
    public function destroys(DestroyTravelRequest $request)
    {
        Travel::destroy($request->input('ids'));

        return (new TravelResource($request))
            ->additional([
                'msg' => [
                    'summary' => 'viaje eliminado exitosamente ',
                    'detail' => ' ',
                    'code' => '200'
                ]
            ]);
    }
}
