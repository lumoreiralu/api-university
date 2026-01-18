<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DegreeController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\UserController;


// --- SECCIÓN PÚBLICA ---
Route::get('/', [DegreeController::class, 'showHome']); // Home
Route::get('/home', [DegreeController::class, 'showHome']);

Route::get('/degrees', [DegreeController::class, 'showDegrees']);
Route::get('/degree/{id}', [DegreeController::class, 'showDegree']); // {id} reemplaza a $params[1]

Route::get('/courses', [CourseController::class, 'showCourses']);
Route::get('/course/{id}', [CourseController::class, 'showCourse']);

Route::get('/showLogin', [UserController::class, 'showLogin'])->name('login');
Route::post('/login', [UserController::class, 'login']);

// --- SECCIÓN PROTEGIDA (Tus Middlewares) ---
// En Laravel, en lugar de llamar al middleware en cada case, los agrupas:
Route::middleware(['auth'])->group(function () {
    
    // Carreras (Degrees)
    Route::get('/formNewDegree', [DegreeController::class, 'showFormNewDegree']);
    Route::post('/newDegree', [DegreeController::class, 'newDegree']);
    Route::get('/formUpdateDegree/{id}', [DegreeController::class, 'formUpdateDegree']);
    Route::post('/updateDegree/{id}', [DegreeController::class, 'updateDegree']);
    Route::get('/deleteDegree/{id}', [DegreeController::class, 'deleteDegree']);

    // Cursos (Courses)
    Route::get('/formNewCourse', [CourseController::class, 'showFormNewCourse']);
    Route::post('/newCourse', [CourseController::class, 'newCourse']);
    Route::get('/formUpdateCourse/{id}', [CourseController::class, 'formUpdateCourse']);
    Route::post('/updateCourse/{id}', [CourseController::class, 'updateCourse']);
    Route::get('/deleteCourse/{id}', [CourseController::class, 'deleteCourse']);

    Route::get('/logout', [UserController::class, 'logout']);
});