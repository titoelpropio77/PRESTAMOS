<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\CategoriaRequest;
use App\Categoria;
use App\PrecioCategoria;
use App\Proyecto;
use DB;
use Session;
class PrecioController extends Controller
{
function index(){

    $precio=DB::select(" SELECT precio,categorialote.id,categorialote.categoria, proyecto.id,proyecto.nombre from preciocategoria, proyecto, categorialote where preciocategoria.deleted_at IS NULL and proyecto.id=categorialote.idProyecto and categorialote.id=preciocategoria.idCategoria and proyecto.id = ".Session::get('idProyecto'));

    // $precio=DB::table('preciocategoria')
    // ->join('proyecto','proyecto.id','=','categorialote.idProyecto')
    // ->join('categorialote','categorialote.id','=','preciocategoria.idCategoria')
    // ->select('precio','categorialote.id','categorialote.categoria', 'proyecto.id','proyecto.nombre')
    // ->paginate(30);
     ///$categoria=Categoria::paginate(10);
     return view('precio.index',compact('precio'));//,compact('categoria'));
  }
  
  public function create(){
    $categoria=DB::select("SELECT *from categorialote where categorialote.idProyecto=".Session::get('idProyecto'));
    return view('precio.create',compact('categoria',$categoria));    
  }

  public function store(Request $request){
  try {

       $precio=DB::select("SELECT *from preciocategoria WHERE preciocategoria.idCategoria=".$request['categoria']." ORDER BY preciocategoria.fecha DESC LIMIT 1");

       if(count($precio) != 0)
        {
          $this->destroy($precio[0]->id);
        }

      DB::beginTransaction();    
        $idPrecio=PrecioCategoria::create([
          'precio' => $request['precio'],
          'idCategoria' => $request['categoria']
        ]);
        
        DB::commit(); 
        return redirect('Precio')->with('message','GUARDADO CORRECTAMENTE');  
    }catch (Exception $e) {
        DB::rollback();
        return redirect('Precio')->with("message-error","ERROR INTENTE NUEVAMENTE");      
    }         
  }

  public function update(Request $request,$id){
  try {
      DB::beginTransaction();    
        $categoria = Categoria::find($id);
        $categoria->fill($request->all());
        $categoria->save();

        if ($request['precio'] != $request['precio_aux']) {
          PrecioCategoria::create([ 'precio' => $request['precio'], 'idCategoria' => $id ]);           
        }
       
        DB::commit();  
        return redirect('Categoria')->with('message','MODIFICADO CORRECTAMENTE');                                                      
    }catch (Exception $e) {
        DB::rollback();
        return redirect('Categoria/'.$id.'/edit')->with("message-error","ERROR INTENTE NUEVAMENTE");      
    } 


  }

  public function edit($id){
    $categoria=Categoria::find($id);    
    return view('categoria.edit',['categoria'=>$categoria]);
  }


  public function listacategoria1(Request $request ){
      if ($request->ajax()){
      $categoria=DB::select('select *from categoria');
      return response()->json($categoria);
      
      
      }
  }

  public function destroy($id){
      $precio=PrecioCategoria::find($id);
      $precio->delete();
  }
}
