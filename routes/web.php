<?php

use App\Http\Controllers\BatchController;
use App\Http\Controllers\BatchStudentController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\ExtracurricularController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Middleware\SchoolAuthenticationMiddleware;
use App\Http\Middleware\SchoolLogInRestrictionMiddleware;
use App\Http\Middleware\TeacherAuthenticationMiddleware;
use App\Http\Middleware\TeacherLogInRestrictionMiddleware;
use App\Models\BatchStudent;
use App\Models\Teacher;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});




Route::middleware( [SchoolAuthenticationMiddleware::class])->group(function () {


    Route::post('/schools/logout', [SchoolController::class, "logOut"]);


    Route::get('/schools/dashboard', [SchoolController::class, "edit"]);
    Route::get('/schools/teacher-management', [TeacherController::class, "create"]);

    Route::get('/schools/class-management', [ClassController::class, "create"]);

    Route::post('/teachers', action: [TeacherController::class, "store"]);
    Route::post('/students', action: [StudentController::class, "store"]);
    Route::put('/students/{student}', action: [StudentController::class, "edit"]);



    Route::put('/teachers/{teacher}', action: [TeacherController::class, "update"]);



    Route::post('/classes', action: [ClassController::class, "store"]);
    Route::put('/classes/{schoolClass}', action: [ClassController::class, "update"]);

    Route::post('/extracurriculars', action: [ExtracurricularController::class, "store"]);

    Route::put('/extracurriculars/{extracurricular}', action: [ExtracurricularController::class, "update"]);


    Route::put('/teachers/block/{teacher}', [TeacherController::class, 'block']);
    Route::put('/teachers/unblock/{teacher}', [TeacherController::class, 'unblock']);


    Route::get('/schools/extracurricular-management', action: [ExtracurricularController::class, "create"]);
    Route::get('/schools/student-management', action: [StudentController::class, "create"]);
});

Route::middleware([SchoolLogInRestrictionMiddleware::class])->group(function () {


    Route::get('/schools/login', [SchoolController::class, "login"]);
    Route::post('/schools/authenticate', [SchoolController::class, "authenticate"]);
    Route::get('/schools/register', [SchoolController::class, "create"]);
    Route::post('/schools', action: [SchoolController::class, "store"]);
});


Route::middleware([TeacherLogInRestrictionMiddleware::class])->group(function () {

    Route::get('/teachers/login', [TeacherController::class, "login"]);
    Route::post('/teachers/authenticate', [TeacherController::class, "authenticate"]);


});


Route::middleware([TeacherAuthenticationMiddleware::class])->group(function () {


    Route::get('/teachers/dashboard', [TeacherController::class, "edit"]);
    Route::get('/teachers/class-management', [ClassController::class, "manage"]);

    Route::get('/teachers/classes/{schoolClass}', [BatchController::class, "create"]);

    Route::post('/teachers/logout', [TeacherController::class, "logOut"]);
    Route::post('/{schoolClass}/batches', [BatchController::class, "store"]);
    Route::get('/{schoolClass}/batches/{batch}/edit', [BatchController::class, "edit"]);
    Route::put('/{schoolClass}/batches/{batch}/edit', [BatchController::class, "update"]);

    Route::get('/{schoolClass}/batches/{batch}/batchstudent/{batchStudent}', [BatchStudentController::class, "index"]);
    Route::put('/{schoolClass}/batches/{batch}/batchstudent/{batchStudent}', [BatchStudentController::class, "update"]);


});
