<?php

namespace App\Http\Controllers;

use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ModuleController extends Controller
{
    public function index()
    {
        try {
            $modules = DB::table('modules')->get();
            $response = [
                'success' => true,
                'message' => 'Consulta existosa de los modulos',
                'data' => $modules
            ];
        } catch (\Throwable $th) {
            $j['success'] = false;
            $j['data'] = $th->getMessage();
            $j['code'] = 500;
        }
        return response()->json($response, 200);
    }


    public function findById($id)
    {
        try {
            $module = DB::table('modules')->find($id);

            $response = [];

            /* we validate if the variable don't have an id */
            if (!$module) {
                /* return an error 404 */
                return response()->json(['success' => false, 'message' => 'Modulo no encontrado'], 404);
            } 

            $response = [
                'success' => true,
                'message' => 'Consulta exitosa del modulo',
                'data' => $module
            ];
        } catch (\Throwable $th) {
            $j['success'] = false;
            $j['data'] = $th->getMessage();
            $j['code'] = 500;
        }
        return response()->json($response, 200);
    }
    
    public function store(Request $request)
    {
        $module = Module::create([
            'name' => $request->name,
            'description' => $request->description,
            'course_id' => $request->course_id,
        ]);

        return response()->json(['message' => 'Modulo registrado correctamente'], 201);
    }  
    
    public function update(Request $request, $id)
    {
        try {
            //this code is generate by IA and refactored by us
            try {                
                $module = Module::find($id);
        
                //if the object user don't exists, the response return a error
                if (!$module) {
                    return response()->json(['success' => false, 'message' => 'Modulo no encontrado'], 404);
                }
                        
                $module->name = $request->name;
                $module->description = $request->description;
                $module->course_id = $request->course_id; 
        
                // Save the changes
                $module->save();
        
                return response()->json(['success' => true, 'message' => 'Modulo actualizado correctamente'], 200);
        
            } catch (\Throwable $th) {
                return response()->json(['success' => false, 'message' => 'Modulo actualizado incorrectamente', 'error' => $th->getMessage()], 500);
            }
        } catch (\Throwable $th) {
            return response()->json(['success' => false, 'message' => 'Modulo actualizado incorrectamente', 'error' => $th->getMessage()], 500);
        }
    }
}
