<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\TrashedCourseControler;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [CourseController::class, 'index'])->name('courses');
Route::get('course/create', [CourseController::class, 'create'])->name('course.create');
Route::post('course/create', [CourseController::class, 'store']);
Route::get('course/{course}/edit', [CourseController::class, 'edit'])->name('course.edit');
// Route::post('course/{course}/edit', [CourseController::class, 'update']);
Route::patch('course/{course}/edit', [CourseController::class, 'update']);
// Route::post('course/{course}/destroy', [CourseController::class, 'destroy'])->name('course.destroy');
Route::delete('course/{course}/destroy', [CourseController::class, 'destroy'])->name('course.destroy');

Route::get('courses/trashed', [TrashedCourseControler::class, 'index'])->name('courses.trashed');
Route::patch('course/{id}/recover', [TrashedCourseControler::class, 'recover'])->name('course.recover');
Route::delete('course/{id}/delete', [TrashedCourseControler::class, 'delete'])->name('course.delete');
