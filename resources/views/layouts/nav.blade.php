<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	<div class="container-fluid">
		<a class="navbar-brand" href="{{ route('tareas.index') }}">
	      <img src="http://placehold.it/50x50" alt="" width="30" height="24" class="d-inline-block align-top">
	      App Tareas
	    </a>

		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav me-auto mb-2 mb-lg-0">
				<li class="nav-item">
					<a class="nav-link active" aria-current="page" href="{{ route('tareas.index')}}">Vista Principal</a>
				</li>
			</ul>
			<form class="d-flex">
				<input class="form-control me-2" type="search" placeholder="Busqueda General..." aria-label="Búsqueda">
				<button class="btn btn-outline-success" type="submit">Búsqueda</button>
			</form>
		</div>
	</div>
</nav>