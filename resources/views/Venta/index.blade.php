@extends('layouts.layout')
@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-left"><h3>Lista de Ventas</h3></div>
          <div class="pull-right">
            <div class="btn-group">
              <a href="{{ route('create') }}" class="btn btn-info" >Añadir Venta</a>
              <a href="{{ route('tienda.index') }}" class="btn btn-success" >Tiendas</a>
              <a href="{{ route('cliente.index') }}" class="btn btn-success" >Clientes</a>
              <a href="{{ route('producto.index') }}" class="btn btn-success" >Productos</a>
            </div>
          </div>
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <thead>
               <th>Tienda</th>
               <th>Cliente</th>
               <th>Fecha</th>
             </thead>
             <tbody>
              @if($ventas->count())  
              @foreach($ventas as $venta)  
              <tr>
                <td>{{$venta->tienda_id->nombre}}</td>
                <td>{{$venta->cliente_id->nombre}}</td>
                <td>{{$venta->fecha}}</td>
                <td><a class="btn btn-primary btn-xs" href="{{route('detalle.index', ['id' => $venta->id])}}" ><span class="glyphicon glyphicon-pencil">Detalle</span></a></td>
               </tr>
               @endforeach 
               @else
               <tr>
                <td colspan="8">No hay registro !!</td>
              </tr>
              @endif
            </tbody>
          </table>
        </div>
      </div>
      {{ $ventas->links() }}
    </div>
  </div>
</section>

@endsection