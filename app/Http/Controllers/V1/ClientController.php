<?php

namespace App\Http\Controllers\V1;

use App\Models\Client;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Clients\DestroyClientRequest;
use App\Http\Resources\V1\Clients\ClientCollection;
use App\Http\Requests\V1\Clients\StoreClientRequest;
use App\Http\Requests\V1\Clients\UpdateClientRequest;
use App\Http\Resources\V1\Clients\ClientResource;


class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @return ClientCollection
     * 
     */
    public function index()
    {
        //return Client::paginate();
        return new ClientCollection(Client::paginate());
    }
    ///

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClientRequest $request)
    {
        $clients = new Client();
        $clients->card = $request->input('card');
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
     * @param \App\Models\Client $client
     * 
     * @return ClientResource
     * 
     */
    public function show(Client $client)
    {
        return new ClientResource($client);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClientRequest $request, Client $clients)
    {
        $clients->card = $request->input('card');
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
    public function delete(Client $client)
    {
        $client->delete();

        return response()->json(
            [
                'data' => $client,
                'msg' => [
                    'summary' => 'Usuario Eliminado',
                    'detail' => '',
                    'code' => '201'
                ]
            ],
            201
        );
    }
    public function destroy(DestroyClientRequest $request)
    {
        Client::destroy($request->input('ids'));

        return response()->json(
            [
                'data' => null,
                'msg' => [
                    'summary' => 'Usuario/s Eliminado/s',
                    'detail' => '',
                    'code' => '201'
                ]
            ],
            201
        );
    }
}
