<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $certificate = DB::table('certificates')->get();
            $response = [
                'success' => true,
                'message' => 'Consulta existosa de los certificados',
                'data' => $certificate
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
    public function showCertificateByName($name)
        {
            try{
                $certificate = DB::table('certificates')->where('name', $name)->first();
                // es para poder buscar los certificados por su nombre
                $response = [];
    
                if(!$certificate){
                    /* return an error 404 */
                    return response()-> json(['success' => false, 'message' => 'Certificado no encontrado']);
                }
    
                $response = [
                    'success' => true,
                    'message' => 'Consulta del certificado efectuada con exito',
                    'data' => $certificate
                ];
            } catch (\Throwable $th){
                $j['success'] = false;
                $j['data'] = $th->getMessage();
                $j['code'] = 500;
            }
            return response()->json($response, 200);
        }

        public function download()
        {
            return response()-> json(['message' => 'Descargando...'],200);
        }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Certificate  $certificate
     * @return \Illuminate\Http\Response
     */
    public function edit(Certificate $certificate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Certificate  $certificate
     * @return \Illuminate\Http\Response
     */


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Certificate  $certificate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Certificate $certificate)
    {
        //
    }
}
