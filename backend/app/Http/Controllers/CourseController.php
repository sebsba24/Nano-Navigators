<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Course;
class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
        public function index()
        {

            try{
                $courses = DB::table('courses')->get();

                $response = [
                    'succes' => true,
                    'message' => 'Consulta de cursos exitosa',
                    'data' => $courses
                ];
                return response()->json($response,200);
            } catch (\Throwable $th){
                return response()->json([
                    'state' => false,
                    'message' => $th->getMessage()
                ]);
            }
        }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
        public function showCourseByName($name)
        {
            try{
                $course = DB::table('courses')->where('name', $name)->first();
                // es para poder buscar los cursos por su nombre
                $response = [];
    
                /* We validate if the variable don´t
                have a name*/
                if(!$course){
                    /* return an error 404 */
                    return response()-> json(['success' => false, 'message' => 'Curso no encontrado']);
                }
    
                $response = [
                    'success' => true,
                    'message' => 'Consulta del curso efectuada con exito',
                    'data' => $course
                ];
            } catch (\Throwable $th){
                $j['success'] = false;
                $j['data'] = $th->getMessage();
                $j['code'] = 500;
            }
            return response()->json($response, 200);
        }        

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
        public function store(Request $request)
        {
            $course = Course::create([
                'name' => $request->name,
                'description' => $request ->description,
                'enable_date'=> $request -> enable_date,
                'end_date' => $request -> end_date,
                'user_id' => $request -> user_id,
                'state'=> $request -> state
            ]);
    
            return response()-> json(['message' => 'Curso registrado correctamente'],201);
        }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        try {
            try {
                // Encuentra el curso por su ID

                $course = Course::find($id);

                if (!$course) {
                    return response()->json(['success' => false, 'message'=> 'Curso no encontrado'],404);
                }

                $course->name = $request->name;
                $course->description = $request->description;
                $course -> enable_date = $request ->enable_date;
                $course -> end_date = $request -> end_date;
                $course -> state = true;

                $course -> save();

                return response()->json(['success'=>true,'message'=>'Curso actualizado correctamente'],200);
            }catch(\Throwable $th){
                return response()->json(['success'=>false,'message'=>'Error al actualizar','error'=>$th ->getMessage()],500);
            }
        } catch (\Throwable $th) {
            return response()->json(['success'=>false,'message'=>'Error al actualizar','error'=>$th ->getMessage()],500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function editStateCourse(Request $request, $id)
    {
        try {
            try {
                //find the course
                $course = Course::find($id);
                
                //set the state of the course
                $course->state = $request->state;

                //save the changes
                $course->save();

                return response()->json(['success' => true, 'message'=> 'Curso actualizado correctamente'],200);                
            } catch (\Throwable $th) {
                return response()->json(['success' => false, 'message'=> 'Error al actulizar', 'error' => $th->getMessage()], 500);
            }
        } catch (\Throwable $th) {
            return response()->json(['success' => false, 'message'=> 'Error al actulizar', 'error' => $th->getMessage()], 500);
        }
    }
}
