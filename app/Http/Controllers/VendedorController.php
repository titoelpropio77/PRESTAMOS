<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empleado;
use App\User;
use App\Vendedor;
use App\Pais;
use App\Http\Requests;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use Session;
use Redirect;
use DB;
use Hash;

class VendedorController extends Controller {

  
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
       $verficar=DB::select("select modulo.nombre,perfilobjeto.puedeGuardar,perfilobjeto.puedeModificar,perfilobjeto.puedeEliminar,perfilobjeto.puedeListar, perfilobjeto.puedeVerReporte,perfilobjeto.puedeImprimir,objeto.urlObjeto from perfil,perfilobjeto,objeto,modulo where perfilobjeto.deleted_at IS NULL and perfil.id=perfilobjeto.idPerfil and perfilobjeto.idObjeto=objeto.id and modulo.id=objeto.idModulo and objeto.urlObjeto='/Vendedor'  and perfil.id=".Session::get('idPerfil'));
   
  
       
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
        $vendedor = Vendedor::orderby('id_vendedor','desc')->paginate(20);
        /*$vendedor=DB::table('empleado')
        ->join('empleado','empleado.id','=','vendedor.idEmpleadoHijo')
        ->select('*')
        ->paginate(30);  */      
        return view('vendedor.index',['vendedor'=>$vendedor]);
    }

    public function create() {
          if ($this->puedeGuardar==1) {
 
        $padre = DB::select("SELECT *from empleado");
        $hijo = DB::select("SELECT *from empleado");
        return view('vendedor.create', compact('padre','hijo'));
    }
    else{
       return redirect('/Vendedor')->with('message-error','No tiene privilegios para guardar');  
        
    }
    }

    public function store(Request $request) {
        Vendedor::create([
            'idEmpleadoPadre' => $request['padre'],          
            'idEmpleadoHijo' => $request['hijo'],                 
        ]);
        Session::flash('message', 'CREADO CORRECTAMENTE');
        return Redirect::to('/Vendedor');
    }

    public function edit($id) {

        $trabajador = User::find($id);
        $empresa = Empresa::where('id', $trabajador->id_empresa)->lists('nombre', 'id');

        return view('usuario.edit', ['user' => $trabajador], compact('empresa'));
    }

    public function update($id, UserUpdateRequest $request) {
        $user = User::find($id);
        $user->fill([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'id_empresa'=>$request->id_empresa
        ]);
        $user->save();
        Session::flash('message', 'Usuario Actualizado Correctamente');
        return Redirect::to('/usuario');
    }

    public function destroy($id) {

        $trabajador = User::find($id);
        $trabajador->delete();
        Session::flash('message', 'Usuario Eliminado Correctamente');
        return Redirect::to('/usuario');
    }

  public function ListaEmpleado(){
    $jefe=DB::select("SELECT empleado.*,cargo.nombre as cargo,v.idEmpleadoPadre FROM vendedor v,empleado,cargo WHERE empleado.id=v.idEmpleadoPadre AND cargo.id=empleado.idCargo AND (NOT EXISTS(SELECT *FROM vendedor v2 WHERE v2.idEmpleadoHijo=v.idEmpleadoPadre)) GROUP BY v.idEmpleadoPadre");
   // $empleado=DB::select("SELECT empleado.*,cargo.nombre as cargo,vendedor.idEmpleadoPadre,vendedor.idEmpleadoHijo from vendedor,empleado,cargo where cargo.id=empleado.idCargo AND empleado.id=vendedor.idEmpleadoHijo AND vendedor.deleted_at is null order by vendedor.idEmpleadoPadre");
    $empleado=DB::select("SELECT empleado.*,cargo.nombre as cargo,vendedor.idEmpleadoPadre,vendedor.idEmpleadoHijo from empleado,vendedor,cargo WHERE empleado.deleted_at IS NULL and cargo.id=empleado.idCargo AND empleado.id=vendedor.idEmpleadoHijo AND vendedor.idEmpleadoPadre=".Session::get("idEmpleado"));
    return view('empleado.lista_empleado',compact('empleado','jefe'));      
  }

  public function RegistroEmpleado(){
    $tipo=DB::select("SELECT *FROM empleado WHERE empleado.id=".Session::get('idEmpleado'));
     $pais=Pais::orderby('paisnombre')->lists('paisnombre','id');

    return view('empleado.registrar_empleado',compact('tipo','nacionalidad','pais'));      
  }
  public function RegistrarEmpleadoGestor(Request $request){
    $verificar = DB::select('SELECT count(*) count from empleado where ci="'.$request->ci.'"');
    if ($verificar[0]->count == 0) {

      switch ($request['idCargo']) {
        case 7:
          $idPerfil=10;    //EL CARGO DE VENDEDOR ES 7 EN LA TABLA EMPLEADO CUANDO SELECCIONA VENDEDOR
          break;        
        case 3:
          $idPerfil=9;   //EL CARGO DE  GESTOR VENTA ES 3 EN LA TABLA EMPLEADO CUANDO SELECCIONA GESTOR DE VENTAS
          break;  
        case 6: 
          $idPerfil=11;   //EL CARGO DE ASESOR DE VENTAS ES 11 EN LA TABLA EMPLEADO CUANDO SELECCIONA GESTOR DE VENTAS
          break;            
      }

      $empledo=Empleado::create([
      'nombre'=>$request->nombre,
      'apellido'=>$request->apellido,
      'ci'=>$request->ci,
      'expedido'=>$request->expedido,
      'direccion'=>$request->direccion,
      'celular'=>$request->celular,
      'genero'=>$request->genero,
      'codigo'=>$request->codigo,
      'idPais'=>$request->idPais,

      'estado'=>'h',
      'idCargo'=>$request['idCargo'],
      'idTurno'=>1, //ESTO LO PUSE NO ERA NECESARIO
      ]);

      $name = strtolower($request['ci']);
      DB::table('users')->insert(['idEmpleado'=>$empledo['id'],'email'=>$name, 'password'=>Hash::make($request['codigo']),'idPerfil'=>$idPerfil ]);

        Vendedor::create([
            'idEmpleadoPadre' => $request['idPadre'],          
            'idEmpleadoHijo' => $empledo['id'],                 
        ]);

      Session::flash('message', 'CREADO CORRECTAMENTE');
      return Redirect::to('/ListaEmpleado');
    }
    else{
      Session::flash('message-error', 'YA EXISTE UN USUARIO CON ESE CARNET');
      return Redirect::to('/RegistroEmpleado');
    }    
  }

  public function show($id){
    $vendedor=DB::select('SELECT *from empleado,users WHERE users.idEmpleado=empleado.id AND empleado.id='.$id);
     $pais=Pais::orderby('paisnombre')->lists('paisnombre','id');
    return view('empleado.actualizar_empleado',['pais'=>$pais],compact('vendedor'));    
  }

  public function ActualizarEmpleadoGestor(Request $request){
      switch ($request['idCargo']) {
        case 7:
          $idPerfil=10;    //EL CARGO DE VENDEDOR ES 7 EN LA TABLA EMPLEADO CUANDO SELECCIONA VENDEDOR
          break;        
        case 3:
          $idPerfil=9;   //EL CARGO DE  GESTOR VENTA ES 3 EN LA TABLA EMPLEADO CUANDO SELECCIONA GESTOR DE VENTAS
          break;  
        case 6: 
          $idPerfil=11;   //EL CARGO DE ASESOR DE VENTAS ES 11 EN LA TABLA EMPLEADO CUANDO SELECCIONA GESTOR DE VENTAS
          break;            
      }

    if ($request['ci'] == $request['ci_aux']) {
        $empledo = Empleado::find($request['id_empleado']);
        $empledo->fill([
          'nombre'=>$request->nombre,
          'apellido'=>$request->apellido,
          'ci'=>$request->ci,
          'expedido'=>$request->expedido,
          'direccion'=>$request->direccion,
          'celular'=>$request->celular,
          'genero'=>$request->genero,
          'codigo'=>$request->codigo,
          'estado'=>'h',
          'idCargo'=>$request['idCargo'],
          'idTurno'=>1, //ESTO LO PUSE NO ERA NECESARIO
        ]);
        $empledo->save();

        /*$name = strtolower($request['ci']);
        DB::table('users')->where('idEmpleado',$request['id_empleado'])->update(['email'=>$name, 'password'=>Hash::make($request['codigo']),'idPerfil'=>$idPerfil ]);*/

        Session::flash('message', 'ACTUALIZADO CORRECTAMENTE');
        return Redirect::to('/ListaEmpleado');    
    } else {
      $verificar = DB::select('SELECT count(*) count from empleado where ci="'.$request->ci.'"');
      if ($verificar[0]->count == 0) {
        $empledo = Empleado::find($request['id_empleado']);
        $empledo->fill([
          'nombre'=>$request->nombre,
          'apellido'=>$request->apellido,
          'ci'=>$request->ci,
          'expedido'=>$request->expedido,
          'direccion'=>$request->direccion,
          'celular'=>$request->celular,
          'genero'=>$request->genero,
          'codigo'=>$request->codigo,
          'estado'=>'h',
          'idCargo'=>$request['idCargo'],
          'idTurno'=>1, //ESTO LO PUSE NO ERA NECESARIO
        ]);
        $empledo->save();
        
        /*$name = strtolower($request['ci']);
        DB::table('users')->where('idEmpleado',$request['id_empleado'])->update(['email'=>$name, 'password'=>Hash::make($request['codigo']),'idPerfil'=>$idPerfil ]);*/
        Session::flash('message', 'ACTUALIZADO CORRECTAMENTE');
        return Redirect::to('/ListaEmpleado');  
      }
      else{
        Session::flash('message-error', 'YA EXISTE UN USUARIO CON ESE CARNET');
        return Redirect::to('/Vendedor/'.$id);
      }      
    }
  }

  public function BuscarSuperior($tipo){
    $result=DB::select("SELECT *FROM empleado WHERE empleado.deleted_at IS NULL AND empleado.idCargo=".$tipo);
    return response($result);
  }





}
