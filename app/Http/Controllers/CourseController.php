<?php

namespace App\Http\Controllers;


use App\Models\CourseModel; 
use App\Models\DegreeModel;
use Illuminate\Http\Request;

class CourseController extends Controller
{

    public function showCourses(){
        // El 'with' hace el INNER JOIN automáticamente
        $courses = CourseModel::with('carrera')->get(); 
        
        // Ahora en la vista podés acceder a: $course->nombre_materia 
        // y al nombre de la carrera así: $course->carrera->nombre_carrera
        return view('course.index', compact('courses'));
    }

    public function showCourse($id) {
        $course = CourseModel::findOrFail($id); // Si no lo encuentra, lanza un 404 automáticamente
        return view('courses.show', compact('course'));
    }

    public function showFormNewCourse() {
        $degrees = DegreeModel::all();
        return view('courses.create', compact('degrees'));
    }

    public function newCourse(Request $request) {
        // VALIDACIÓN: Laravel lo hace por ti de forma elegante
        $request->validate([
            'nombre_materia' => 'required',
            'nombre_profesor' => 'required',
            'id_carrera' => 'required|exists:degrees,id',
        ]);

        // INSERCIÓN: Usando Eloquent
        CourseModel::create([
            'nombre_materia' => $request->nombre_materia,
            'nombre_profesor' => $request->nombre_profesor,
            'id_carrera' => $request->id_carrera,
        ]);

        // REDIRECCIÓN: Ya no usamos header() ni BASE_URL
        return redirect()->route('home')->with('success', 'Curso creado!');
    }

    public function deleteCourse($id) {
        CourseModel::destroy($id);
        return back()->with('success', 'Curso eliminado');
    }

    public function formUpdateCourse($id) {
        $course = CourseModel::findOrFail($id);
        $degrees = DegreeModel::all();
        return view('courses.edit', compact('course', 'degrees'));
    }

    public function updateCourse(Request $request, $id) {
        $course = CourseModel::findOrFail($id);
        
        // Actualizamos los datos provenientes del $request
        $course->update($request->all());

        return redirect()->route('courses.index')->with('info', 'Curso actualizado');
    }
}