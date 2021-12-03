<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentMarkController;
use Illuminate\Support\Facades\Route;

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


Route::resources([
    'students' => StudentController::class,  //Resource routes for student
    'student-marks' => StudentMarkController::class,  //Resource routes for student marks
]);

Route::get('/', function () {
    return redirect('students');
});
