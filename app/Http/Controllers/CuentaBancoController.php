<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banco;
use App\CuentaBanco;
use App\Http\Requests;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use Session;
use Redirect;
use DB;
use Hash;

class CuentaBancoController extends Controller {

    public function __construct() {
//        $this->middleware('auth');
//        $this->middleware('admin');
//        $this->middleware('auth', ['only' => 'admin']);
    }

    function index($id) {

      $cuentabanco=DB::select('select cuentabanco.id as idCuenta, banco.nombre, banco.id as idBanco, cuentabanco.nroCuenta from CuentaBanco, banco where banco.id=cuentabanco.idBanco and cuentabanco.deleted_at IS NULL and cuentabanco.idBanco='.$id);
      $banco=DB::select('select * from  banco where id='.$id);

     return view('cuentabanco.index',compact('cuentabanco','banco'));
    }

    public function create() {
        $banco=DB::select("SELECT *from banco");
       return view('cuentabanco.create',compact('banco',$banco));
    }

    public function store(Request $request) {

        try {

      DB::beginTransaction();    
        $cuentabanco=CuentaBanco::create([
          'nroCuenta' => $request['nrocuenta'],
          'idBanco' => $request['idBanco']
        ]);
              
        DB::commit();                                               
        return redirect('CuentaBanco/'.$request['idBanco'])->with('message','GUARDADO CORRECTAMENTE');  
    }catch (Exception $e) {
        DB::rollback();
        return redirect('CuentaBanco/'.$request['idBanco'])->with("message-error","ERROR INTENTE NUEVAMENTE");     
    }

    }

    public function edit($id) {

        $cuentabanco = Banco::find($id);
        $banco=DB::select("SELECT *from banco");

        return view('cuentabanco.edit', ['cuentabanco' => $cuentabanco], ['banco' => $banco]);
    }

    public function show($id) {

      $cuentabanco=DB::select('select cuentabanco.id as idCuenta, banco.nombre, banco.id as idBanco, cuentabanco.nroCuenta from CuentaBanco, banco where banco.id=cuentabanco.idBanco and cuentabanco.deleted_at IS NULL and cuentabanco.idBanco='.$id);
      $banco=DB::select('select * from  banco where id='.$id);

     return view('cuentabanco.index',compact('cuentabanco','banco'));
    }

    public function validar_texto($opcion,$variable){

        switch ($opcion) {
             case 0:
                if (!is_numeric($variable)) {
                    return true;
                }
                break;
            case 1:
            $expresion = '/^[A-Z üÜáéíóúÁÉÍÓÚñÑ]{1,50}$/i';
                if (!preg_match($expresion, $variable)) {
                    return true;
                }
                break;

            
            default:
                return false;
                break;
        }

    }

    public function update(Request $request) {

        $id=$request->get("idCuenta");
        $cuentabanco= CuentaBanco::find($id);
        $cuentabanco->fill([
            'nroCuenta'=>$request->nroCuenta,
            'idBanco'=>$request->idBanco
        ]);
        $cuentabanco->save();
        return redirect('CuentaBanco/'.$request['idBanco'])->with('message','MODIFICADO CORRECTAMENTE'); 
    }

    public function destroy(Request $request) {

        try {
          $id=$request->get("idCuentaBanco");
          $cuentabanco = CuentaBanco::find($id);
          $cuentabanco->delete();
          return redirect('CuentaBanco/'.$request['idBanco'])->with("message","ELIMINADO CORRECTAMENTE");

        }catch (Exception $e) {
            return redirect('CuentaBanco/'.$request['idBanco'])->with("message-error","NO SE PUDO ELIMINAR EL REGISTRO");      
        } 
    }
    public function buscarCliente($ci){
        $cliente=DB::select("select * from cliente where ci=".$ci);
        if (count($cliente)!=0) {
            return response()->json($cliente);
        }
      return response()->json(['mensaje'=>'1']);
    }

    public function cargarModalPlazo($id)
    {
       $plazo = plazo::find($id);
       return response()->json($plazo);
    }
}
