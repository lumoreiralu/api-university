<?php

namespace App\Http\Controllers;


use App\Models\CourseModel; 
use App\Models\DegreeModel;
use Illuminate\Http\Request;

class CourseController extends Controller
{

    public function showCourses(){

        $courses = CourseModel::with('carrera')->get(); 
        
        return view('course.course-list', compact('courses'));
    }

    public function showCourse($id) {
        $course = CourseModel::findOrFail($id); 
        return view('course.course-id', compact('course'));
    }

    public function showFormNewCourse() {
        $degrees = DegreeModel::all();
        return view('course.form-newCourse', compact('degrees'));
    }

    public function newCourse(Request $request) {
        $request->validate([
            'nombre_materia' => 'required',
            'nombre_profesor' => 'required',
            'id_carrera' => 'required|exists:Carrera,id_carrera',
        ]);

        CourseModel::create([
            'nombre_materia' => $request->nombre_materia,
            'nombre_profesor' => $request->nombre_profesor,
            'id_carrera' => $request->id_carrera,
        ]);

        return redirect()->route('home')->with('success', 'Curso creado!');
    }

    public function deleteCourse($id) {
        CourseModel::destroy($id);
        return back()->with('success', 'Course deleted successfully');
    }

    public function formUpdateCourse($id) {
        $course = CourseModel::findOrFail($id);
        $degrees = DegreeModel::all();
        return view('course.form-updateCourse', compact('course', 'degrees'));
    }

    public function updateCourse(Request $request, $id) {
        $course = CourseModel::findOrFail($id);

        $course->update($request->all());

        return redirect()->route('home')->with('info', 'Course updated successfully');
    }
}