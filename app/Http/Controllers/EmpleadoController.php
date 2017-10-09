<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;
use App\Http\Requests\EmpleadoCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use Session;
use Redirect;
use App\Empleado;
use App\Perfil;
use App\Cargo;
use App\Turno;
use App\Pais;

use DB;
use Hash;

class EmpleadoController extends Controller {

    public function __construct(Request $request) {
     if (Session::get('user')==null || Session::get('idPerfil')=="" ) {
    Session::put('user', null); 
      $this->middleware('auth');

         $this->middleware('admin');
        $this->middleware('auth',['only'=>'admin']);
    }else{
       $verficar=DB::select("select modulo.nombre,perfilobjeto.puedeGuardar,perfilobjeto.puedeModificar,perfilobjeto.puedeEliminar,perfilobjeto.puedeListar, perfilobjeto.puedeVerReporte,perfilobjeto.puedeImprimir,objeto.urlObjeto from perfil,perfilobjeto,objeto,modulo where perfilobjeto.deleted_at IS NULL and perfil.id=perfilobjeto.idPerfil and perfilobjeto.idObjeto=objeto.id and modulo.id=objeto.idModulo and objeto.urlObjeto='/Empleado'  and perfil.id=".Session::get('idPerfil').' ');
   
  
       
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

        $empleado =DB::table('empleado')

        ->join('cargo','empleado.idCargo','=','cargo.id')
        ->join('turno','empleado.idTurno','=','turno.id')

        ->select('empleado.id','empleado.codigo','empleado.nombre','empleado.apellido','empleado.id as idEmp','empleado.direccion','empleado.ci','empleado.celular','empleado.genero','empleado.estado','cargo.nombre as nombreCargo','turno.nombre as nombreTurno')
        ->where('empleado.deleted_at')
        ->orderby('empleado.id','desc')
        ->paginate(20);
      // $empleado=DB::select('select empleado.id, empleado.nombre,empleado.apellido,empleado.ci,empleado.direccion,empleado.celular, empleado.estado,empleado.genero,cargo.nombre as nombreCargo, turno.nombre as nombreTurno from empleado,cargo,turno where empleado.idCargo=cargo.id and empleado.idTurno=turno.id');
        return view('empleado.index',compact('empleado'));
    }

  
    public function store(EmpleadoCreateRequest $request) {
       $verificar = DB::select('select count(*) count from empleado where ci="' . $request->ci.'"');
       if ($verificar[0]->count == 0) {
         
                 $empledo=Empleado::create([
                            'nombre'=>$request->nombre,
                            'apellido'=>$request->apellido,
                            'ci'=>$request->ci,
                            'direccion'=>$request->direccion,
                            'celular'=>$request->celular,
                           
                            'genero'=>$request->genero,
                            'codigo'=>$request->codigo,
                            'expedido'=>$request->expedido,
                             'idPais'=>$request->idPais,

                            'estado'=>'h',
                             'idCargo'=>$request->idCargo,

                            'idTurno'=>$request->idTurno,

                        ]);

              Session::flash('message', 'Creado Correctamente');
            return Redirect::to('/Empleado');
            
       
               
       }
       else{
           Session::flash('message-error', 'Ya existe un usuario con ese ci');
           return Redirect::to('/Empleado');
       }
    }

  public function create() {
     if ($this->puedeGuardar==1) {
    $cargo=Cargo::lists('nombre','id');
    $turno=Turno::lists('nombre','id');
        $pais=Pais::orderby('paisnombre')->lists('paisnombre','id');

        return view('empleado.create',compact('perfil','cargo','turno','pais'));
        }
    else{
       return redirect('/Empleado')->with('message-error','No tiene privilegios para guardar');  
    }
    }

    public function edit($id) {
if ($this->puedeModificar==1) {
        $empleado = Empleado::find($id);
         $cargo=Cargo::lists('nombre','id');
    $turno=Turno::lists('nombre','id');
        $pais=Pais::orderby('paisnombre')->lists('paisnombre','id');
       
  

        return view('empleado.edit', ['empleado' => $empleado,'cargo'=>$cargo,'turno'=>$turno,'pais'=>$pais]);
      }
      else{
       return redirect('/Empleado')->with('message-error','No tiene privilegios para Modificar');  
    }
    }

    public function update(Request $request,$id) {
        $user = Empleado::find($id);
        $user->fill([
            'nombre'=>$request->nombre,
            'apellido'=>$request->apellido,
            'ci'=>$request->ci,
            'direccion'=>$request->direccion,
            'celular'=>$request->celular,
            'genero'=>$request->genero,
            'codigo'=>$request->codigo,
            'idPais'=>$request->idPais,

            'idTurno'=>$request->idTurno,
            'idCargo'=>$request->idCargo,

        ]);
        $user->save();
        Session::flash('message', 'Empleado Actualizado Correctamente');
        return Redirect::to('/Empleado');
    }

    public function destroy($id,Request $request) {

        $trabajador = Empleado::find($request->idEmpleado);
        $trabajador->delete();
        Session::flash('message', 'Usuario Eliminado Correctamente');
        return Redirect::to('/Empleado');
    }
    public function cargar_usuario($id){
           $usuario = User::find($id);
           return response()->json($usuario);
    }
    public function BuscarEmpleado(Request $request){
  // $empleado =DB::table('empleado')

  //       ->join('cargo','empleado.idCargo','=','cargo.id')
  //       ->join('turno','empleado.idTurno','=','turno.id')

  //       ->select('empleado.id','empleado.codigo','empleado.nombre','empleado.apellido','empleado.id as idEmp','empleado.direccion','empleado.ci','empleado.celular','empleado.genero','empleado.estado','cargo.nombre as nombreCargo','turno.nombre as nombreTurno')
  //       ->where('empleado.ci',$request->ci);
       $empleado =DB::table('empleado')

        ->join('cargo','empleado.idCargo','=','cargo.id')
        ->join('turno','empleado.idTurno','=','turno.id')

        ->select('empleado.id','empleado.codigo','empleado.nombre','empleado.apellido','empleado.id as idEmp','empleado.direccion','empleado.ci','empleado.celular','empleado.genero','empleado.estado','cargo.nombre as nombreCargo','turno.nombre as nombreTurno')
        ->where('empleado.ci',$request->ci)
        ->orderby('empleado.id','desc')
        ->paginate(20);
         return view('empleado.index', compact('empleado'));
    }
}
