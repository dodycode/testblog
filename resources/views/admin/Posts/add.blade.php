@extends('layouts.adminmenu')

@section('add-ons')
<script src="{{ asset('tinymce/js/tinymce.min.js') }}"></script>
@stop

@section('content')
<form action="{{ url('store-post') }}" method="POST" enctype="multipart/form-data">
	{!! csrf_field() !!}
	<div class="form-group">
		<label>Judul Post</label>
		<input type="text" name="title" class="form-control" required autofocus>
	</div>
	<div class="form-group">
        <img src="{{asset('img/noimg.jpg')}}" id="showgambar" class="img-responsive" style="max-width: 300px; max-height: 300px;" />
    </div>
	<div class="form-group">
		<label>Gambar Post</label>
        <input id="gambar_post" name="image" type="file" />
        <small>Cover dapat dikosongkan kalau memang tidak ada gambar cover untuk post nya</small>
	</div>
	<div class="form-group">
		<label>Isi Post</label>
		<textarea id="konten" name="content" style="resize: none"></textarea>
	</div>
	<div class="form-group">
		<label>Kategori Post</label>
		<select name="category_id" class="form-control" required>
			<option value="" hidden selected>Pilih Kategori</option>
			@foreach($categories as $category)
			<option value="{{ $category->id }}">{{ $category->category }}</option>
			@endforeach
		</select>
	</div>
	<div class="form-group">
		<label>Tag Post</label>
		<select multiple="multiple" name="tag_id[]" class="form-control" required>
            @foreach($tags as $tag)
            <option value="{{ $tag->id }}">{{ $tag->tag }}</option>
            @endforeach
        </select>
        <small>Jika ingin memilih lebih dari 1 tag, silahkan pilih sambil ditekan tombol 'CTRL' di keyboard</small>
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