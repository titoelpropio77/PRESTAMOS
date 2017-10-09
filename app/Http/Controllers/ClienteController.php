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

    public function store(Request $request) {
//        $verificar = DB::select('select count(*) count from cliente where cliente.email="' . $request->email.'"');
//        if ($verificar[0]->count == 0) {

        $texto="";
    
        if ($this->validar_texto(1,$request->nombre) && $request->nombre!="") {
           $texto.="No agregue numero en el campo Nombre  ";
        }
        if ($request->nombre=="") {
           $texto.="El campo Nombre es obligatorio  ";
        }

        if ($this->validar_texto(1,$request->apellido) && $request->apellido!="") {
           $texto.="No agregue numero en el campo Apellido  ";
        }
        if ($request->apellido=="") {
           $texto.="El campo Apellido es obligatorio  ";
        }

        if ($this->validar_texto(0,$request->ci) && $request->ci!="") {
           $texto.="No agregue letra en el campo CI  ";
        }
        if ($request->ci=="") {
           $texto.="El campo CI es obligatorio  ";
        }

        if ($this->validar_texto(0,$request->nit) && $request->nit!="") {
           $texto.="No agregue letra en el campo NIT  ";
        }

        if ($this->validar_texto(0,$request->celular) && $request->celular!="") {
           $texto.="No agregue letra en el campo Celular  ";
        }

        if ($this->validar_texto(0,$request->telefono_adicional) && $request->telefono_adicional!="") {
           $texto.="No agregue letra en el campo Telefono Adicional  ";
        }

        if ($texto!="") {
           Session::flash('message-error',$texto);
           return Redirect::to('/cliente');
        }
        else{

        DB::table('cliente')->insert(['nombre' => $request['nombre'], 'apellido' => $request['apellido'], 'direccion' => $request['direccion'], 'ci' => $request['ci'], 'nit' => $request['nit']
            , 'celular' => $request['celular'], 'telefono_adicional' => $request['telefono_adicional']]);
        //        DB:table('cliente')->insert(['nick'=>$request->nick,'nick'=>$request->nick,'password'=>Hash::make($request->password)]);
        Session::flash('message', 'Cliente Creado Correctamente');
        return Redirect::to('/cliente');

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

}
