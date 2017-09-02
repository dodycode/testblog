@extends('layouts.adminmenu')

@section('add-ons')
<script src="{{ asset('tinymce/js/tinymce.min.js') }}"></script>
@stop

@section('content')
<form action="{{ url('stor-editan-page') }}/{{ $pages->id }}" method="POST" enctype="multipart/form-data">
	{!! csrf_field() !!}
	<div class="form-group">
		<label>Judul Halaman</label>
		<input type="text" name="title" class="form-control" value="{{ $pages->title }}" required autofocus>
	</div>
	<div class="form-group">
		<label>Konten Halaman</label>
		<textarea id="konten" name="content" style="resize: none">{!! $pages->content !!}</textarea>
	</div>
	<br>
	<input type="submit" class="btn btn-success pull-right" value="Edit" />
	<!--<input type="reset" class="btn btn-danger pull-left" value="Batal" />-->
</form>
@endsection

@section('js')
<script type="text/javascript">
tinymce.init({
	selector: '#konten',
	theme: 'modern',
	height: 300,
    plugins: [
      'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
      'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
      'save table contextmenu directionality emoticons template paste textcolor'
    ],
    toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons'
 });
</script>
@stop