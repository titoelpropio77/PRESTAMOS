<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Perfil;
use App\Http\Requests;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use Session;
use Redirect;
use App\Empleado;
use DB;
use Hash;

class UsuarioController extends Controller {

    public function __construct() {
       // $this->middleware('auth');

   
       
       // $this->middleware('admin');
       // $this->middleware('auth', ['only' => 'admin']);

    }

    function index() {
//        $empresa = Empresa::lists('nombre', 'id');

        $Empleado = Empleado::paginate(8);
        return view('vendedor.index',compact('Empleado'));
    }

    public function create() {
        $empresa = Empresa::lists('nombre', 'id');
        return view('usuario.create', compact('empresa'));
    }

    public function store(Request $request) {
       $verificar = DB::select('select count(*) count from users where users.email="' . $request->email.'"');
       if ($verificar[0]->count == 0) {
         $name = strtolower($request['email']);
            DB::table('users')->insert(['idEmpleado'=>$request['idEmpleado'],'email' => $name, 'password' => Hash::make($request['password']),'idPerfil'=>$request['idPerfil']]);
            //        DB:table('users')->insert(['nick'=>$request->nick,'nick'=>$request->nick,'password'=>Hash::make($request->password)]);
            Session::flash('message', 'Usuario Creado Correctamente');
            return Redirect::to('/Empleado');
            
       
               
       }
       else{
           Session::flash('message-error', 'Ya existe un usuario con ese nick');
           return Redirect::to('/Empleado');
       }
    }

    public function edit($id) {

        $trabajador = User::find($id);
      

        return view('usuario.edit', ['user' => $trabajador], compact('empresa'));
    }

    public function update(Request $request,$id) {
        $verificar = DB::select('select count(*) count from users where users.email="' . $request->email.'" and users.idEmpleado<>'.$id);
        if ($verificar[0]->count == 0) {
          $name = strtolower($request['email']);
         DB::table('users')->where('idEmpleado',$id)->update(['email' =>  $name, 'password' => Hash::make($request['password']),'idPerfil'=>$request['idPerfil']]);
        Session::flash('message', 'Usuario Actualizado Correctamente');
        return Redirect::to('/Empleado');
         }
       else{
           Session::flash('message-error', 'Ya existe un usuario con ese nick');
           return Redirect::to('/Empleado');
       }
    }

    public function destroy($id) {

        $trabajador = User::find($id);
        $trabajador->delete();
        Session::flash('message', 'Usuario Eliminado Correctamente');
        return Redirect::to('/usuario');
    }
    public function cargar_usuario($id){
           $usuario = User::find($id);
           return response()->json($usuario);
    }
    public function show($id){
        $empleado = Empleado::find($id);
//
        $idPerfil = Perfil::lists('nombre','id');
//DB::table('users')->lists('email')->where('idEmpleado',$id)
        $usuario =DB::select('select *from users where idEmpleado='.$id);
       
if (count($usuario)!=0) {
   // return view('usuario.edit', ['empleado' => $empleado,'perfil'=>$idPerfil],compact('usuario')); 
  return view('usuario.edit', ['empleado' => $empleado,'perfil'=>$idPerfil,'usuario'=>$usuario]); 
}else{
     return view('usuario.create', ['empleado' => $empleado,'perfil'=>$idPerfil]); 
}

        
    }
}
