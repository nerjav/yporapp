<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MetodosDePago extends Model
{
    protected $fillable = [
        'nombre',
        'descripcion',
    
    ];
    
    
    protected $dates = [
        'created_at',
        'updated_at',
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/metodos-de-pagos/'.$this->getKey());
    }
}
