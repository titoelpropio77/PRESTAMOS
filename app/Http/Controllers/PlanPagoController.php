<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\ConsumoRequest;
use Session;
use Redirect;
use DB;

class PlanPagoController extends Controller {

    function index() {
       $pago=DB::select("SELECT * FROM planpago WHERE planpago.estado='d'");
        return view('planpago.index', compact('pago'));
    }

 

    public function store(Request $request) {
        $texto="";
    $verificar=DB::select('select count(*) as count from lote where estado=2 and id='.$request->id_lote);

    if ($verificar[0]->count==1 ) {
  Session::flash('message-error','ESE LOTE YA NO ESTA DISPONIBLE PARA LA VENTA');

  return Redirect::to('vender/lote/'.$request->id_lote);
    }
        if ($this->validar_texto(1,$request->nombre ) && $request->nombre!="") {
           $texto.="No agregue numero en el campo nombre, ";
        }
        if ($request->nombre=="") {
           $texto.="El campo nombre es obligatorio,   ";
        }
        if ($this->validar_texto(1,$request->apellido ) && $request->apellido!="") {
           $texto.="No agregue numero en el campo apellido, ";
        }
        if ($request->apellido=="") {
           $texto.="El campo apellido es obligatorio,   ";
        }
         if ($this->validar_texto(0,$request->ci ) && $request->ci!="") {
           $texto.="No agregue letra en el campo carnet, ";
        }
        if ($request->ci=="") {
           $texto.="El campo Carnet es obligatorio,   ";
        }
         
        if ($request->direccion=="") {
           $texto.="El campo Domicilio es obligatorio,   ";
        }
           if ($this->validar_texto(0,$request->celular ) && $request->celular!="") {
           $texto.="No agregue letras en el campo celular, ";
        }
        if ($request->celular=="") {
           $texto.="El campo Celular es obligatorio,   ";
        }
          if ($this->validar_texto(0,$request->telefono ) && $request->telefono!="") {
           $texto.="No agregue letras en el campo Celular ref, ";
        }
        if ($this->validar_texto(0,$request->nit ) && $request->nit!="") {
           $texto.="No agregue letras en el campo Nit, ";
        }
       if ($request->precio_venta=="") {
           $texto.="El campo precio venta es obligatorio, ";
        }
if ($texto!="") {
  Session::flash('message-error',$texto);
  return Redirect::to('vender_lote/'.$request->id_lote);
    }
   else{
    try {
         DB::beginTransaction();
      

         if ($request->id_cliente=='0') {
        
           $cliente= DB::table('cliente')->insert(['nombre' => $request['nombre'], 'apellido' => $request['apellido'], 'direccion' => $request['direccion'], 'ci' => $request['ci'], 'nit' => $request['nit']
            , 'celular' => $request['celular'], 'telefono_adicional' => $request['telefono']]);
         }
         else{
          $cliente = Cliente::find($request->id_cliente);
        $cliente->fill([
        'nombre' => $request->nombre,
        'apellido' => $request->apellido,
        'ci' => $request->ci,
        'nit' => $request->nit,
        'telefono' => $request->telefono,
        'telefono_adicional' => $request->telefono,

        'direccion' => $request->direccion
        ]);
        $cliente->save();
         }
          DB::table('venta')->insert(['precio_venta' => $request['precio_venta'], 'precio_descuento' => $request['pago_contado_bol'],  'porcentaje_descuento' => $request['descuento'],'id_cliente' => $cliente->id, 'id_users' => $request->user()->id, 'id_lote' => $request->id_lote
            , 'id_descuento' => $request['id_descuento']]);
        
          $lote=DB::table('lote')->where('id', $request->id_lote)->update(['estado' => 2 ]);
       $reserva=DB::table('reserva')->where('id', $request->id_reserva)->update(['estado' => 2 ]);
 DB::commit();
     Session::flash('message','GUARDADO CORRECTAMENTE');
     return Redirect::to('/lista/ventas'); 
    }  catch (Exception $exc) {
            DB::rollback();
            echo $exc->getTraceAsString();
        }
      
       
    }}
    public function store_venta_reserva(Request $request){
        $texto="";
    $verificar=DB::select('select count(*) as count from lote where estado=2 and id='.$request->id_lote);
    if ($verificar[0]->count==1) {
  Session::flash('message-error','ESE LOTE YA NO ESTA DISPONIBLE PARA LA VENTA');

  return Redirect::to('ventareserva/'.$request->id_reserva);
    }
        if ($this->validar_texto(1,$request->nombre ) && $request->nombre!="") {
           $texto.="No agregue numero en el campo nombre, ";
        }
        if ($request->nombre=="") {
           $texto.="El campo nombre es obligatorio,   ";
        }
        if ($this->validar_texto(1,$request->apellido ) && $request->apellido!="") {
           $texto.="No agregue numero en el campo apellido, ";
        }
        if ($request->apellido=="") {
           $texto.="El campo apellido es obligatorio,   ";
        }
         if ($this->validar_texto(0,$request->ci ) && $request->ci!="") {
           $texto.="No agregue letra en el campo carnet, ";
        }
        if ($request->ci=="") {
           $texto.="El campo Carnet es obligatorio,   ";
        }
         
        if ($request->direccion=="") {
           $texto.="El campo Domicilio es obligatorio,   ";
        }
           if ($this->validar_texto(0,$request->celular ) && $request->celular!="") {
           $texto.="No agregue letras en el campo celular, ";
        }
        if ($request->celular=="") {
           $texto.="El campo Celular es obligatorio,   ";
        }
          if ($this->validar_texto(0,$request->telefono ) && $request->telefono!="") {
           $texto.="No agregue letras en el campo Celular ref, ";
        }
        if ($this->validar_texto(0,$request->nit ) && $request->nit!="") {
           $texto.="No agregue letras en el campo Nit, ";
        }
       if ($request->precio_venta=="") {
           $texto.="El campo precio venta es obligatorio, ";
        }
if ($texto!="") {
  Session::flash('message-error',$texto);
  return Redirect::to('ventareserva/'.$request->id_reserva);
    }
   else{
    try {
         DB::beginTransaction();
         DB::table('venta')->insert(['precio_venta' => $request['precio_venta'], 'precio_descuento' => $request['pago_contado_bol'],  'porcentaje_descuento' => $request['descuento'],'id_cliente' => $request['id_cliente'], 'id_users' => $request->user()->id, 'id_lote' => $request->id_lote
            , 'id_descuento' => $request['id_descuento']]);
          $cliente = Cliente::find($request->id_cliente);
        $cliente->fill([
        'nombre' => $request->nombre,
        'apellido' => $request->apellido,
        'ci' => $request->ci,
        'nit' => $request->nit,
        'celular' => $request->celular,
        'telefono_adicional' => $request->telefono,

        'direccion' => $request->direccion
        ]);
        $cliente->save();
          $lote=DB::table('lote')->where('id', $request->id_lote)->update(['estado' => 2 ]);
       $reserva=DB::table('reserva')->where('id', $request->id_reserva)->update(['estado' => 2 ]);
 DB::commit();
     Session::flash('message','GUARDADO CORRECTAMENTE');
     return Redirect::to('/lista/ventas'); 
    }  catch (Exception $exc) {
            DB::rollback();
            echo $exc->getTraceAsString();
        }
      
   }
      

    //     try {
    //          DB::beginTransaction();
    //          $verificar_lote=DB::select('SELECT COUNT(*) as contar FROM `lote` WHERE estado=0 
    //             and id='.$request->id_lote);
    //     if ($verificar_lote[0]->contar==1) {
    //     $cliente = Cliente::find($request->id_cliente);
    //     $cliente->fill([
    //     'nombre' => $request->nombre,
    //     'apellido' => $request->apellido,
    //     'ci' => $request->ci,
    //     'nit' => $request->nit,
    //     'telefono' => $request->telefono,
    //     'telefono_adicional' => $request->telefono_adicional,

    //     'direccion' => $request->direccion
    //     ]);
    //     $cliente->save();

    //          }

    //    DB::commit();
    // } catch (Exception $e) {
    //   DB::rollback();
    // }
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
    public function edit($id) {
        $consumo = Consumo::find($id);
        $galpon = Galpon::lists('nombre', 'id');
        $silos = Silos::lists('nombre', 'id');
        return view('consumo.edit', compact('galpon', $galpon, 'silos', $silos), ['consumo' => $consumo]);
    }

    public function update($id, ConsumoRequest $request) {
        $consumo = Consumo::find($id);
        $consumo->fill($request->all());
        $consumo->save();
        Session::flash('message', 'Consumo Actualizado Correctamente');
        return Redirect::to('/consumo');
    }

    public function show($id){
     
      $debe=DB::select("SELECT * FROM cuotas,plandepago,venta WHERE cuotas.estado='d' AND cuotas.idPlandePago=plandepago.id and plandepago.idVenta=venta.id and plandepago.idVenta=".$id." ORDER BY cuotas.fechaLimite LIMIT 10");//lista de cuotas que deben en bruto
      $pago=DB::select("SELECT * FROM cuotas,plandepago,venta WHERE cuotas.estado='p'and plandepago.idVenta=venta.id AND cuotas.idPlandePago=plandepago.id  and plandepago.idVenta=".$id." ORDER BY cuotas.fechaLimite DESC LIMIT 10");
    $monto_pagar=DB::select("SELECT ABS((SELECT IFNULL(SUM(detallecuota.monto),0)as monto FROM plandepago,cuotas,detallecuota WHERE plandepago.id=cuotas.idPlandePago AND cuotas.id=detallecuota.idCuota AND plandepago.idVenta=".$id.") - (SELECT SUM(cuotas.monto) FROM plandepago,cuotas WHERE plandepago.id=cuotas.idPlandePago AND plandepago.idVenta=".$id.")) as cuota");
      $cantidad=DB::select("SELECT COUNT(*)as contador FROM cuotas,plandepago,venta WHERE cuotas.estado='d' AND cuotas.idPlandePago=plandepago.id and plandepago.idVenta=venta.id and plandepago.idVenta=".$id);

      $monto_debe=DB::select("SELECT SUM(cuotas.monto)as cuota FROM cuotas,plandepago,venta WHERE cuotas.estado='d' AND cuotas.idPlandePago=plandepago.id and plandepago.idVenta=venta.id and  plandepago.idVenta=".$id);
      $cuota_pago=DB::select("SELECT *from  cuotas,plandepago,venta WHERE cuotas.idPlandePago=plandepago.id and plandepago.idVenta=venta.id and  plandepago.idVenta=".$id." LIMIT 1");
      $monto_cuota=DB::select("SELECT (".$cuota_pago[0]->monto."-(".$monto_debe[0]->cuota."-".$monto_pagar[0]->cuota."))as monto_cuota");
      $mora=DB::select("SELECT COUNT(*)as contador FROM cuotas,plandepago,venta WHERE cuotas.estado='d' and plandepago.idVenta=venta.id AND  cuotas.mora=1 AND  cuotas.idPlandePago=plandepago.id and plandepago.idVenta=".$id);

      $ultimo=DB::select("SELECT COUNT(*)AS contador FROM cuotas,plandepago,venta WHERE cuotas.estado='d' and plandepago.idVenta=venta.id AND cuotas.idPlandePago=plandepago.id and plandepago.idVenta=".$id);//verifica la ultima cuota
            
      return view('planpago.index', compact('debe','pago','monto_pagar','cantidad','monto_cuota','mora','ultimo'));
    
    }


    public function destroy($id) {
        $consumo = Consumo::find($id);
        $consumo->delete();
        Consumo::destroy($id);
        Session::flash('message', 'Consumo Eliminado Correctamente');
        return Redirect::to('/consumo');
    }
    public function ventareserva($id_reserva){
        $lista_reserva =DB::select("select superficie, id_lote, cliente.nit, cliente.celular,cliente.telefono_adicional, cliente.direccion, cliente.nombre as nombre_cliente, cliente.apellido as apellido_cli,cliente.ci,lote.nro_lote,manzano.numero as nro_manzano, cliente.id as id_cliente, reserva.id as id_reserva, reserva.fecha,users.name,users.apellido,users.id  from reserva,cliente,users,lote,manzano where reserva.deleted_at is null and cliente.id= reserva.id_cliente and users.id=reserva.id_vendedor and lote.id= reserva.id_lote and lote.id_manzano=manzano.id and reserva.estado=1 and reserva.id=".$id_reserva);
        $descuento=DB::select('select * from descuento_venta WHERE deleted_at IS NULL  order by id asc limit 1 ');
          $moneda=DB::select('select *from cambio_moneda where deleted_at IS NULL');
        return view('venta.ventareservas',['id_reserva'=>$id_reserva],compact('lista_reserva','moneda','descuento'));
    }

    public function vender(){//este muestra el formulario de venta con el mapa

        return view('venta.venta_lote');
    }
public function plan_pago($id){
 

  return view('planpago.plan_pago');
}
}
