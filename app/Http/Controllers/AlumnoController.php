<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\AlumnoRepository;
class AlumnoController extends Controller
{
    
    protected $alumnos;
    public function _construct(AlumnoRepository $alumnos)
    {
        $this->alumnos=$alumnos;
    }
    public function index()
    {
        $alumnos=$this->alumnos->obtenerAlumnos();
    return view('alumnos.lista', ['alumno'=> $alumno]);

    }

    public function create()
    {
        return view('alumnos.crear');
    }
    public function store(Request $request)
    {
        $this->alumnos->InsertarAlumnos($request);
return redirect()->action([AlumnoController::class, 'index']);
    }
    public function show($id)
    {
        $alumno = $this->alumnos->obtenerAlumnoPorId($id);
return view('alumnos.ver', ['alumno' => $alumno]);
    }
    public function edit($id)
    {
        $alumno = $this->alumnos->obtenerAlumnoPorId($id);
return view('alumnos.editar', ['alumno' => $alumno]);
    }
    public function update(Request $request, $id)
    {
        $this->alumnos->actualizarAlumno($request, $id);
return redirect()->action([AlumnoController::class, 'index']);
    }
    public function destroy($id)
    {
        $this->alumnos->eliminarAlumno($id);
return redirect()->action([AlumnoController::class, 'index']);
    }
}
