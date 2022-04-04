<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use Illuminate\Http\Request;
use Response;
use Carbon\Carbon;

class RolesController extends Controller
{
    public function index(Request $request)
    {
        $roles=Roles::whereNull('deleted_at')
                           ->where('name', 'like', "%{$request->key}%")
                            ->get();
        return response()->json($roles);
    }

    public function save(Request $request)
    {
        $roles=Roles::create($request->all());
        return Response::json($roles, 200);
    }

    public function update(Request $request, Roles $roles)
    {
        $input=$request->all();
        $roles->update($input);
        return Response::json($roles, 201);
    }

    public function destroy(Roles $roles)
    {
        $roles->deleted_at=now();
        $roles->update();
        return Response::json(array('success'=>true));
    }
}
