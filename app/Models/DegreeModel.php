<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DegreeModel extends Model
{
    protected $table = 'Carrera'; 
    protected $primaryKey = 'id_carrera';
    public $timestamps = false; 

    protected $fillable = ['nombre_carrera', 'duracion'];

    public function materias()
    {
        // Modelo relacionado, FK en Materia, PK en Carrera
        return $this->hasMany(CourseModel::class, 'id_carrera', 'id_carrera');
    }
}