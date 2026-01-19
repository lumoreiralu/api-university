<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DegreeController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\UserController;


// --- SECCIÓN PÚBLICA ---
Route::get('/', [DegreeController::class, 'showHome'])->name('home'); // Home
Route::get('/home', [DegreeController::class, 'showHome'])->name('home');

Route::get('/degrees', [DegreeController::class, 'showDegrees']);
Route::get('/degree/{id}', [DegreeController::class, 'showDegree']); 

Route::get('/courses', [CourseController::class, 'showCourses']);
Route::get('/course/{id}', [CourseController::class, 'showCourse']);

Route::get('/showLogin', [UserController::class, 'showLogin'])->name('login');
Route::post('/login', [UserController::class, 'login']);

// --- SECCIÓN PROTEGIDA (Middlewares) ---

Route::middleware(['auth'])->group(function () {
    
    // Carreras (Degrees)
    Route::get('/formNewDegree', [DegreeController::class, 'showFormNewDegree']);
    Route::post('/newDegree', [DegreeController::class, 'newDegree'])->name('degrees.store');
    Route::get('/formUpdateDegree/{id}', [DegreeController::class, 'formUpdateDegree']);
    Route::post('/updateDegree/{id}', [DegreeController::class, 'updateDegree']);
    Route::delete('/deleteDegree/{id}', [DegreeController::class, 'deleteDegree']);

    // Cursos (Courses)
    Route::get('/formNewCourse', [CourseController::class, 'showFormNewCourse']);
    Route::post('/newCourse', [CourseController::class, 'newCourse'])->name('courses.store');
    Route::get('/formUpdateCourse/{id}', [CourseController::class, 'formUpdateCourse']);
    Route::post('/updateCourse/{id}', [CourseController::class, 'updateCourse']);
    Route::delete('/deleteCourse/{id}', [CourseController::class, 'deleteCourse']);

    Route::get('/logout', [UserController::class, 'logout']);
});