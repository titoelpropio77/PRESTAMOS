<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TasaInteres;
use App\Http\Requests;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use Session;
use Redirect;
use DB;
use Hash;

class TasaInteresController extends Controller {

    public function __construct() {
//        $this->middleware('auth');
//        $this->middleware('admin');
//        $this->middleware('auth', ['only' => 'admin']);
    }

    function index() {
//        $empresa = Empresa::lists('nombre', 'id');

        $tasaInteres = TasaInteres::paginate(8);
        return view('TasaInteres.index', compact('tasaInteres', $tasaInteres));
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

    public function create() {
        $empresa = Empresa::lists('nombre', 'id');
        return view('usuario.create', compact('empresa'));
    }

    public function store(Request $request) {
//        $verificar = DB::select('select count(*) count from cliente where cliente.email="' . $request->email.'"');
//        if ($verificar[0]->count == 0) {

        $texto="";
    
        if ($this->validar_texto(0,$request->porcentaje ) && $request->porcentaje!="") {
           $texto.="No agregue letra en el campo porcentaje";
        }
        if ($request->porcentaje=="") {
           $texto.="El campo porcentaje es obligatorio";
        }

        if ($texto!="") {
           Session::flash('message-error',$texto);
           return Redirect::to('tasaInteres');
        }
        else{

           DB::table('tasainteres')->insert(['porcentaje' => $request['porcentaje']]);
        //        DB:table('cliente')->insert(['nick'=>$request->nick,'nick'=>$request->nick,'password'=>Hash::make($request->password)]);
        Session::flash('message', 'GUARDADO CORRECTAMENTE');
        return Redirect::to('/tasaInteres');
        }

        


//                
//        }
//        else{
//            Session::flash('message-error', 'Ya existe un usuario con ese nick');
//            return Redirect::to('/');
//        }
    }

    public function edit($id) {

        $Cliente = Cliente::find($id);

        return view('cliente.edit', ['cliente' => $Cliente]);
    }

    public function update($id,Request $request) {

        $texto="";
    
        if ($this->validar_texto(0,$request->porcentaje_act ) && $request->porcentaje_act!="") {
           $texto.="No agregue letra en el campo porcentaje";
        }
        if ($request->porcentaje_act=="") {
           $texto.="El campo porcentaje es obligatorio";
        }

        if ($texto!="") {
           Session::flash('message-error',$texto);
           return Redirect::to('tasaInteres');
        }
        else{

        $tasainteres = TasaInteres::find($request->id_act);
        $tasainteres->fill([
        'porcentaje' => $request->porcentaje_act
        ]);
        $tasainteres->save();
        Session::flash('message', 'ACTUALIZADO CORRECTAMENTE');
        return Redirect::to('tasaInteres');
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

     public function cargarModalTasaInteres($id)
    {
       $tasainteres = TasaInteres::find($id);
       return response()->json($tasainteres);
    }

}
