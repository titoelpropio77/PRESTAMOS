<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MonedaRequest;
use App\Moneda;
use DB;
use App\Http\Requests;

class MonedaController extends Controller
{
     public function __construct(Request $request) {
         $this->middleware('auth');
         $this->middleware('admin');
        $this->middleware('auth',['only'=>'admin']);
        
    }
	function index(){
        $moneda=Moneda::paginate(9);
       return view('moneda.index',compact('moneda'));
	}
  
  
	public function create(){
      return view('moneda.create');	
    }
    
    public function store(MonedaRequest $request){
    	Moneda::create([
            'tipo_cambio' => $request['tipo_cambio'],
       
            
        ]);
        Session::flash('message','Moneda Creado Correctamente');
        return Redirect::to('/moneda');
    }

    public function edit($id){
    		
   $moneda = Moneda::find($id);
   return view('moneda.edit',['moneda'=>$moneda]);
    }

public function update($id, MonedaRequest $request){
        $user =Moneda::find($id);
        $user->fill($request->all());
        $user->save();
        Session::flash('message','moneda Actualizado Correctamente');
        return Redirect::to('/moneda');

    }
    
    public function destroy($id, Request $request){

        $moneda=Moneda::find($id);
        $moneda->delete();
        Session::flash('message','moneda Eliminado Correctamente');
       return Redirect::to('/moneda');
    }
    
}
