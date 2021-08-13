<?php

namespace App\Http\Controllers\V1;


use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Roles\DestroyRolesRequest;
use App\Http\Requests\V1\Roles\StoreRoleRequest;
use App\Http\Requests\V1\Roles\UpdateRoleRequest;
use App\Http\Resources\V1\Roles\RoleCollection;
use App\Http\Resources\V1\Roles\RoleResource;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @return RoleCollection
     * 
     */
    public function index()
    {
        return new RoleCollection(Role::paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRoleRequest $request)
    {
        $role = new Role();
        $role->user = $request->user;
        $role->driver = $request->driver;
        $role->save();

        return response()->json(
            [
                'data' => $role,
                'msg' => [
                    'summary' => 'Creado correctamente',
                    'detail' => 'El empleado se creo correctamente',
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
    public function show($role)
    {
        return new RoleResource($role);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRoleRequest $request, Role $role)
    {
        $role->user = $request->user;
        $role->driver = $request->driver;
        $role->save();

        return response()->json(
            [
                'data' => null,
                'msg' => [
                    'summary' => 'Actualizado correctamente',
                    'detail' => 'EL empleado se actualizó correctamente',
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
    public function delete(Role $role)
    {
        $role->delete();

        return response()->json(
            [
                'data' => $role,
                'msg' => [
                    'summary' => 'Usuario Eliminado',
                    'detail' => '',
                    'code' => '201'
                ]
            ],
            201
        );
    }
    public function destroy(DestroyRolesRequest $request)
    {
        Role::destroy($request->input('ids'));

        return response()->json(
            [
                'data' => null,
                'msg' => [
                    'summary' => 'Eliminado correctamente',
                    'detail' => 'EL empleado se eliminó correctamente',
                    'code' => '201'
                ]
            ],
            201
        );
    }
}
