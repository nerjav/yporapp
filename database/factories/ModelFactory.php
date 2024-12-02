<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Brackets\AdminAuth\Models\AdminUser::class, function (Faker\Generator $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->email,
        'password' => bcrypt($faker->password),
        'remember_token' => null,
        'activated' => true,
        'forbidden' => $faker->boolean(),
        'language' => 'en',
        'deleted_at' => null,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        'last_login_at' => $faker->dateTime,
        
    ];
});/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Cliente::class, static function (Faker\Generator $faker) {
    return [
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Cliente::class, static function (Faker\Generator $faker) {
    return [
        'nombre' => $faker->sentence,
        'direccion' => $faker->sentence,
        'telefono' => $faker->sentence,
        'email' => $faker->email,
        'fecha_registro' => $faker->date(),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Inventario::class, static function (Faker\Generator $faker) {
    return [
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Inventario::class, static function (Faker\Generator $faker) {
    return [
        'vidones_disponibles' => $faker->randomNumber(5),
        'vidones_recargados' => $faker->randomNumber(5),
        'vidones_vendidos' => $faker->randomNumber(5),
        'vidones_devueltos' => $faker->randomNumber(5),
        'fecha' => $faker->date(),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Producto::class, static function (Faker\Generator $faker) {
    return [
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\ProductosForce::class, static function (Faker\Generator $faker) {
    return [
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Producto::class, static function (Faker\Generator $faker) {
    return [
        'nombre' => $faker->sentence,
        'descripcion' => $faker->text(),
        'precio' => $faker->randomNumber(5),
        'stock_inicial' => $faker->randomNumber(5),
        'stock_actual' => $faker->randomNumber(5),
        'unidad' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Cliente::class, static function (Faker\Generator $faker) {
    return [
        'nombre' => $faker->sentence,
        'ruc' => $faker->randomNumber(5),
        'direccion' => $faker->sentence,
        'telefono' => $faker->sentence,
        'email' => $faker->email,
        'fecha_registro' => $faker->date(),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\EstadosPedido::class, static function (Faker\Generator $faker) {
    return [
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\EstadosPedido::class, static function (Faker\Generator $faker) {
    return [
        'nombre' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\TipoDeCliente::class, static function (Faker\Generator $faker) {
    return [
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Pedido::class, static function (Faker\Generator $faker) {
    return [
        'id_pedido' => $faker->sentence,
        'cliente_id' => $faker->sentence,
        'fecha_pedido' => $faker->date(),
        'cantidad_vidones' => $faker->randomNumber(5),
        'estado_id' => $faker->sentence,
        'total' => $faker->randomNumber(5),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\TipoDeCliente::class, static function (Faker\Generator $faker) {
    return [
        'nombre' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Venta::class, static function (Faker\Generator $faker) {
    return [
        'cliente_id' => $faker->sentence,
        'total_vidones' => $faker->randomNumber(5),
        'monto_total' => $faker->randomNumber(5),
        'metodo_pago' => $faker->sentence,
        'monto_abonado' => $faker->randomNumber(5),
        'fecha_venta' => $faker->date(),
        'estado_venta' => $faker->sentence,
        'observaciones' => $faker->text(),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Pedido::class, static function (Faker\Generator $faker) {
    return [
        'cliente_id' => $faker->sentence,
        'producto_id' => $faker->sentence,
        'fecha_pedido' => $faker->date(),
        'estado_id' => $faker->sentence,
        'metodo_pago_id' => $faker->sentence,
        'cantidad' => $faker->randomNumber(5),
        'precio_unitario' => $faker->randomNumber(5),
        'total' => $faker->randomNumber(5),
        'observacion' => $faker->text(),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\DetallePedido::class, static function (Faker\Generator $faker) {
    return [
        'pedido_id' => $faker->sentence,
        'producto_id' => $faker->sentence,
        'cantidad' => $faker->randomNumber(5),
        'precio_unitario' => $faker->randomNumber(5),
        'precio_total' => $faker->randomNumber(5),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Pedido::class, static function (Faker\Generator $faker) {
    return [
        'cliente_id' => $faker->sentence,
        'fecha_pedido' => $faker->date(),
        'estado_id' => $faker->sentence,
        'metodo_pago_id' => $faker->sentence,
        'total' => $faker->randomNumber(5),
        'observacion' => $faker->text(),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Producto::class, static function (Faker\Generator $faker) {
    return [
        'nombre' => $faker->sentence,
        'descripcion' => $faker->text(),
        'precio_unitario' => $faker->randomNumber(5),
        'stock_actual' => $faker->randomNumber(5),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\DetallePedido::class, static function (Faker\Generator $faker) {
    return [
        'pedido_id' => $faker->sentence,
        'producto_id' => $faker->sentence,
        'cantidad' => $faker->randomNumber(5),
        'precio_gral' => $faker->randomNumber(5),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\MetodosDePago::class, static function (Faker\Generator $faker) {
    return [
        'nombre' => $faker->sentence,
        'descripcion' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\EstadoProducto::class, static function (Faker\Generator $faker) {
    return [
        'nombre' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Pedido::class, static function (Faker\Generator $faker) {
    return [
        'fecha_pedido' => $faker->date(),
        'estado_id' => $faker->sentence,
        'metodo_pago_id' => $faker->sentence,
        'total' => $faker->randomNumber(5),
        'observacion' => $faker->text(),
        'cliente_id' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Pedido::class, static function (Faker\Generator $faker) {
    return [
        'fecha_pedido' => $faker->date(),
        'estado_id' => $faker->sentence,
        'tipo_cliente_id' => $faker->sentence,
        'metodo_pago_id' => $faker->sentence,
        'total' => $faker->randomNumber(5),
        'observacion' => $faker->text(),
        'cliente_id' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
