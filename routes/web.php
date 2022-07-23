<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\customerController;
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



//Rutas de curso: Ruta de Lista
Route::get('/listaCategory', [categoryController::class,'listaCategory'])->name('listaCategory');

//Ruta de Formulario Guardar
Route::get('/formCategory', [categoryController::class,'formCategory']);

//Ruta para Guardar al categoryController
Route::post('/category/crearCategory', [categoryController::class,'guardarCategory'])->name('Category.save');

//Ruta de Formulario Editar
Route::get('/editformCategory/{id}', [categoryController::class,'editformCategory'])->name('editformCategory');

//Ruta para Editar
Route::patch('/editCategory/{id}', [categoryController::class, 'editCategory'])->name('editCategory');

//Ruta para Eliminar
Route::delete('/deleteCategory/{id}', [categoryController::class,'destroy'])->name('deleteCategory');



//Rutas de curso: Ruta de Lista
Route::get('/listaCustomer', [customerController::class,'listaCustomer'])->name('listaCustomer');


//Ruta de Formulario Guardar
Route::get('/formCustomer', [customerController::class,'formCustomer']);

//Ruta para Guardar al categoryController
Route::post('/customer/crearCustomer', [customerController::class,'guardarCustomer'])->name('Customer.save');

//Ruta de Formulario Editar
Route::get('/editformCustomer/{id}', [customerController::class,'editformCustomer'])->name('editformCustomer');

//Ruta para Editar
Route::patch('/editCustomer/{id}', [customerController::class, 'editCustomer'])->name('editCustomer');

//Ruta para Eliminar
Route::delete('/deleteCustomer/{id}', [customerController::class,'destroy'])->name('deleteCustomer');
