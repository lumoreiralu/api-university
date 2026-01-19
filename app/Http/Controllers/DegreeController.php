<?php

namespace App\Http\Controllers;

use App\Models\DegreeModel;
use Illuminate\Http\Request;

class DegreeController extends Controller
{
    public function showDegrees()
    {
        $degrees = DegreeModel::all();
        return view('degree.degree-list', compact('degrees'));
    }

    public function showHome()
    {
        $degrees = DegreeModel::with('materias')->get();
        return view('home', compact('degrees'));
    }

    public function showDegree($id)
    {
        // Cargamos las materias para mostrarlas en el detalle
        $degree = DegreeModel::with('materias')->findOrFail($id);
        return view('degree.degree-id', compact('degree'));
    }

    // Corregido: Agregamos el tipo Request y quitamos parámetros innecesarios en formularios
    public function formUpdateDegree($id)
    {
        $degree = DegreeModel::findOrFail($id);
        return view('degree.form-update-degree', compact('degree'));
    }

    public function updateDegree(Request $request, $id)
    {

        $request->validate([
            'nombre_carrera' => 'required',
            'duracion' => 'required',
        ]);

        $degree = DegreeModel::findOrFail($id);
        $degree->update($request->all());

        return redirect()->route('home')->with('info', 'Degree updated successfully');
    }

    public function deleteDegree($id)
    {
        DegreeModel::destroy($id);
        return back()->with('success', 'Degree deleted successfully');
    }

    public function showFormNewDegree()
    {
        return view('degree.form-newDegree');
    }

    public function newDegree(Request $request)
    {
        $request->validate([
            'nombre_carrera' => 'required',
            'duracion' => 'required',
        ]);

        DegreeModel::create($request->all());

        return redirect()->route('home')->with('success', 'Degree created successfully!');
    }
}