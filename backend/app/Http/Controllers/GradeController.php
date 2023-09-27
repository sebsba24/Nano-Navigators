<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GradeController extends Controller
{
    public function index()
    {
        try {
            $grades = DB::table('grades')->get();
            $response = [
                'success' => true,
                'message' => 'Consulta existosa de las notas.',
                'data' => $grades
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
            $grades = DB::table('grades')->find($id);

            $response = [];

            /* we validate if the variable don't have an id */
            if (!$grades) {
                /* return an error 404 */
                return response()->json(['success' => false, 'message' => 'Nota no encontrada'], 404);
            } 

            $response = [
                'success' => true,
                'message' => 'Consulta exitosa de la nota',
                'data' => $grades
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
        $grades = Grade::create([
            'grade' => $request->grade,
            'user_id' => $request->user_id,
            'assesments_id' => $request->assesments_id,   
        ]);

        return response()->json(['message' => 'Notas registradas correctamente'], 201);
    }    

    public function update(Request $request, $id)
    {
        try {            
            try {                
                $grades = Grade::find($id);

                if (!$grades) {
                    return response()->json(['success' => false, 'message' => 'Nota no encontrada'], 404);
                }
                        
                $grades->grade = $request->grade;
                $grades->user_id = $request->user_id;
                $grades->assesments_id = $request->assesments_id;
                        
                $grades->save();
        
                return response()->json(['success' => true, 'message' => 'Nota actualizada correctamente'], 200);
        
            } catch (\Throwable $th) {
                return response()->json(['success' => false, 'message' => 'Error al actualizar la nota', 'error' => $th->getMessage()], 500);
            }
        } catch (\Throwable $th) {
            return response()->json(['success' => false, 'message' => 'Nota actualizada incorrectamente', 'error' => $th->getMessage()], 500);
        }
    }
}
