<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PolyMorphicController;

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

Route::get('/laravel', function () {
    return view('welcome');
});

Route::get('/',function(){
    return view('form');
});

Route::get('/content-view',[PolyMorphicController::class,'view'])->name('view');
Route::post('/submit',[PolyMorphicController::class,'submit'])->name('submit-form');
Route::post('/add-comment',[PolyMorphicController::class,'comment'])->name('view');

