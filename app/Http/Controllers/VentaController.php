<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Venta;
use App\Detalle;
use App\Tienda;
use App\Producto;
use App\Cliente;

class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $ventas=Venta::with(['tienda_id', 'cliente_id'])->orderBy('id','DESC')->paginate(3);
        return view('Venta.index',compact('ventas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $productos=Producto::orderBy('id','DESC')->get();
        $tiendas=Tienda::orderBy('id','DESC')->get();
        $clientes=Cliente::orderBy('id','DESC')->get();
        return view('Venta.create',compact('productos','clientes','tiendas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,['tienda'=>'required', 'cliente'=>'required', 'producto'=>'required', 'cantidad'=>'required']);
        
        $Venta = new Venta;
        $Venta->tienda = $request->tienda;
        $Venta->cliente = $request->cliente;
        $Venta->fecha = Carbon::now()->toDateTimeString();
        $Venta->save();
        

        $Detalle = new Detalle;
        $Detalle->venta = $Venta->id;
        $Detalle->producto = $request->producto;
        $Detalle->cantidad = $request->cantidad;
        $Detalle->save();

        return redirect()->route('index')->with('success','Registro creado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $ventas=Venta::find($id);
        return  view('venta.show',compact('venta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $venta=Venta::find($id);
        return view('venta.edit',compact('venta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request,['nombre'=>'required', 'precio'=>'required']);
 
        Venta::find($id)->update($request->all());
        return redirect()->route('venta.index')->with('success','Registro actualizado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Venta::find($id)->delete();
        return redirect()->route('venta.index')->with('success','Registro eliminado satisfactoriamente');
    }
}