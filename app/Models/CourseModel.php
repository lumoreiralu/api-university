<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseModel extends Model
{
    // Nombre de la tabla en tu DB
    protected $table = 'Materia'; 

    public $timestamps = false;
    protected $fillable = ['nombre_materia', 'nombre_profesor', 'id_carrera'];

    public function carrera()
    {
        // Argumentos: Modelo relacionado, FK en Materia, PK en Carrera
        return $this->belongsTo(DegreeModel::class, 'id_carrera', 'id_carrera');
    }
}