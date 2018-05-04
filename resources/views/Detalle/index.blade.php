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
              <a href="{{ route('index') }}" class="btn btn-success" >Atrás</a>
            </div>
          </div>
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <thead>
               <th>Producto</th>
               <th>Cantidad</th>
             </thead>
             <tbody>
              @if($detalle)  
              
              <tr>
                <td>{{$detalle->producto_id->nombre}}</td>
                <td>{{$detalle->cantidad}}</td>
              </tr>
               @else
               <tr>
                <td colspan="8">No hay registro !!</td>
              </tr>
              @endif
            </tbody>

          </table>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection