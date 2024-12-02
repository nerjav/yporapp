<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductosForce extends Model
{
    protected $table = 'productos-force';

    protected $fillable = [
    
    ];
    
    
    protected $dates = [
    
    ];
    public $timestamps = false;
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/productos-forces/'.$this->getKey());
    }
}
