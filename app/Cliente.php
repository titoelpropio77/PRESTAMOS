<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class Cliente extends Authenticatable implements AuthenticatableContract,
                                    AuthorizableContract
                                    
{
    use  Authorizable, SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $table = 'cliente';
    protected $fillable = [
        'nombre', 'apellidos', 'fechaNacimiento','ci','expedido','idPais'
        ,'lugarProcedencia','genero','celular','celular_ref','estadoCivil','domicilio','nit','idEmpleado','ocupacion'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
 
    
}
