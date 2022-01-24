<?php

use Illuminate\Support\Facades\Route;
use App\HTTP\Controllers\ProductoController;
use App\HTTP\Controllers\UsuarioController;

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

/*Login + Logout*/

Route::get("/login", [UsuarioController::class, 'login']);

Route::post("/login", [UsuarioController::class, 'loginPost']);

Route::get("/logout", [UsuarioController::class, 'logout']);

/*Mostrar*/
Route::get('/',[ProductoController::class, 'mostrarProductos']);

Route::get('/mostrarProductoAdmin',[ProductoController::class, 'mostrarProductoAdmin']);

Route::get('/mostrarUsuarios',[UsuarioController::class, 'mostrarUsuarios']);

/*Crear*/
Route::get('/crearAdmin',[ProductoController::class, 'crearProducto']);

Route::post('/crearAdmin',[ProductoController::class, 'crearProductoPost']);

Route::get('/crearUsuario',[UsuarioController::class, 'crearUsuario']);

Route::post('/crearUsuario',[UsuarioController::class, 'crearUsuarioPost']);

/*Actualizar*/
Route::get('/modificarProducto/{id}', [ProductoController::class, 'modificarProducto']);

Route::put('/modificarProducto',[ProductoController::class, 'modificarProductoPut']);

Route::get('/modificarUsuario/{id}', [UsuarioController::class, 'modificarUsuario']);

Route::put('/modificarUsuario',[UsuarioController::class, 'modificarUsuarioPut']);

/*Eliminar*/
Route::delete('/eliminarProducto/{id}', [ProductoController::class, 'eliminarProducto']);

Route::delete('/eliminarUsuario/{id}', [UsuarioController::class, 'eliminarUsuario']);

/*Filtro*/
Route::get('/buscar',[ProductoController::class, 'buscarProducto']);

Route::get('/buscarUsuario', [UsuarioController::class, 'buscarUsuario']);

/*Correo*/
Route::get('correoPersona/{correo_user}',[UsuarioController::class, 'correoPersona']);

Route::post('recibirCorreo',[UsuarioController::class, 'recibirCorreo']);