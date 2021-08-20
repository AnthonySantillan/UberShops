<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Users\DestroyUserRequest;
use App\Http\Requests\V1\Users\StoreUserRequest;
use App\Http\Requests\V1\Users\UpdateUserRequest;
use App\Http\Resources\V1\Users\UserCollection;
use App\Http\Resources\V1\Users\UserResource;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     *
     * @return UserCollection
     */
    public function index()
    {
        return (new UserCollection(User::paginate()))
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreUserRequest $request)
    {
        $user = new User();
        $user->name = $request->input('name');
        $user->phone = $request->input('phone');;
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->direction = $request->input('direction');
        $user->genred = $request->input('genred');
        $user->save();

        return (new UserResource($user))
            ->additional([
                'msg' => [
                    'summary' => 'creacion correcta',
                    'detail' => '',
                    'code' => '200'
                ]
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\User $user
     * @return UserResource
     */
    public function show(User $user)
    {
        //metodo find()
        return (new UserResource($user))
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
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $user->name = $request->input('name');
        $user->phone = $request->input('phone');;
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->direction = $request->input('direction');
        $user->genred = $request->input('genred');
        $user->save();
        return (new UserResource($user))
            ->additional([
                'msg' => [
                    'summary' => 'actualizacion correcta',
                    'detail' => '',
                    'code' => '200'
                ]
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($user)
    {
        $user = User::find($user);
        $user->delete();

        return (new UserResource($user))
            ->additional([
                'msg' => [
                    'summary' => 'usuario eliminado correcta',
                    'detail' => '',
                    'code' => '200'
                ]
            ]);
    }

    public function destroys(DestroyUserRequest $request)
    {
        User::destroy($request->input('ids'));

        return (new UserResource($request))
            ->additional([
                'msg' => [
                    'summary' => ' eliminacion exitosa',
                    'detail' => '',
                    'code' => '200'
                ]
            ]);
    }
}
