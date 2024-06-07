<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Importa el Facade DB
use Illuminate\Database\QueryException;
use Symfony\Component\HttpFoundation\Response;


class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            // Tu consulta SQL
            $historial = DB::select('
                SELECT tb1.idPresupuesto, tb2.UsuNombres, tb2.UsuApellidos, tb3.CiuNombre, tb4.PaisNombre, tb1.PreValorLocal, tb1.PreValorPaisSelect
                FROM presupuesto tb1
                INNER JOIN usuarios tb2 ON tb2.idUsuarios = tb1.Usuarios_idUsuarios
                INNER JOIN ciudad tb3 ON tb3.idCiudad = tb1.Ciudad_idCiudad
                INNER JOIN pais tb4 ON tb4.idPais = tb3.Pais_idPais;
            ');

            return response()->json($historial, Response::HTTP_OK); // 200
        } catch (QueryException $e) {
            // Manejar la excepción de la consulta SQL y devolver un error 500
            return response()->json([
                'error' => 'Error al acceder a la base de datos',
                'message' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR); // 500
        } catch (\Exception $e) {
            // Manejar cualquier otra excepción y devolver un error 500
            return response()->json([
                'error' => 'Error interno del servidor',
                'message' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR); // 500
        }
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
