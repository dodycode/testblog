@extends('layouts.adminmenu')
@section('content')
<form action="{{ url('store-tag') }}" method="POST" enctype="multipart/form-data">
	{!! csrf_field() !!}
	<div class="form-group">
		<label>Nama Tag</label>
		<input type="text" name="tag" class="form-control" required autofocus>
	</div>
	<br>
	<input type="submit" class="btn btn-success pull-right" value="Kirim" />
	<input type="reset" class="btn btn-danger pull-left" value="Batal" />
</form>
@endsection