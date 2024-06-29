<?php

use App\Http\Controllers\CahierTexteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JoursController;
use App\Http\Controllers\ClasseController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\ProfesseurController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/courses', [ClasseController::class, 'index'])->name('courses.index');
Route::get('/add-courses', [ClasseController::class, 'create'])->name('courses.add');
Route::post('/saveCourses', [ClasseController::class, 'save'])->name('courses-save');
Route::delete('/deleteCourses/{id}', [ClasseController::class, 'delete'])->name('courses-delete');
Route::get('/editCourses/{id}', [ClasseController::class, 'edit'])->name('courses-edit');
Route::put('/updateCourses/{id}', [ClasseController::class, 'update'])->name('courses-update');

Route::get('/modules', [ModuleController::class, 'index'])->name('modules.index');
Route::get('/add-modules', [ModuleController::class, 'create'])->name('modules.add');
Route::post('/saveModules', [ModuleController::class, 'save'])->name('modules-save');
Route::post('/enregistrerModules', [ModuleController::class, 'saveModule'])->name('modules-enregistrer');
Route::delete('/deleteModules/{id}', [ModuleController::class, 'delete'])->name('modules-delete');
Route::get('/editModules/{id}', [ModuleController::class, 'edit'])->name('modules-edit');
Route::put('/updateModules/{id}', [ModuleController::class, 'update'])->name('modules-update');


Route::get('/jours', [JoursController::class, 'index'])->name('jours.index');
Route::get('/add-jours', [JoursController::class, 'create'])->name('jours.add');
Route::post('/saveJours', [JoursController::class, 'save'])->name('jours-save');
Route::delete('/deleteJours/{id}', [JoursController::class, 'delete'])->name('jours-delete');
Route::get('/editJours/{id}', [JoursController::class, 'edit'])->name('jours-edit');
Route::put('/updateJours/{id}', [JoursController::class, 'update'])->name('jours-update');


Route::get('/user', [UserController::class, 'index'])->name('user.index');
Route::get('/add-user', [UserController::class, 'create'])->name('user.add');
Route::post('/saveUser', [UserController::class, 'save'])->name('user-save');
Route::delete('/deleteUser/{id}', [UserController::class, 'delete'])->name('user-delete');
Route::get('/editUser/{id}', [UserController::class, 'edit'])->name('user-edit');
Route::put('/updateUser/{id}', [UserController::class, 'update'])->name('user-update');
Route::put('/updateProfile', [UserController::class, 'editProfile'])->name('profile-update');


Route::get('/professeur', [ProfesseurController::class, 'index'])->name('professeur.index');
Route::get('/prof-module/{id}', [ModuleController::class, 'showModulesAffectes'])->name('professeur.module');


// routes pour renseigner le cahier de texte

// Route::get('/cahier-de-texte/create', [CahierTexteController::class, 'create'])->name('cahier-de-texte.create');
// Route::post('/cahier-de-texte/store', [CahierTexteController::class, 'store'])->name('cahier-de-texte.store');
// Route::get('/cahier-de-texte', [CahierTexteController::class, 'index'])->name('cahier-de-texte.index');


Route::resource('cahier-de-texte', CahierTexteController::class);





Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
