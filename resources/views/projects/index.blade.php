@extends('layouts.master')

@section('content')
<div class="container-fluid mb-4">
	<div class="row align-items-center">
		<div class="col-md-4">
			<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalProyecto">
			  Crear Nueva Proyecto
			</button>
		</div>
	</div>
</div>

<div class="modal fade" id="modalProyecto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Crear Nueva Proyecto</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>

			<form method="POST" action="{{ route('proyectos.store') }}">
				<div class="modal-body">
					<!-- Nuestro campo de protección de formulario -->
					{{ csrf_field() }}
					<!-- Campos de formulario -->
					<div class="form-group mb-3">
						<label>Nombre de Proyecto</label>
						<input class="form-control" type="text" name="name" placeholder="Nombre de Proyecto">
					</div>

					<div class="form-group mb-3">
						<label>Descripción</label><br>
						<textarea class="form-control" name="description"></textarea>
					</div>

					<div class="form-group mb-3">
						<label>Fecha Final</label><br>
						<input class="form-control" type="date" name="final_date">
					</div>

					<div class="form-group mb-3">
						<label>Color de Proyecto</label><br>
						<input class="form-control" type="color" name="hex">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
					<button type="submit" class="btn btn-primary">Guardar Proyecto</button>
				</div>
			</form>	
		</div>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<h5 class="card-header">Listado de Proyectos</h5>
				<div class="card-body">
					<h5 class="card-title">Proyectos en curso</h5>
					<p class="card-text">Este es tu listado principal de proyectos, ponte a trabajar.</p>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		@foreach($proyectos as $proyecto)
		<div class="col-md-4 mt-4">
			<div class="card">
				<div class="line-color" style="height: 5px; width: 100%; background-color: {{ $proyecto->hex }}"></div>
				<div class="card-body">
					<h4>{{ $proyecto->name }}</h4>
					<p>{{ $proyecto->description }}</p>
				</div>

				<div class="tareas">
					<ul>
						<!-- Vamos a hacer un LOOP en la colección de tareas vinculadas -->
						@foreach($proyecto->tareas as $tarea)
							<li>{{ $tarea->name }}</li>
						@endforeach
					</ul>
				</div>

				<a href="" class="btn btn-primary btn-block">Agregar Tarea</a>
			</div>	
		</div>
		@endforeach
	</div>
</div>
@endsection