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
      public function __construct() {

    }

    function index() {

        $empleado = Empleado::orderBy('id', 'desc')->paginate(8)
        ;
        return view('empleado.index', compact('empleado', $empleado));
    }

    public function create() {
        $empresa = Empresa::lists('nombre', 'id');
        return view('usuario.create', compact('empresa'));
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

    public function guarEmpleado(Request $request) {
            $nombre=$request['nombre'];
            $apellidos=$request['apellidos'];
            $cargo=$request['cargo'];
            $usuario=$request['usuario'];
            $password=$request['password'];
            
            $insertar=Empleado::create([
                "nombre"=>$nombre,
                "apellidos"=>$apellidos,
                "cargo"=>$cargo,
                "usuario"=>$usuario,
                "password"=>$password
                ]);
            return response()->json(['mensaje'=>'guardado correctamente']);

    }

    public function edit($id) {

        $Empleado = Empleado::find($id);

        return view('empleado.edit', ['empleado' => $Empleado]);
    }

    public function update($id,Request $request) {

        $texto="";
    
        if ($this->validar_texto(1,$request->nombre_empleado) && $request->nombre_empleado!="") {
           $texto.="No agregue numero en el campo Nombre  ";
        }
        if ($request->nombre_cliente=="") {
           $texto.="El campo Nombre es obligatorio  ";
        }

        if ($this->validar_texto(1,$request->apellido_empleado) && $request->apellido_empleado!="") {
           $texto.="No agregue numero en el campo Apellido  ";
        }
        if ($request->apellido_empleado=="") {
           $texto.="El campo Apellido es obligatorio  ";
        }

        if ($this->validar_texto(0,$request->cargo) && $request->cargo!="") {
           $texto.="No agregue letra en el campo Cargo  ";
        }
        if ($request->cargo=="") {
           $texto.="El campo Cargo es obligatorio  ";
        }

        if ($this->validar_texto(0,$request->usuario) && $request->usuario!="") {
           $texto.="No agregue letra en el campo usuario  ";
        }

        if ($this->validar_texto(0,$request->password) && $request->password!="") {
           $texto.="No agregue letra en el campo password  ";
        }

        
        if ($texto!="") {
           Session::flash('message-error',$texto);
           return Redirect::to('/empleado');
        }
        else{

        $empleado = Empleado::find($request->id_cliente);
        $empleado->fill([
        'nombre' => $request->nombre_empleado,
        'apellido' => $request->apellido_empleado,
        'cargo' => $request->cargo,
        'usuario' => $request->usuario,
        'password' => $request->password
        ]);
        $empleado->save();
        Session::flash('message', 'Empleado Actualizado Correctamente');
        return Redirect::to('/empleado');
       }
    }

    public function destroy($id) {

        $trabajador = User::find($id);
        $trabajador->delete();
        Session::flash('message', 'Usuario Eliminado Correctamente');
        return Redirect::to('/usuario');
    }
    public function buscarEmpleado($ci){
        $empleado=DB::select("select * from empleado where id=".$id);
        if (count($empleado)!=0) {
            return response()->json($empleado);
        }
      return response()->json(['mensaje'=>'1']);
    }

     public function cargarModalEmpleado($id)
    {
       $empleado = Empleado::find($id);
       return response()->json($empleado);
    }
   
    public function listarEmpleado(){
        $listar=DB::select('select nombre,apellidos,cargo,usuario,password from empleado ');
        return response()->json($listar);
    }

}
