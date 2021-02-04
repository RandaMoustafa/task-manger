<?php

use Illuminate\Support\Facades\Route;

//Route::get('1/users',[\App\Http\Controllers\API\V1\UserController::class, 'index']);
//Route::get('1/users/{user}',[\App\Http\Controllers\API\V1\UserController::class, 'show']);

/*Route::namespace('App\\Http\\Controllers\\API\\V1\\') ->group(function(){
    Route::prefix(1/users)->group(function (){
        Route::as('api.users.v1.')->group(function (){
            Route::get('/','UserController@index')->name('index');
            Route::get('/{user}','UserController@show')->name('show');
        });
});
});*/
Route::group([
    'namespace' => 'App\\Http\\Controllers\\API\\V1\\',
    'prefix'=> '1/users',
    'as'=> 'api.users.v1.'

],function (){
    Route::get('/','UserController@index')->name('index');
    Route::get('/{user}','UserController@show')->name('show');
    Route::post('/','UserController@store')->name('store');
    Route::put('/{user}', 'UserController@update')->name('update');
    Route::delete('/{user}','UserController@destroy')->name('destroy');
});

Route::get('1/tasks',[\App\Http\Controllers\API\V1\TaskController::class, 'index'])->name('index');
Route::get('1/tasks/{tasks}', [\App\Http\Controllers\API\V1\TaskController::class, 'show'])->name('show');
Route::post('1/tasks', [\App\Http\Controllers\API\V1\TaskController::class,'store'])->name('store');
Route::put('1/tasks/{tasks}', [\App\Http\Controllers\API\V1\TaskController::class,'update'])->name('update');
Route::delete('1/tasks/{tasks}',[\App\Http\Controllers\API\V1\TaskController::class,'destroy'])->name('destroy');


Route::get('1/tag', [App\Http\Controllers\API\V1\TagController::class, 'index'])->name('index');
Route::get('1/tag/{tag}', [App\Http\Controllers\API\V1\TagController::class,'show'])->name('show');
Route::post('1/tag' , [App\Http\Controllers\API\V1\TagController::class, 'store'] )->name('store');
Route::put('1/tag/{tag}', [App\Http\Controllers\API\V1\TagController::class,'update'])->name('update');
Route::delete('1/tag/{tag}', [App\Http\Controllers\API\V1\TagController::class,'destroy'])->name('destroy');

Route::get('1/project', [App\Http\Controllers\API\V1\ProjectController::class,'index'])->name('index');
Route::get('1/project/{project}', [App\Http\Controllers\API\V1\ProjectController::class, 'show'])->name('show');
Route::post('1/project', [App\Http\Controllers\API\V1\ProjectController::class,'store'])->name('store');
Route::put('1/project/{project}', [App\Http\Controllers\API\V1\ProjectController::class, 'update'])->name('update');
Route::delete('1/project/{project}', [App\Http\Controllers\API\V1\ProjectController::class, 'destroy'])->name('destroy');
