<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\TipoCambioRequest;
use App\TipoCambio;
use DB;
use Session;
use App\User;
use Auth;
class TipoCambioController extends Controller
{

function index(){
    $tipo_cambio=DB::select("SELECT *from tipocambio order by tipocambio.fecha DESC LIMIT 1");
     return view('tipocambio.index',compact('tipo_cambio'));
  }
  
  public function create(){
    $categoria=DB::select("SELECT *from categorialote");
    return view('tipocambio.create',compact('categoria',$categoria));    
  }

  public function store(Request $request){
  try {
      DB::beginTransaction();    
        $cambio=DB::select("SELECT *from tipocambio WHERE tipocambio.deleted_at IS NULL");
        if(count($cambio) != 0)
        {
          $this->destroy($cambio[0]->id);
        }      
        TipoCambio::create([
          'monedaVenta' => $request['monedaVenta'],
          'monedaCompra' => $request['monedaCompra']
        ]);
        
        DB::commit(); 
        return redirect('TipoCambio')->with('message','GUARDADO CORRECTAMENTE');  
    }catch (Exception $e) {
        DB::rollback();
        return redirect('TipoCambio')->with("message-error","ERROR INTENTE NUEVAMENTE");      
    }         
  }

  public function destroy($id){
      $cambio=TipoCambio::find($id);
      $cambio->delete();
  }

  public function AutorizarCambioMoneda(Request $request){
    if ($request->ajax()) { 
        if (Auth::attempt(['email' =>$request['usuario'], 'password' =>$request['password']])) {
          $admin=DB::select("SELECT *FROM users WHERE users.email='".$request['usuario']."'");
          Session::put('idPerfilAutorizacion',$admin[0]->idEmpleado);          
          return response()->json(['mensaje' => '1']);                                           
        }else{
          return response()->json(['mensaje' => '2']);           
        }            
    }      
  }

}
