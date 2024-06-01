<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\roleController;
use App\Http\Controllers\BitacoraController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\NotaDeEntradaController;
use App\Http\Controllers\CarritoventaController;
use app\Exports\ProductosExport;
use App\Http\Controllers\PromocionController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CrearOrdenController;
use App\Http\Controllers\OrdenController;
use App\Http\Controllers\ConfirmarOrdenController;
use App\Http\Controllers\NotaventaController;
use App\Models\notaventa;
use Illuminate\Http\Request;

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


Route::middleware([
    'auth',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard',  function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/shop', [CarritoventaController::class, 'shop'])->name('shop');
    Route::resource('promociones', PromocionController::class)->parameters(['promociones' => 'promocion']);
    Route::resource('carrito', CarritoventaController::class);
    //Route::get('/carrito', [CarritoVentaController::class, 'index'])->name('carrito.index');
    Route::post('/carrito/agregarProducto', [CarritoVentaController::class, 'agregarProducto'])->name('carrito.agregarProducto');
    //Route::post('carrito/actualizar/{detalleId}', [CarritoventaController::class, 'actualizarDetalle'])->name('carrito.actualizar');
    Route::get('/carrito/quitar/{producto}', [CarritoVentaController::class, 'quitarProducto'])->name('carrito.quitar');
    //Route::get('/carrito/vaciar', [CarritoVentaController::class, 'vaciarCarrito'])->name('carrito.vaciar');
    Route::resource('empleado', EmpleadoController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('bitacora', BitacoraController::class);
    Route::resource('marca', MarcaController::class);
    Route::resource('categoria', CategoriaController::class)->parameters(['categoria' => 'categoria']);
    Route::resource('producto', ProductoController::class);
    Route::resource('nota-de-entrada', NotaDeEntradaController::class);
    Route::resource('notaventa', NotaventaController::class);
    Route::resource('carrito', CarritoVentaController::class)->except(['update']);
    Route::get('/detalles-compra/{id}', [NotaventaController::class, 'mostrarDetalles'])->name('detalles.compra');

    Route::get('/ordenes/crear', CrearOrdenController::class)->middleware('auth')->name('ordenes.crear');

    Route::get('/ordenes/confirmar', ConfirmarOrdenController::class)->middleware('auth')->name('ordenes.confirmar');


    Route::get('/productos/exportarExcel', [ProductoController::class, 'exportarExcel'])->name('productos.exportarExcel');

    Route::resource('cliente',ClienteController::class);



});
