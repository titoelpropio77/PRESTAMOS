<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Pais;
use App\Cliente;
use App\DetallePrestamos;
use App\Prestamos;
use App\Cuotas;
use App\PlanDePago;
use DB;
use Session;

class PrestamoController extends Controller
{
    function index(){
        $prestamo=DB::select("SELECT p.*,concat(c.nombre,' ',c.apellidos) as 'cliente', ci , celular ,concat(e.nombre,' ',e.apellidos) as 'empleado' FROM prestamos p, cliente c, empleado e where p.idEmpleado =e.id and p.idCliente=c.id");

    	return view("prestamo.index",['prestamo'=>$prestamo]);
    }

    public function create(){
    	$pais=DB::select("SELECT *FROM pais");
        return view('prestamo.create',compact('pais')); 
    }

	public function store(Request $request){
		try {
		  //DB::beginTransaction();    
$cliente=0;
		  if ($request['cliente'] == 0) { //SIGNIFICA QUE ES NUEVO EL CLIENTE

		  	$fechaNac=date("Y-m-d",strtotime($request['fechaNac'])); 
//echo $fechaNac; 

		  	$idCliente=Cliente::create([
		      'nombre' => $request['nombre'],
		      'apellidos' => $request['apellidos'],
		      'fechaNacimiento' => $fechaNac,
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
		    $cliente= $idCliente['id'];
		  }else{
		  	$cliente=$request['cliente'];
		  }

		    $idDetallePrestamo=DetallePrestamos::create([
		      'tipoGarantia' => $request['tipoGarantia'],
		      'tipoPago' => $request['tipoPago']
		    ]);


		    //$tipoMoneda=DB::select("SELECT *FROM tipomeda LIMIT 1");  //AREGLAR EL TIPOMONEDA ESTA MAL ESCRITO
		    $fechapres=date("Y-m-d",strtotime($request['fechainicio'])); 
//echo $fechapres;	
		    $idPrestamo=Prestamos::create([
		      'capitalPrestado' => $request['capital_prestado'],

		      'fecha' => $fechapres,
		      'interes' => $request['interes_mensual'],
		      'ganancia' => $request['ganancia'],
		      'idDetallePrestamo' => $idDetallePrestamo['id'],
		      'idMoneda' => 1,
		      'idEmpleado' => 1,
		      'idCliente' => $cliente
		    ]);


		    $fecha_limite=$request["fecha_limite"]; 
		    for ($i=0; $i <count($fecha_limite) ; $i++) { 
		    				// echo $fecha_limite[$i];
		    			}			
			// 'nroCuotas','fechaVencimiento','fechaMensual','totalPagar','idPrestamo','estado'  
		   	$cantidad=count($request["fecha_limite"])-1;
		   	// echo  $calculhmac(clent, data)ntidad;
		    $idPlanPago=PlanDePago::create([
		    'nroCuota'=>$request["periodo"],
		    'fechaVencimiento'=> $fecha_limite[$cantidad],
		    'totaPagar'=>$request["total_pago"],		   
		    'idPrestamo'=>$idPrestamo['id']
		    ]);
		    

		 
		    $periodo=$request["periodo_c"];
		    $saldo_inicial=$request["saldo_inicial"];
		    $interes_c=$request["interes_c"];
		    $pago=$request["pago"];
		    $saldo_capital=$request["saldo_capital"];

		  	
		  	if ($request["tipoPago"]=="i") {
		  		$tipo_pago=$interes_c;

		  	}else{
		  		$tipo_pago=$pago;
		  	}
 			
 			 for ($i=0; $i <count($periodo) ; $i++) {
		  
		    	Cuotas::create([

		    		'importe'=>$tipo_pago[$i],
		    		'idPlanPago'=>$idPlanPago['id'],
		    		'fechaLimite'=>date("Y-m-d",strtotime($fecha_limite[$i])),

		    		]);
		    }

		   DB::commit(); 
		    return redirect('Gestionarprestamo/create')->with('message','GUARDADO CORRECTAMENTE');  
		}catch (Exception $e) {
		    DB::rollback();
		    return redirect('GestionarPrestamo/create')->with("message-error","ERROR INTENTE NUEVAMENTE");      
		}         
	}

	public function listarPrestamos(){
        $listar=DB::select('
        		select id, capitalPrestado, estado, interes, ganancia, from prestamos
        	');
        return response()->json($listar);
    }

}
