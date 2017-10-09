<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Plazo;
use App\Http\Requests;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use Session;
use Redirect;
use DB;
use Hash;

class PlazoController extends Controller {

    public function __construct() {
//        $this->middleware('auth');
//        $this->middleware('admin');
//        $this->middleware('auth', ['only' => 'admin']);
    }

    function index() {
//        $empresa = Empresa::lists('nombre', 'id');

        $plazo = Plazo::paginate(8);
        return view('Plazo.index', compact('plazo', $plazo));
    }

    public function create() {
        $plazo = Plazo::lists('meses', 'id');
        return view('plazo.create', compact('empresa'));
    }

    public function store(Request $request) {

        $texto="";
    
        if ($this->validar_texto(0,$request->meses ) && $request->meses!="") {
           $texto.="No agregue letra en el campo meses";
        }
        if ($request->meses=="") {
           $texto.="El campo meses es obligatorio";
        }
        
        if ($texto!="") {
           Session::flash('message-error',$texto);
           return Redirect::to('plazo');
        }
        else{

           DB::table('plazo')->insert(['meses' => $request['meses']]);
        //        DB:table('cliente')->insert(['nick'=>$request->nick,'nick'=>$request->nick,'password'=>Hash::make($request->password)]);
           Session::flash('message', 'GUARDADO CORRECTAMENTE');
           return Redirect::to('/plazo');
        }

    }

    public function edit($id) {

        $Cliente = Cliente::find($id);

        return view('cliente.edit', ['cliente' => $Cliente]);
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

    public function update($id,Request $request) {

         $texto="";
    
        if ($this->validar_texto(0,$request->meses_act ) && $request->meses_act!="") {
           $texto.="No agregue letra en el meses";
        }
        if ($request->meses_act=="") {
           $texto.="El campo meses es obligatorio";
        }
        
        if ($texto!="") {
           Session::flash('message-error',$texto);
           return Redirect::to('plazo');
        }
        else{

            $plazo=DB::table('plazo')->where('id', $request->id_plazo)->update(['meses' => $request['meses_act']]);
        Session::flash('message', 'ACTUALIZADO CORRECTAMENTE');
        return Redirect::to('plazo');

        // $plazo = Plazo::find($request->id);
        // $plazo->fill([
        // 'meses' => $request->meses_act
        // ]);
        // $plazo->save();
        // Session::flash('message', 'ACTUALIZADO CORRECTAMENTE');
        // return Redirect::to('plazo');
        }
    }

    public function destroy($id) {

        $trabajador = User::find($id);
        $trabajador->delete();
        Session::flash('message', 'Usuario Eliminado Correctamente');
        return Redirect::to('/usuario');
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
