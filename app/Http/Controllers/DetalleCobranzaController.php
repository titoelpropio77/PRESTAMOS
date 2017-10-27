<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\DetalleCuota;
use App\Http\Requests;

use Session;
use Redirect;
use DB;
use Hash;

class DetalleCobranzaController extends Controller {

    public function __construct() {
//        $this->middleware('auth');
//        $this->middleware('admin');
//        $this->middleware('auth', ['only' => 'admin']);
    }

    function index() {
//        $empresa = Empresa::lists('nombre', 'id');

        $cliente = Cliente::orderBy('id', 'desc')->paginate(8);
        return view('cliente.index', compact('cliente', $cliente));
    }

    public function create() {
        $empresa = Empresa::lists('nombre', 'id');
        return view('usuario.create', compact('empresa'));
    }

    // public function validar_texto($opcion,$variable){

    //     switch ($opcion) {
    //          case 0:
    //             if (!is_numeric($variable)) {
    //                 return true;
    //             }
    //             break;
    //         case 1:
    //         $expresion = '/^[A-Z üÜáéíóúÁÉÍÓÚñÑ]{1,50}$/i';
    //             if (!preg_match($expresion, $variable)) {
    //                 return true;
    //             }
    //             break;

            
    //         default:
    //             return false;
    //             break;
    //     }
    // }

    public function store(Request $request){
        $monto=$request['importe'];
        $idPlanPago=$request['idPlandePago'];
        $tipoPago=$request['tipoPago'];
    $consulta=DB::select("select cuota.id,cuota.estado,cuota.importe from cuota,plandepago where cuota.idPlanPago=plandepago.id and plandepago.id=".$idPlanPago." LIMIT 1");
        DetalleCuota::create([
            'monto'=>$monto,
            'tipoPago'=>$tipoPago,
            'idCuota'=>$monto,
        ]);
    }
    public function edit($id) {

        $Cliente = Cliente::find($id);

        return view('cliente.edit', ['cliente' => $Cliente]);
    }

    public function update($id,Request $request) {

        
    }

    public function destroy($id) {

        $trabajador = User::find($id);
        $trabajador->delete();
        Session::flash('message', 'Usuario Eliminado Correctamente');
        return Redirect::to('/usuario');
    }

 

}
