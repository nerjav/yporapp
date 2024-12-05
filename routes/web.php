<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PedidosController;



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
// routes/api.php
Route::get('/admin/pedidos/buscar-por-ruc', [PedidosController::class, 'buscarPorRuc']);
Route::get('cliente/{ruc}','App\Http\Controllers\Admin\PedidosController@ruc')->name('ruc');

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('admin-users')->name('admin-users/')->group(static function() {
            Route::get('/',                                             'AdminUsersController@index')->name('index');
            Route::get('/create',                                       'AdminUsersController@create')->name('create');
            Route::post('/',                                            'AdminUsersController@store')->name('store');
            Route::get('/{adminUser}/impersonal-login',                 'AdminUsersController@impersonalLogin')->name('impersonal-login');
            Route::get('/{adminUser}/edit',                             'AdminUsersController@edit')->name('edit');
            Route::post('/{adminUser}',                                 'AdminUsersController@update')->name('update');
            Route::delete('/{adminUser}',                               'AdminUsersController@destroy')->name('destroy');
            Route::get('/{adminUser}/resend-activation',                'AdminUsersController@resendActivationEmail')->name('resendActivationEmail');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::get('/profile',                                      'ProfileController@editProfile')->name('edit-profile');
        Route::post('/profile',                                     'ProfileController@updateProfile')->name('update-profile');
        Route::get('/password',                                     'ProfileController@editPassword')->name('edit-password');
        Route::post('/password',                                    'ProfileController@updatePassword')->name('update-password');
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('clientes')->name('clientes/')->group(static function() {
            Route::get('/',                                             'ClientesController@index')->name('index');
            Route::get('/create',                                       'ClientesController@create')->name('create');
            Route::post('/',                                            'ClientesController@store')->name('store');
            Route::get('/{cliente}/edit',                               'ClientesController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'ClientesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{cliente}',                                   'ClientesController@update')->name('update');
            Route::delete('/{cliente}',                                 'ClientesController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('inventarios')->name('inventarios/')->group(static function() {
            Route::get('/',                                             'InventarioController@index')->name('index');
            Route::get('/create',                                       'InventarioController@create')->name('create');
            Route::post('/',                                            'InventarioController@store')->name('store');
            Route::get('/{inventario}/edit',                            'InventarioController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'InventarioController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{inventario}',                                'InventarioController@update')->name('update');
            Route::delete('/{inventario}',                              'InventarioController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('productos')->name('productos/')->group(static function() {
            Route::get('/',                                             'ProductosController@index')->name('index');
            Route::get('/create',                                       'ProductosController@create')->name('create');
            Route::post('/',                                            'ProductosController@store')->name('store');
            Route::get('/{producto}/edit',                              'ProductosController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'ProductosController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{producto}',                                  'ProductosController@update')->name('update');
            Route::delete('/{producto}',                                'ProductosController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('productos-forces')->name('productos-forces/')->group(static function() {
            Route::get('/',                                             'ProductosForceController@index')->name('index');
            Route::get('/create',                                       'ProductosForceController@create')->name('create');
            Route::post('/',                                            'ProductosForceController@store')->name('store');
            Route::get('/{productosForce}/edit',                        'ProductosForceController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'ProductosForceController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{productosForce}',                            'ProductosForceController@update')->name('update');
            Route::delete('/{productosForce}',                          'ProductosForceController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('estados-pedidos')->name('estados-pedidos/')->group(static function() {
            Route::get('/',                                             'EstadosPedidosController@index')->name('index');
            Route::get('/create',                                       'EstadosPedidosController@create')->name('create');
            Route::post('/',                                            'EstadosPedidosController@store')->name('store');
            Route::get('/{estadosPedido}/edit',                         'EstadosPedidosController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'EstadosPedidosController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{estadosPedido}',                             'EstadosPedidosController@update')->name('update');
            Route::delete('/{estadosPedido}',                           'EstadosPedidosController@destroy')->name('destroy');

        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('tipo-de-clientes')->name('tipo-de-clientes/')->group(static function() {
            Route::get('/',                                             'TipoDeClientesController@index')->name('index');
            Route::get('/create',                                       'TipoDeClientesController@create')->name('create');
            Route::post('/',                                            'TipoDeClientesController@store')->name('store');
            Route::get('/{tipoDeCliente}/edit',                         'TipoDeClientesController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'TipoDeClientesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{tipoDeCliente}',                             'TipoDeClientesController@update')->name('update');
            Route::delete('/{tipoDeCliente}',                           'TipoDeClientesController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('pedidos')->name('pedidos/')->group(static function() {
            Route::get('/',                                             'PedidosController@index')->name('index');
            Route::get('/create',                                       'PedidosController@create')->name('create');
            Route::post('/',                                            'PedidosController@store')->name('store');
            Route::get('/{pedido}/edit',                                'PedidosController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'PedidosController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{pedido}',                                    'PedidosController@update')->name('update');
            Route::delete('/{pedido}',                                  'PedidosController@destroy')->name('destroy');
            Route::get('/{pedido}/pedido', 'PedidosController@cabecera')->name('pedido');


        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('ventas')->name('ventas/')->group(static function() {
            Route::get('/',                                             'VentasController@index')->name('index');
            Route::get('/create',                                       'VentasController@create')->name('create');
            Route::post('/',                                            'VentasController@store')->name('store');
            Route::get('/{ventum}/edit',                                'VentasController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'VentasController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{ventum}',                                    'VentasController@update')->name('update');
            Route::delete('/{ventum}',                                  'VentasController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('detalle-pedidos')->name('detalle-pedidos/')->group(static function() {
            Route::get('/',                                             'DetallePedidoController@index')->name('index');
            Route::get('/create',                                       'DetallePedidoController@create')->name('create');
            Route::post('/',                                            'DetallePedidoController@store')->name('store');
            Route::get('/{detallePedido}/edit',                         'DetallePedidoController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'DetallePedidoController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{detallePedido}',                             'DetallePedidoController@update')->name('update');
            Route::delete('/{detallePedido}',                           'DetallePedidoController@destroy')->name('destroy');
                  });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('metodos-de-pagos')->name('metodos-de-pagos/')->group(static function() {
            Route::get('/',                                             'MetodosDePagosController@index')->name('index');
            Route::get('/create',                                       'MetodosDePagosController@create')->name('create');
            Route::post('/',                                            'MetodosDePagosController@store')->name('store');
            Route::get('/{metodosDePago}/edit',                         'MetodosDePagosController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'MetodosDePagosController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{metodosDePago}',                             'MetodosDePagosController@update')->name('update');
            Route::delete('/{metodosDePago}',                           'MetodosDePagosController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('estado-productos')->name('estado-productos/')->group(static function() {
            Route::get('/',                                             'EstadoProductoController@index')->name('index');
            Route::get('/create',                                       'EstadoProductoController@create')->name('create');
            Route::post('/',                                            'EstadoProductoController@store')->name('store');
            Route::get('/{estadoProducto}/edit',                        'EstadoProductoController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'EstadoProductoController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{estadoProducto}',                            'EstadoProductoController@update')->name('update');
            Route::delete('/{estadoProducto}',                          'EstadoProductoController@destroy')->name('destroy');
        });
    });
});


/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('detalle-pedidos')->name('detalle-pedidos/')->group(static function() {
            Route::get('/',                                             'DetallePedidoController@index')->name('index');
            Route::get('/create',                                       'DetallePedidoController@create')->name('create');
            Route::post('/',                                            'DetallePedidoController@store')->name('store');
            Route::get('/{detallePedido}/edit',                         'DetallePedidoController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'DetallePedidoController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{detallePedido}',                             'DetallePedidoController@update')->name('update');
            Route::delete('/{detallePedido}',                           'DetallePedidoController@destroy')->name('destroy');
        });
    });
});