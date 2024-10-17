<?php

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

use function Pest\Laravel\put;

//users
Route::get('/', [UserController::class,'show']);

Route::prefix('users')->group(
    function(){
        Route::post('/createuser', [UserController::class,'add']);

        Route::put('/{id}/edit', [UserController::class, 'update'])->name('users.update');
        
        Route::delete('/{id}/delete', [UserController::class, 'destroy'])->name('users.destroy');
        
        Route::get('/create',function(){
            return view('users.create');
        });
    }
);








//projects

Route::prefix('user')->group(function(){
    
    Route::get('/{id}/project/create', [ProjectController::class, 'create'])->name('createproject');
    Route::get('/{id}/project',[ProjectController::class, 'show'])->name('projectlist');
    Route::post('/{id}/project', [ProjectController::class,'add'])->name('addprojects');
    Route::put('/{id}/project/edit', [ProjectController::class, 'update'])->name('project.update');
    Route::delete('/{id}/project/delete', [ProjectController::class, 'destroy'])->name('project.destroy');
    Route::get('/project',function(){
        return view('project.index');
    });
});


// project
// - post ( )
// - put
// -




// /users
// /users/add
// /users/view
// /users/edit
// /users/delete
