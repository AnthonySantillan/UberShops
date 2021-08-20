<?php

namespace App\Http\Controllers\V1;

use App\Models\Client;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Clients\DestroyClientRequest;
use App\Http\Resources\V1\Clients\ClientCollection;
use App\Http\Requests\V1\Clients\StoreClientRequest;
use App\Http\Requests\V1\Clients\UpdateClientRequest;
use App\Http\Resources\V1\Clients\ClientResource;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\DB;

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
        return (new ClientCollection(Client::paginate()))
            ->additional([
                'msg' => [
                    'summary' => 'consulta exitosa',
                    'detail' => '',
                    'code' => '200'
                ]
            ]);
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
        $clients->user_id = $request->input('user_id');
        $clients->role_id = $request->input('role_id');
        $clients->card = $request->input('card');
        $clients->save();


        return (new ClientResource($clients))
            ->additional([
                'msg' => [
                    'summary' => 'cliente creado',
                    'detail' => '',
                    'code' => '200'
                ]
            ]);
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
        return (new ClientResource($client))
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
    public function update(UpdateClientRequest $request, Client $client)
    {
        $client->card = $request->card;
        $client->save();

        return (new ClientResource($client))
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
    public function destroy($client)
    {
        $client = Client::find($client);
        $client->delete();
        return (new ClientResource($client))
            ->additional([
                'msg' => [
                    'summary' => 'Cliente eliminado',
                    'detail' => '',
                    'code' => '200'
                ]
            ]);
    }
    public function destroys(DestroyClientRequest $request)
    {
        Client::destroy($request->input('ids'));

        return (new ClientResource($request))
            ->additional([
                'msg' => [
                    'summary' => 'eliminado exitosa',
                    'detail' => '',
                    'code' => '200'
                ]
            ]);
    }
}
