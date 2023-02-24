<?php

use App\Http\Controllers\DashboardController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [DashboardController    ::class, 'index'])->name('main');

Route::group(['prefix' => 'profile', 'as' => 'profile.'], function () {
    // student
    Route::get('/student', [StudentController::class, 'profile'])->name('student')->middleware('auth', 'Student');
    Route::get('/student/edit/{id}', [StudentController::class, 'profileEdit'])->name('student.edit')->middleware('auth', 'Student');
    Route::put('/student/update/{id}', [StudentController::class, 'profileUpdate'])->name('student.update')->middleware('auth', 'Student');
    Route::post('/student/clockin', [StudentController::class, 'clockin'])->name('student.put.clockin')->middleware('auth', 'Student');
    Route::put('/student/clockout/{id}', [StudentController::class, 'clockout'])->name('student.put.clockout')->middleware('auth', 'Student');
    Route::post('/student/cv/{id}', [StudentController::class, 'updateCV'])->name('student.put.cv')->middleware('auth', 'Student');
    Route::put('/student/cv/{id}/del', [StudentController::class, 'deleteCV'])->name('student.del.cv')->middleware('auth', 'Student');

    // supervisor
    Route::get('/supervisor', [SupervisorController::class, 'profile'])->name('supervisor')->middleware('auth', 'Supervisor');
    Route::put('/supervisor/attendance/approve/{id}', [AttendanceController::class, 'approveattendance'])->name('supervisor.approve.attendance.student')->middleware('auth', 'Supervisor');
    Route::put('/supervisor/attendance/reject/{id}', [AttendanceController::class, 'rejectattendance'])->name('supervisor.reject.attendance.student')->middleware('auth', 'Supervisor');
});
