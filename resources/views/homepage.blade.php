@extends('layouts.app')

@section('title', config('app.name', 'Laravel'))

@section('judul-header')
<h1 class="text-center header-text">{{ config('app.name', 'Laravel') }}</h1>
<hr class="small">
@stop

@section('content')

@if(count($posts) > 0)
<div class="container" id="startchange"> 
<h2 class="text-center h2-style">Latest Post</h2>
@foreach($posts as $post)
@if($loop->first)
<div class="row">
@endif
	<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 card">
		<div class="thumbnail">
			<div class="img-wrapper">
				@if($post->image !== null)
				<a href="/read/{{$post->slug}}" target="_blank"><img src="{{ asset('img') }}/{{ $post->image }}"></a>
				@else
				<a href="/read/{{$post->slug}}" target="_blank"><img src="{{ asset('img/noimg.png') }}"></a>
				@endif
			</div>
			<div class="caption">
				<h5><a href="/read/{{$post->slug}}" target="_blank">{{ $post->title }}</a></h5>

				<hr>

				<p>
					<?php
						//tinymce sub-string in grid view list
						$konten = $post->content;
						$konten = strip_tags(html_entity_decode($konten));
						$panjangkata = 100;
						if (mb_strlen($konten,'UTF-8')>$panjangkata)
						{
						   $konten = mb_substr($konten, 0, $panjangkata-3, 'UTF-8').'....';
						};
						echo "$konten";
					?>
				</p>
				<a href="/read/{{$post->slug}}" target="_blank" class="btn btn-default">Read More</a>
			</div>
		</div>
	</div>
@if($loop->iteration % 3 == 0 && !$loop->last)
</div>
<br>
<div class="row">
@endif

@if($loop->last)
</div>
@endif
@endforeach

<div class="text-center">
	{{ $posts->links() }}
</div>

</div>
@else
<div class="col-md-12">
	<div class="alert alert-danger">
		<h3 class="text-center">Waduh belum ada ngepost nih gan dimari, hehehe xD</h3>
	</div>
</div>
@endif

@endsection

@section('js')
<script type="text/javascript">
	$(document).ready(function(){       
	   var scroll_start = 0;
	   var startchange = $('#startchange');
	   var offset = startchange.offset();
	    if (startchange.length){
	   $(document).scroll(function() { 
	      scroll_start = $(this).scrollTop();
	      if(scroll_start > (offset.top - 640) ) {
	      	$('#navbar-custom').addClass('navbar-custom-berwarna');
	      	$('.navbar-default .navbar-nav > li a').css('color', 'black');
	      } else {
	       	$('#navbar-custom').removeClass('navbar-custom-berwarna');
	       	$('.navbar-default .navbar-nav > li a').css('color', '');
	      }
	   });
	    }
	});
</script>
@stop