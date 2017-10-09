<?php

namespace App;
    
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Empresa extends Authenticatable 
                                    
{
    use  SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
      protected $table = 'empresa';
    protected $fillable = [
        'nombre','direccion','correo','nit','telefono'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
  
    
}
