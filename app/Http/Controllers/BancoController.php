<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banco;
use App\Http\Requests;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use Session;
use Redirect;
use DB;
use Hash;

class BancoController extends Controller {

 
  var $puedeGuardar=0;
var   $puedeModificar=0;
  var  $puedeEliminar=0;
   var $puedeImprimir=0;
  var $puedeListar=0;
  var $puedeVerReporte=0;

   public function __construct(Request $request) {
    if (Session::get('user')==null || Session::get('idPerfil')=="" ) {
    Session::put('user', null); 
      $this->middleware('auth');

         $this->middleware('admin');
        $this->middleware('auth',['only'=>'admin']);
    }else{
       $verficar=DB::select("select modulo.nombre,perfilobjeto.puedeGuardar,perfilobjeto.puedeModificar,perfilobjeto.puedeEliminar,perfilobjeto.puedeListar, perfilobjeto.puedeVerReporte,perfilobjeto.puedeImprimir,objeto.urlObjeto from perfil,perfilobjeto,objeto,modulo where perfilobjeto.deleted_at IS NULL and perfil.id=perfilobjeto.idPerfil and perfilobjeto.idObjeto=objeto.id and modulo.id=objeto.idModulo and objeto.urlObjeto='/Banco'  and perfil.id=".Session::get('idPerfil'));
   
  
       
         if (count($verficar)==0) {
  Session::flash('message-error', 'No tiene privilegio');
      Session::put('user', null);
      $this->middleware('auth');

         $this->middleware('admin');
        $this->middleware('auth',['only'=>'admin']); 
         }else{
                $this->puedeGuardar=$verficar[0]->puedeGuardar;
  $this->puedeModificar=$verficar[0]->puedeModificar;
  $this->puedeEliminar=$verficar[0]->puedeEliminar;
  $this->puedeImprimir=$verficar[0]->puedeImprimir;
  $this->puedeListar=$verficar[0]->puedeListar;
 $this->puedeVerReporte=$verficar[0]->puedeVerReporte;
         }
       
       
}
    }

    function index() {
//        $empresa = Empresa::lists('nombre', 'id');

        $banco = Banco::paginate(8);
        return view('banco.index', compact('banco', $banco));
    }

    public function create() {
        if ($this->puedeGuardar==1) {
        return view('banco.create');
        } else{
       return redirect('/index')->with('message-error','No tiene privilegios para guardar');  
    }
    }

    public function store(Request $request) {
          
        Banco::create([
          'nombre'=>$request['nombre']
        ]);
        return redirect('Banco')->with('message','GUARDADO CORRECTAMENTE');

    }

    public function edit($id) {
if ($this->puedeModificar==1) {
        $banco = Banco::find($id);

        return view('banco.edit', ['banco' => $banco]);
    }else{
       return redirect('/index')->with('message-error','No tiene privilegios para modificar');  
    }
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

    public function update(Request $request,$id) {


        $banco= Banco::find($id);
        $banco->fill($request->all());
        $banco->save();
        return redirect('/Banco')->with('message','MODIFICADO CORRECTAMENTE'); 
        // $plazo = Plazo::find($request->id);
        // $plazo->fill([
        // 'meses' => $request->meses_act
        // ]);
        // $plazo->save();
        // Session::flash('message', 'ACTUALIZADO CORRECTAMENTE');
        // return Redirect::to('plazo');
        
    }

    public function destroy(Request $request) {
 if ($this->puedeEliminar==1) {
        try {
          $id=$request->get("idBanco");
          $banco = Banco::find($id);
          $banco->delete();
          return redirect('/Banco')->with("message","ELIMINADO CORRECTAMENTE");

        }catch (Exception $e) {
            return redirect('/Banco')->with("message-error","NO SE PUDO ELIMINAR EL REGISTRO");      
            } 
        }
else{
       return redirect('/index')->with('message-error','No tiene privilegios para Eliminar');  

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
