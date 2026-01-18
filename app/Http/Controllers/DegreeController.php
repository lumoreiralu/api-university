<?php

namespace App\Http\Controllers;

use App\Models\DegreeModel;
use Illuminate\Http\Request;
use App\Models\CourseModel;


class DegreeController extends Controller
{
    public function showDegrees(){
        $degrees = DegreeModel::all();
        return view('degree.degree-list', compact('degrees'));
    }

}
