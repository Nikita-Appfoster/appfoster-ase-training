<?php

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
//users
Route::get('/', [UserController::class,'show']);

Route::post('/users/createuser', [UserController::class,'add']);

Route::put('/users/{id}/edit', [UserController::class, 'update'])->name('users.update');

Route::delete('/users/{id}/delete', [UserController::class, 'destroy'])->name('users.destroy');

Route::get('/users/create',function(){
    return view('users.create');
});

//projects
Route::get('/user/project',function(){
    return view('project.index');
});

Route::get('/user/{id}/project/create', [ProjectController::class, 'create'])->name('createproject');



Route::get('/user/{id}/project',[ProjectController::class, 'show'])->name('projectlist');

Route::post('/user/{id}/addproject', [ProjectController::class,'add'])->name('addprojects');
Route::put('/user/{id}/project/edit', [ProjectController::class, 'update'])->name('project.update');
Route::delete('/user/{id}/project/delete', [ProjectController::class, 'destroy'])->name('project.destroy');






// /users
// /users/add
// /users/view
// /users/edit
// /users/delete


