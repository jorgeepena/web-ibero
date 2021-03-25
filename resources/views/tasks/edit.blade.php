@extends('layouts.master')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-4">
			<a class="btn btn-primary mt-5 mb-5" href="{{ route('tareas.show', $tarea->id) }}">Regresar a Listado</a>

			<div class="card card-body">
				<form method="POST" action="{{ route('tareas.update', $tarea->id) }}">
					<!-- Nuestro campo de protección de formulario -->
					{{ csrf_field() }}
					{{ method_field('PUT') }}

					<!-- Campos de formulario -->
					<div class="form-group mb-3">
						<label>Nombre de tarea</label><br>
						<input class="form-control" type="text" name="name" placeholder="Nombre de Tarea" value="{{ $tarea->name }}">
					</div>
				
					<div class="form-group mb-3">
						<label>Descripción</label><br>
						<textarea class="form-control" name="description">{{ $tarea->description }}</textarea>
					</div>
					
					<div class="form-group mb-3">
						<label>Fecha de Entrega</label><br>
						<input class="form-control" type="date" name="due_date" value="{{ $tarea->due_date }}">
					</div>
					<!-- Guardar Formulario -->
					<button class="btn btn-success" type="submit">Guardar Tarea</button>
				</form>
			</div>
		</div>
	</div>
</div>

@endsection