<?php

namespace App\Http\Controllers\V1;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\Users\UserCollection;
use Illuminate\Support\Facades\DB;


class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @return UserCollection
     * 
     */
    public function index()
    {
        $clients = Client::get();
        return response()->json(
            [
                'data' => $clients,
                'msg' => [
                    'summary' => 'consulta correcta',
                    'detail' => 'la consulta de la computadora y la empresa es correcta',
                    'code' => '200'
                ]

            ],
            200
        );
    }
    ///

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $clients = new Client();
        $clients->card = $request->card;
        $clients->save();


        return response()->json(
            [
                'data' => $clients,
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
    public function show($clients)
    {
        $clients = DB::select('select * from app.clients where id = ?', [$clients]);
        return response()->json(
            [
                'data' => $clients,
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $clients)
    {
        $clients = Client::find($clients);
        $clients->card = $request->card;
        $clients->save();

        return response()->json(
            [
                'data' => null,
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
    public function destroy($client)
    {
        $client = Client::find($client);
        $client->delete();
        return response()->json(
            [
                'data' => $client,
                'msg' => [
                    'summary' => 'eliminacion correcta',
                    'detail' => 'dato eliminado',
                    'code' => '201'
                ]

            ],
            201
        );
    }
    public function updateState()
    {
        $client = 'client';
        return response()->json(
            [
                'data' => $client,
                'msg' => [
                    'summary' => 'actualizacion correcta',
                    'detail' => 'el estado del proyecto se actualizo ',
                    'code' => '201'
                ]

            ],
            201
        );
    }
}
