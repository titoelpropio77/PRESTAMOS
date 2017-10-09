<?php

namespace App;
    
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Cargo extends Authenticatable 
                                    
{
    use  SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
      protected $table = 'cargo';
    protected $fillable = [
        'nombre'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
  
    
}
