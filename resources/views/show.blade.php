@extends('layouts.master')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-6">
			<a class="btn btn-primary mt-5 mb-5" href="{{ route('tareas.index') }}">Regresar a Listado</a>

			<div class="card card-body">
				<h4>{{ $tarea->name }}</h4>
				<p class="mb-4">{{ $tarea->description }}</p>
				<p class="text-muted">Fecha de entrega: {{ $tarea->due_date }}</p>

				<hr>

				<div class="d-grid gap-2 d-md-flex justify-content-md-end">
					<a class="btn btn-info" href="{{ route('tareas.edit', $tarea->id) }}">EDITAR</a>
					  <form method="POST" action="{{ route('tareas.destroy', $tarea->id) }}">
						{{ csrf_field() }}
						{{ method_field('DELETE') }}
						<button class="btn btn-danger" type="submit">BORRAR</button>
					</form>
				</div>
				
			</div>
		</div>
	</div>
</div>
@endsection