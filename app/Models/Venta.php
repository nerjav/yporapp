<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $fillable = [
        'cliente_id',
        'total_vidones',
        'monto_total',
        'metodo_pago',
        'monto_abonado',
        'fecha_venta',
        'estado_venta',
        'observaciones',
    
    ];
    
    
    protected $dates = [
        'fecha_venta',
        'created_at',
        'updated_at',
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/ventas/'.$this->getKey());
    }
}
