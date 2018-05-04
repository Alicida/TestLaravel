@extends('layouts.layout')
@section('content')
<div class="row">
	<section class="content">
		<div class="col-md-8 col-md-offset-2">
			@if (count($errors) > 0)
			<div class="alert alert-danger">
				<strong>Error!</strong> Revise los campos obligatorios.<br><br>
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
			@endif
			@if(Session::has('success'))
			<div class="alert alert-info">
				{{Session::get('success')}}
			</div>
			@endif

			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Nuevo Venta</h3>
				</div>
				<div class="panel-body">					
					<div class="table-container">
						<form method="POST" action="{{ route('store') }}"  role="form">
							{{ csrf_field() }}
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										@if($tiendas->count())
										<select name="tienda" id="tienda"> 
              							@foreach($tiendas as $tienda)
										  <option value="{{$tienda->id}}">{{$tienda->nombre}}</option>
										@endforeach 
										</select>
										@else
										<p>Por favor, ingresa tiendas a la base de datos para poder registrar una venta.</p>
										@endif
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										@if($clientes->count())
										<select name="cliente" id="cliente"> 
              							@foreach($clientes as $cliente)
										  <option value="{{$cliente->id}}">{{$cliente->nombre}}</option>
										@endforeach 
										</select>
										@else
										<p>Por favor, ingresa clientes a la base de datos para poder registrar una venta.</p>
										@endif 
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									@if($productos->count())
										<select name="producto" id="producto"> 
              							@foreach($productos as $producto)
										  <option value="{{$producto->id}}">{{$producto->nombre}}</option>
										@endforeach 
										</select>
										@else
										<p>Por favor, ingresa productos a la base de datos para poder registrar una venta.</p>
										@endif 
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<input type="text" name="cantidad" id="cantidad" class="form-control input-sm" placeholder="Cantidad de productos">
									</div>
								</div>
							</div>
							<div class="row">

								<div class="col-xs-12 col-sm-12 col-md-12">
									<input type="submit"  value="Guardar" class="btn btn-success btn-block">
									<a href="{{ route('index') }}" class="btn btn-info btn-block" >Atrás</a>
								</div>	

							</div>
						</form>
					</div>
				</div>

			</div>
		</div>
	</section>
	@endsection