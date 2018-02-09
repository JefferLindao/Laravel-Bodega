{!! Form::open(['url' => 'almacen/articulo', 'method' => 'GET', 'autocomplete' => '0ff', 'role' => 'search']) !!}
<div class="form-group">
	<div class="input-group">
		<input type="text" class="form-control" name="searchText" placeholder="Buscar..." value="{{$searchText}}">
		<span class="input-group-btn">
			<button type="submit" class="btn btn-primary">Buscar</button>
		</span>
	</div>
</div>

{!! Form::close() !!}