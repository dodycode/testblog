@extends('layouts.adminmenu')

@section('add-ons')
<script src="{{ asset('tinymce/js/tinymce.min.js') }}"></script>
@stop

@section('content')
<form action="{{ url('storeEditPost') }}/{{ $post->id }}" method="POST" enctype="multipart/form-data">
	{!! csrf_field() !!}
	<div class="form-group">
		<label>Judul Post</label>
		<input type="text" name="title" class="form-control" value="{{ $post->title }}" required autofocus>
	</div>
	<div class="form-group">
		@if($post->image !== null)
        <img src="{{asset('img/'.$post->image)}}" id="showgambar" class="img-responsive" style="max-width: 300px; max-height: 300px;" />
        @else
        <img src="{{asset('img/noimg.jpg')}}" id="showgambar" class="img-responsive" style="max-width: 300px; max-height: 300px;" />
        @endif
    </div>
	<div class="form-group">
		<label>Gambar Post</label>
        <input id="gambar_post" name="image" type="file" />
        <small>Lewatkan saja bagian ini jika tidak ada perubahan pada kondisi cover</small>
	</div>
	<div class="form-group">
		<label>Isi Post</label>
		<textarea id="konten" name="content" style="resize: none">{!! $post->content !!}</textarea>
	</div>
	<div class="form-group">
		<label>Kategori Post</label>
		<select name="category_id" class="form-control" required>
			@foreach($categories as $category)
			<option value="{{ $category->id }}" <?php if($category->id == $post->category_id){echo "selected";}else{echo "";} ?> >{{ $category->category }}</option>
			@endforeach
		</select>
	</div>
	<br>
	<input type="submit" class="btn btn-success pull-right" value="Kirim" />
	<input type="reset" class="btn btn-danger pull-left" value="Batal" />
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

<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#showgambar').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#gambar_post").change(function () {
        readURL(this);
    });
</script>
@stop