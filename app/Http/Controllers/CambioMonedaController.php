<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CambioMoneda;
use DB;
use Session;
use Redirect;
use App\Http\Requests;

class CambioMonedaController extends Controller
{
     public function __construct(Request $request) {
         $this->middleware('auth');
         $this->middleware('admin');
        $this->middleware('auth',['only'=>'admin']);
        
    }
	function index(){
        $moneda=CambioMoneda::paginate(9);
       return view('cambio_moneda.index',compact('moneda'));
	}
  
  
	public function create(){
      return view('moneda.create');	
    }
    
    public function store(Request $request){
    	CambioMoneda::create([
            'moneda' => $request['moneda'],
            
        ]);
        Session::flash('message','Moneda Creado Correctamente');
        return Redirect::to('/moneda');
    }

    public function edit($id){
    		
   $moneda = CambioMoneda::find($id);
   return view('moneda.edit',['moneda'=>$moneda]);
    }

public function update($id, MonedaRequest $request){
        $user =CambioMoneda::find($id);
        $user->fill($request->all());
        $user->save();
        Session::flash('message','moneda Actualizado Correctamente');
        return Redirect::to('/moneda');

    }
    
    public function destroy($id, Request $request){

        $moneda=CambioMoneda::find($id);
        $moneda->delete();
        Session::flash('message','moneda Eliminado Correctamente');
       return Redirect::to('/moneda');
    }
    
}
