<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Cliente;
use App\Http\Requests;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use Session;
use Redirect;
use DB;
use Hash;

class ClienteController extends Controller {

    public function __construct() {
//        $this->middleware('auth');
//        $this->middleware('admin');
//        $this->middleware('auth', ['only' => 'admin']);
    }

    function index() {
//        $empresa = Empresa::lists('nombre', 'id');

        $cliente = Cliente::orderBy('id', 'desc')->paginate(8)
        ;
        return view('cliente.index', compact('cliente', $cliente));
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

    public function guarCliente(Request $request) {
            $nombre=$request['nombre'];
            $apellidos=$request['apellidos'];
            $celular=$request['celular'];
            $celularRef=$request['celularRef'];
            $genero=$request['genero'];
            $genero=$request['genero'];
            $pais=$request['pais'];
            $insertar=Cliente::create([
                "nombre"=>$nombre,
                "apellidos"=>$apellidos,
                "celular"=>$celular,
                "celularRef"=>$celularRef,
                "idPais"=>$pais,
                "genero"=>$genero,
                "ci"=>$ci
                ]);
    }

    public function edit($id) {

        $Cliente = Cliente::find($id);

        return view('cliente.edit', ['cliente' => $Cliente]);
    }

    public function update($id,Request $request) {

        $texto="";
    
        if ($this->validar_texto(1,$request->nombre_cliente) && $request->nombre_cliente!="") {
           $texto.="No agregue numero en el campo Nombre  ";
        }
        if ($request->nombre_cliente=="") {
           $texto.="El campo Nombre es obligatorio  ";
        }

        if ($this->validar_texto(1,$request->apellido_cliente) && $request->apellido_cliente!="") {
           $texto.="No agregue numero en el campo Apellido  ";
        }
        if ($request->apellido_cliente=="") {
           $texto.="El campo Apellido es obligatorio  ";
        }

        if ($this->validar_texto(0,$request->ci_cliente) && $request->ci_cliente!="") {
           $texto.="No agregue letra en el campo CI  ";
        }
        if ($request->ci_cliente=="") {
           $texto.="El campo CI es obligatorio  ";
        }

        if ($this->validar_texto(0,$request->nit_cliente) && $request->nit_cliente!="") {
           $texto.="No agregue letra en el campo NIT  ";
        }

        if ($this->validar_texto(0,$request->celular_cliente) && $request->celular_cliente!="") {
           $texto.="No agregue letra en el campo Celular  ";
        }

        if ($this->validar_texto(0,$request->telefono_cliente) && $request->telefono_cliente!="") {
           $texto.="No agregue letra en el campo Telefono Adicional  ";
        }

        if ($texto!="") {
           Session::flash('message-error',$texto);
           return Redirect::to('/cliente');
        }
        else{

        $cliente = Cliente::find($request->id_cliente);
        $cliente->fill([
        'nombre' => $request->nombre_cliente,
        'apellido' => $request->apellido_cliente,
        'ci' => $request->ci_cliente,
        'nit' => $request->nit_cliente,
        'celular' => $request->celular_cliente,
        'telefono_adicional' => $request->telefono_cliente,

        'direccion' => $request->direccion_cliente
        ]);
        $cliente->save();
        Session::flash('message', 'Cliente Actualizado Correctamente');
        return Redirect::to('/cliente');
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

     public function cargarModalCliente($id)
    {
       $cliente = Cliente::find($id);
       return response()->json($cliente);
    }
    public function verificarCarnet($ci){//este verifica si existe ese carnet 
         $verificar=DB::select('SELECT *,COUNT(*)as contador from cliente where ci='.$ci);
        return response()->json($verificar);

    }
    public function listarCliente(){
        $listar=DB::select('select nombre,apellidos,celular,ci,expedido from cliente ');
        return response()->json($listar);
    }
}
