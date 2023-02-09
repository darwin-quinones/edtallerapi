<?php

namespace App\Http\Controllers;

use App\Models\Estudiantes;
use App\Http\Requests\StoreEstudiantesRequest;
use App\Http\Requests\UpdateEstudiantesRequest;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class EstudiantesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // http://127.0.0.1:8000/api/estudiantes/index
        // get students
        $students = Estudiantes::all();
        return $students;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEstudiantesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //NOTE:
        // URL: http://127.0.0.1:8000/api/estudiantes/store
        //BODY:  {"name": "Pedro Martinez T","active": 0},

        // here is to create student
        $student = Estudiantes::create($request->all());
        return $student;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Estudiantes  $estudiantes
     * @return \Illuminate\Http\Response
     */
    public function getById(Estudiantes $estudiantes, $id)
    {
        // http://127.0.0.1:8000/api/estudiantes/buscar/2
        $estudiante  = Estudiantes::find($id);
        return $estudiante;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEstudiantesRequest  $request
     * @param  \App\Models\Estudiantes  $estudiantes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        /**
         * NOTE : http://127.0.0.1:8000/api/estudiantes/update/1
         * It must  have a body : {"name": "Darwin Quinones Sanchez","active": 1}
         *
         */
        // Here to edit an student acording to the id and the request information sent from the form
        Estudiantes::where('id', '=', $id)->update($request->toArray());
        $student = Estudiantes::find($id);
        return $student;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Estudiantes  $estudiantes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Estudiantes $estudiantes, $id)
    {
        // URL: http://127.0.0.1:8000/api/estudiantes/delete/1
        // Delete student
        $student = Estudiantes::where('id', '=', $id);
        if($student->count() > 0){
            Estudiantes::destroy($id);
            $message = ['message' => 'Student deleted'];
        }else{
            $message = ['message' => 'Not found'];
        }
        return $message;
    }
}
