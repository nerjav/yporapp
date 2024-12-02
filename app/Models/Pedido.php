<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $fillable = [
        'fecha_pedido',
        'estado_id',
        'tipo_cliente_id',
        'metodo_pago_id',
        'total',
        'observacion',
        'cliente_id',

    ];


    protected $dates = [
        'fecha_pedido',
        'created_at',
        'updated_at',

    ];

    protected $appends = ['resource_url'];
    protected $with = ['detalle', 'estadospedido','tipodecliente','metododepago','cliente'];

    public function detalle()
    {
        return $this->hasMany(DetallePedido::class);
    }


    public function estadospedido()
    {
        return $this->hasOne( 'App\Models\EstadosPedido','id','estado_id');
    }

    public function tipodecliente()
    {
        return $this->hasOne( 'App\Models\TipoDeCliente','id','tipo_cliente_id');
    }

    public function metododepago()
    {
        return $this->hasOne( 'App\Models\MetodosDePago','id','metodo_pago_id');
    }


    public function cliente()
    {
        return $this->hasOne( 'App\Models\Cliente','id','cliente_id');
    }
    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/pedidos/'.$this->getKey());
    }
}
