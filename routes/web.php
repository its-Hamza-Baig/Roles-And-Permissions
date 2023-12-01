<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\AddStudentController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::group(['middleware' => ['auth']], function(){ 
    Route::group(['middleware' => ['role:Admin']], function () {
    
    Route::get('/users/index', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/show/{id}', [UserController::class, 'show'])->name('users.show');
    Route::post('/users/store', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::get('/users/destroy/{id}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
    Route::post('/users/update/{user}', [UserController::class, 'update'])->name('users.update');


 
    Route::get('/roles/index', [RoleController::class, 'index'])->name('roles.index');
    Route::get('/roles/show/{id}', [RoleController::class, 'show'])->name('roles.show');
    Route::post('/roles/store', [RoleController::class, 'store'])->name('roles.store');
    Route::get('/roles/create', [RoleController::class, 'create'])->name('roles.create');
    Route::get('/roles/destroy/{id}', [RoleController::class, 'destroy'])->name('roles.destroy');
    Route::get('/roles/edit/{id}', [RoleController::class, 'edit'])->name('roles.edit');
    Route::post('/roles/update/{id}', [RoleController::class, 'update'])->name('roles.update');

    
    Route::get('/courses/show/{id}', [CourseController::class, 'show'])->name('courses.show');
    Route::post('/courses/store', [CourseController::class, 'store'])->name('courses.store');
    Route::get('/courses/create', [CourseController::class, 'create'])->name('courses.create');
    Route::get('/courses/destroy/{id}', [CourseController::class, 'destroy'])->name('courses.destroy');
    Route::get('/courses/edit/{id}', [CourseController::class, 'edit'])->name('courses.edit');
    Route::post('/courses/update/{id}', [CourseController::class, 'update'])->name('courses.update');


});



 




    Route::group(['middleware' => ['role:Student|Admin']], function () {
        Route::get('/courses/index', [CourseController::class, 'index'])->name('courses.index');
    });

    Route::group(['middleware' => ['role:Student']], function () {

        Route::get('/courses/enroll/{id}', [CourseController::class, 'enrollment'])->name('courses.enrollme');
        Route::get('/courses/enrolled', [CourseController::class, 'enrolled'])->name('courses.enroll');
        Route::get('/enrolled', [CourseController::class, 'enrolled'])->name('enrolled');
        Route::get('/deletemycourse/{id}', [CourseController::class, 'deletemycourse'])->name('courses.deletemycourse');
    });


    
    Route::group(['middleware' => ['role:Admin|Teacher']], function () {
        Route::get('/addStudent', [AddStudentController::class, 'addStudent'])->name('addStudent');
        Route::post('/addStudent', [AddStudentController::class, 'store'])->name('student.store');
        Route::get('/showstudent', [AddStudentController::class, 'show'])->name('showStudent');

    });

});