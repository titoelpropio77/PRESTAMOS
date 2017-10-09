<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\TurnoRequest;
use DB;
use App\Turno;
use Session;
use Redirect;
class TurnoController extends Controller
{ 
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
       $verficar=DB::select("select modulo.nombre,perfilobjeto.puedeGuardar,perfilobjeto.puedeModificar,perfilobjeto.puedeEliminar,perfilobjeto.puedeListar, perfilobjeto.puedeVerReporte,perfilobjeto.puedeImprimir,objeto.urlObjeto from perfil,perfilobjeto,objeto,modulo where perfilobjeto.deleted_at IS NULL and perfil.id=perfilobjeto.idPerfil and perfilobjeto.idObjeto=objeto.id and modulo.id=objeto.idModulo and objeto.urlObjeto='/Turno'  and perfil.id=".Session::get('idPerfil'));
   
  
       
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
function index(){
     $Turno=Turno::paginate(10);
     return view('turno.index',compact('Turno'));
	}
  
	public function create(){
        if ($this->puedeGuardar==1) {
    return view('turno.create');		
  }
    else{
       return redirect('/Turno')->with('message-error','No tiene privilegios para guardar');  
    }
  }

  public function store(Request $request){
        Turno::create([
          'nombre' => $request['nombre']]);
        return redirect('/Turno')->with('message','Guardado Correctamente');  
  }

  public function update(Request $request,$id){
    $Turno= Turno::find($id);
    $Turno->fill($request->all());
    $Turno->save();
    return redirect('/Turno')->with('message','Modificado Correctamente');  
  }

  public function edit($id){
      if ($this->puedeModificar==1) {
    
  
      $Turno=Turno::find($id);
      return view('turno.edit',['Turno'=>$Turno]);
}
       else{
       return redirect('/Turno')->with('message-error','No tiene privilegios para Modificar');  
    }
  }
  public function listacategoria1(Request $request ){
      if ($request->ajax()){
      $categoria=DB::select('select *from categoria');
      return response()->json($categoria);
      
      
      }
  }

  public function destroy($id){
      $Turno=Turno::find($id);
      echo $id;
      $Turno->delete();
      Session::flash('message','Eliminado Correctamente');
     return Redirect::to('/Turno');
  }
}
