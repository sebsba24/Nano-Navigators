<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $users = DB::table('users')->get();
            $response = [
                'success' => true,
                'message' => 'Consulta existosa de los usuarios',
                'data' => $users
            ];
        } catch (\Throwable $th) {
            $j['success'] = false;
            $j['data'] = $th->getMessage();
            $j['code'] = 500;
        }
        return response()->json($response, 200);
    }

    /* show a user by id */
    public function showUserById($id)
    {
        try {
            $user = DB::table('users')->find($id);

            $response = [];

            /* we validate if the variable don't have an id */
            if (!$user) {
                /* return an error 404 */
                return response()->json(['success' => false, 'message' => 'Usuario no encontrado'], 404);
            } 

            $response = [
                'success' => true,
                'message' => 'Consulta exitosa del usuario',
                'data' => $user
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'identification' => $request->identification,
            'phone' => $request->phone,
            'role_id' => $request->role_id,
            'password' => bcrypt($request->password)
        ]);

        return response()->json(['message' => 'Usuario registrado correctamente'], 201);
    }


    public function editCourse(Request $request, Topic $topic)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {        
        try {
            //this code is generate by IA and refactored by us
            try {
                // Encuentra el usuario por su ID
                $user = User::find($id);
        
                if (!$user) {
                    return response()->json(['success' => false, 'message' => 'Usuario no encontrado'], 404);
                }
        
                // Actualiza los campos del usuario
                $user->name = $request->name;
                $user->last_name = $request->last_name;
                $user->email = $request->email;
                $user->identification = $request->identification;
                $user->phone = $request->phone;
                $user->role_id = $request->role_id;
                $user->state = true;
                $user->password = bcrypt($request->password);
        
                // Guarda los cambios
                $user->save();
        
                return response()->json(['success' => true, 'message' => 'Usuario actualizado correctamente'], 200);
        
            } catch (\Throwable $th) {
                return response()->json(['success' => false, 'message' => 'Usuario actualizado incorrectamente', 'error' => $th->getMessage()], 500);
            }
        } catch (\Throwable $th) {
            return response()->json(['success' => false, 'message' => 'Usuario actualizado incorrectamente', 'error' => $th->getMessage()], 500);
        }
    }

    public function editStateUser(Request $request, $id)
    {
        try {
            try {
                // find the user 
                $user = User::find($id);
                                        
                //set the state of the user
                $user->state = $request->state;                
        
                // save the data changed
                $user->save();
        
                return response()->json(['success' => true, 'message' => 'Usuario actualizado correctamente'], 200);        
            } catch (\Throwable $th) {
                return response()->json(['success' => false, 'message' => 'Usuario actualizado incorrectamente', 'error' => $th->getMessage()], 500);
            }
        } catch (\Throwable $th) {
            return response()->json(['success' => false, 'message' => 'Usuario actualizado incorrectamente', 'error' => $th->getMessage()], 500);
        }
    }
}
