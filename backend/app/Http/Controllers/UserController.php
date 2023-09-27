<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
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

    public function store(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'identification' => $request->identification,
            'phone' => $request->phone,
            'state' => true,
            'role_id' => $request->role_id,
            'password' => bcrypt($request->password)
        ]);

        return response()->json(['message' => 'Usuario registrado correctamente'], 201);
    }
  
    public function update(Request $request, $id)
    {        
        try {
            //this code is generate by IA and refactored by us
            try {
                // Encuentra el usuario por su ID
                $user = User::find($id);

                //we validate if the data is correct
                $validatedData = $request->validate([
                    'name' => 'required|string|max:255',
                    'last_name' => 'required|string|max:255',
                    'email' => 'required|string|email|max:255',                    
                ]);
        
                //if the object user don't exists, the response return a error
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
}
