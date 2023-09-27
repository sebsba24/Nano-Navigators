<?php

namespace App\Http\Controllers;

use App\Models\Assesment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AssesmentController extends Controller
{
    public function index()
    {        
        try {
            $assesment = DB::table('assesments')->get();
            $response = [
                'success' => true,
                'message' => 'Consulta existosa de las evaluaciones',
                'data' => $assesment
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
            $assesment = DB::table('assesments')->find($id);

            $response = [];
            
            if (!$assesment) {                
                return response()->json(['success' => false, 'message' => 'Evaluación no encontrada'], 404);
            } 

            $response = [
                'success' => true,
                'message' => 'Consulta exitosa de la evaluacion',
                'data' => $assesment
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
        $assesment = Assesment::create([
            'name' => $request->name,
            'start_date' => $request->start_date,
            'description' => $request->description,
            'courses_id' => $request->courses_id            
        ]);

        return response()->json(['message' => 'Evaluacion registrada correctamente'], 201);
    }

    public function update(Request $request, $id)
    {
        try {            
            try {                
                $assesment = Assesment::find($id);

                if (!$assesment) {
                    return response()->json(['success' => false, 'message' => 'Evaluación no encontrada'], 404);
                }
                        
                $assesment->name = $request->name;
                $assesment->start_date = $request->start_date;
                $assesment->description = $request->description;
                $assesment->courses_id = $request->courses_id;   
                        
                $assesment->save();
        
                return response()->json(['success' => true, 'message' => 'Evaluación actualizado correctamente'], 200);
        
            } catch (\Throwable $th) {
                return response()->json(['success' => false, 'message' => 'Error al actualizar evaluación', 'error' => $th->getMessage()], 500);
            }
        } catch (\Throwable $th) {
            return response()->json(['success' => false, 'message' => 'Evaluación actualizado incorrectamente', 'error' => $th->getMessage()], 500);
        }
    }
}
