<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoriaController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\MesaController;
use App\Http\Controllers\Admin\ReservacionController;
use App\Http\Controllers\FrontEnd\CategoriaController as FrontEndCategoriaController;
use App\Http\Controllers\FrontEnd\MenuController as FrontEndMenuController;
use App\Http\Controllers\FrontEnd\ReservacionController as FrontEndReservacionController;
use App\Http\Controllers\FrontEnd\WelcomeController;
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

Route::get('/',[WelcomeController::class, 'index']);

Route::get('categorias', [FrontEndCategoriaController::class, 'index'])->name('categorias.index');
Route::get('categorias{categoria}', [FrontEndCategoriaController::class, 'show'])->name('categorias.show');
Route::get('menus', [FrontEndMenuController::class, 'index'])->name('menus.index');
Route::get('reservaciones/step-one', [FrontEndReservacionController::class, 'stepOne'])->name('reservaciones.step.one');
Route::post('reservaciones/step-one', [FrontEndReservacionController::class, 'storeStepOne'])->name('reservaciones.store.step.one');
Route::get('reservaciones/step-two', [FrontEndReservacionController::class, 'stepTwo'])->name('reservaciones.step.two');
Route::post('reservaciones/step-two', [FrontEndReservacionController::class, 'storeStepTwo'])->name('reservaciones.store.step.two');
Route::get('/gracias', [WelcomeController::class, 'gracias'])->name('gracias');

Route::get('/admin', function () {
    return view('admin.index');
})->middleware(['auth'])->name('admin');

Route::middleware(['auth', 'admin']) ->name('admin.') ->prefix('admin') -> group(function(){

    Route::get('/', [AdminController::class, 'index'])->name('index');

    Route::resource('/categorias' ,CategoriaController::class);
    Route::resource('/menus' ,MenuController::class);
    Route::resource('mesas' ,MesaController::class);
    Route::resource('/reservaciones' ,ReservacionController::class);
});

require __DIR__.'/auth.php';
