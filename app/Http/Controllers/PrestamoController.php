<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Pais;
use App\Cliente;
use App\DetallePrestamos;
use App\Prestamos;
use DB;
use Session;

class PrestamoController extends Controller
{
    function index(){
        $prestamo=DB::select("SELECT p.*,concat(c.nombre,' ',c.apellidos) as 'cliente',concat(e.nombre,' ',e.apellidos) as 'empleado' FROM prestamos p, cliente c, empleado e where p.idEmpleado =e.id and p.idCliente=c.id");

    	return view("prestamo.index",['prestamo'=>$prestamo]);
    }

    public function create(){
    	$pais=DB::select("SELECT *FROM pais");
        return view('prestamo.create',compact('pais')); 
    }

	public function store(Request $request){
		try {
		  //DB::beginTransaction();    

		  if ($request['cliente'] == 0) { //SIGNIFICA QUE ES NUEVO EL CLIENTE
		  	$idCliente=Cliente::create([
		      'nombre' => $request['nombre'],
		      'apellidos' => $request['apellidos'],
		      'fechaNacimiento' => $request['fechaNacimiento'],
		      'ci' => $request['ci'],
		      'expedido' => $request['expedido'],
		      'lugarProcedencia' => $request['lugarProcedencia'],
		      'genero' => $request['genero'],
		      'celular' => $request['celular'],
		      'celular_ref' => $request['celular_ref'],
		      'estadoCivil' => $request['estadoCivil'],
		      'ocupacion' => $request['ocupacion'],
		      'domicilio' => $request['domicilio'],
		      'nit' => $request['nit'],
		      'idPais' => $request['idPais'],
		    ]);
		  }
		    $idDetallePrestamo=DetallePrestamos::create([
		      'tipoGarantia' => $request['tipoGarantia'],
		      'tipoPago' => $request['tipoPago']
		    ]);


		    //$tipoMoneda=DB::select("SELECT *FROM tipomeda LIMIT 1");  //AREGLAR EL TIPOMONEDA ESTA MAL ESCRITO

		    $idPrestamo=Prestamos::create([
		      'capitalPrestado' => $request['capital_prestado'],
		      'fecha' => $request['fecha'],
		      
		      'interes' => $request['interes_mensual'],
		      'ganancia' => $request['ganancia'],
		      'idDetallePrestamo' => $idDetallePrestamo['id'],
		      'idMoneda' => 1,
		      'idEmpleado' => 1,
		      'idCliente' => $idCliente['id']
		    ]);

		  //  DB::commit(); 
		    return redirect('GestionarPrestamo')->with('message','GUARDADO CORRECTAMENTE');  
		}catch (Exception $e) {
		    DB::rollback();
		    return redirect('GestionarPrestamo/create')->with("message-error","ERROR INTENTE NUEVAMENTE");      
		}         
	}
}
