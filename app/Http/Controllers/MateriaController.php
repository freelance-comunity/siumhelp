<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Materia;
use App\Asignacion;
use DB;

class MateriaController extends Controller
{
    public function index()
    {
        $materias = Materia::all();
        return $materias;
    }

    public function asignacion()
    {   
        $sium_asignaciones = Materia::all();
        
        foreach ($sium_asignaciones as $value) {
            if ($value->plantel = 3 AND $value->plan_estudio = 42) {
                $input['study_plan_id'] = $value->plan_estudio;
                $input['subject_id'] = $value->id_materia;
                $input['grade'] = $value->grado;
                $input['group_id'] = $value->id_grupos;
                $input['teacher_id'] = $value->id_empleado;
                
                // Asignacion::create($input);
                dd($input);
            }
        }
        echo "listo";
    }
}
