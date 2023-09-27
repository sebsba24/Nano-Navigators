<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $topic = DB::table('topics')->get();
            $response = [
                'success' => true,
                'message' => 'Consulta existosa de los temas',
                'data' => $topic
            ];
        } catch (\Throwable $th) {
            $j['success'] = false;
            $j['data'] = $th->getMessage();
            $j['code'] = 500;
        }
        return response()->json($response, 200);    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function showTopicByName($name)
        {
            try{
                $topic = DB::table('topics')->where('name', $name)->first();
                // es para poder buscar los temas por su nombre
                $response = [];
    
                if(!$topic){
                    /* return an error 404 */
                    return response()-> json(['success' => false, 'message' => 'Tema no encontrado']);
                }
    
                $response = [
                    'success' => true,
                    'message' => 'Consulta del tema efectuada con exito',
                    'data' => $topic
                ];
            } catch (\Throwable $th){
                $j['success'] = false;
                $j['data'] = $th->getMessage();
                $j['code'] = 500;
            }
            return response()->json($response, 200);
        }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
        {
            $topic = Topic::create([
                'name' => $request->name,
                'content' => $request ->content,
                'module_id' => $request -> module_id
            ]);
    
            return response()-> json(['message' => 'Tema registrado correctamente'],200);
        }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {        
        try {
            //this code is generate by IA and refactored by us
            try {
                // Encuentra el tema por su ID
                $topic = Topic::find($id);
        
                if (!$topic) {
                    return response()->json(['success' => false, 'message' => 'Tema no encontrado'], 404);
                }
        
                // Actualiza los campos del tema
                $topic->name = $request->name;
                $topic->content = $request->content;
                $topic->module_id = $request->module_id;
        
                // Guarda los cambios
                $topic->save();
        
                return response()->json(['success' => true, 'message' => 'Tema actualizado correctamente'], 200);
        
            } catch (\Throwable $th) {
                return response()->json(['success' => false, 'message' => 'Tema no actualizado', 'error' => $th->getMessage()], 500);
            }
        } catch (\Throwable $th) {
            return response()->json(['success' => false, 'message' => 'Tema no actualizado ', 'error' => $th->getMessage()], 500);
        }
    }
}

