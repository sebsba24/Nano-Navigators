<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        try {
            $roles = Role::all();
            $response = [
                'success' => true,
                'message' => 'Consulta exitosa roles',
                'data' => $roles
            ];
        } catch (\Throwable $th) {
            $j['success'] = false;
            $j['data'] = $th->getMessage();
            $j['code'] = 500;
        }
        return response()->json($response, 200);
    }    

    public function update(Request $request, $id)
    {
        try {            
            try {                
                $rol = Role::find($id);                        
        
                $rol->name = $request->name;                
                $rol->save();
        
                return response()->json(['success' => true, 'message' => 'Rol actualizado correctamente'], 200);
        
            } catch (\Throwable $th) {
                return response()->json(['success' => false, 'message' => 'Rol actualizado incorrectamente', 'error' => $th->getMessage()], 500);
            }
        } catch (\Throwable $th) {
            return response()->json(['success' => false, 'message' => 'Rol actualizado incorrectamente', 'error' => $th->getMessage()], 500);
        }
    }
}