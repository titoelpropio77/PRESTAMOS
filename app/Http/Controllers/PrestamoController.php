<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use Session;

class PrestamoController extends Controller
{
    function index(){
            $prestamo=DB::select("SELECT p.*,concat(c.nombre,' ',c.apellidos) as 'cliente',concat(e.nombre,' ',e.apellidos) as 'empleado' FROM prestamos p, cliente c, empleado e where p.idEmpleado =e.id and p.idCliente=c.id");

    	return view("prestamo.index",['prestamo'=>$prestamo]);
    }
}
