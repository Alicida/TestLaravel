@extends('layouts.layout')
@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-left"><h3>Lista de Tiendas</h3></div>
          <div class="pull-right">
            <div class="btn-group">
              <a href="{{ route('tienda.create') }}" class="btn btn-info" >Añadir Tienda</a>
              <a href="{{ route('index') }}" class="btn btn-success" >Atrás</a>
            </div>
          </div>
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <thead>
               <th>Nombre</th>
             </thead>
             <tbody>
              @if($tiendas->count())  
              @foreach($tiendas as $tienda)  
              <tr>
                <td>{{$tienda->nombre}}</td>
                <td><a class="btn btn-primary btn-xs" href="{{action('TiendaController@edit', $tienda->id)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
                <td>
                  <form action="{{action('TiendaController@destroy', $tienda->id)}}" method="post">
                   {{csrf_field()}}
                   <input name="_method" type="hidden" value="DELETE">

                   <button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                 </td>
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
      {{ $tiendas->links() }}
    </div>
  </div>
</section>

@endsection