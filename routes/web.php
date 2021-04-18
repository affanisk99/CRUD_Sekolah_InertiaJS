<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Master\StudentController;
use App\Http\Controllers\Master\TeacherController;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

Route::group(['prefix'=>'student'], function() {
    Route::get('/',[StudentController::class, 'index'])->name('student.index');
    Route::get('create',[StudentController::class, 'create'])->name('student.create');
    Route::post('store',[StudentController::class, 'store'])->name('student.store');
    Route::get('{student}/edit',[StudentController::class, 'edit'])->name('student.edit');
    Route::put('{student}/update',[StudentController::class, 'update'])->name('student.update');
    Route::delete('{student}/destroy',[StudentController::class, 'destroy'])->name('student.destroy');
});

Route::group(['prefix'=>'teacher'], function() {
    Route::get('/',[TeacherController::class, 'index'])->name('teacher.index');
    Route::get('create',[TeacherController::class, 'create'])->name('teacher.create');
    Route::post('store',[TeacherController::class, 'store'])->name('teacher.store');
    Route::get('{teacher}/edit',[TeacherController::class, 'edit'])->name('teacher.edit');
    Route::put('{teacher}/update',[TeacherController::class, 'update'])->name('teacher.update');
    Route::delete('{teacher}/destroy',[TeacherController::class, 'destroy'])->name('teacher.destroy');
});