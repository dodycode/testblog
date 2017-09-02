@extends('layouts.app')

@section('title', $post->title . ' - ' . config('app.name', 'Laravel'))

@section('judul-header')
<ul class="tag-style">
	@foreach($post->tags as $tag)
		@if($loop->first)
		<li style="margin-left: -37px"><a href="#">{{ $tag->tag }}</a></li>
		@else
		<li><a href="#">{{ $tag->tag }}</a></li>
		@endif
	@endforeach
</ul>
<h1 class="header-text">{{ $post->title }}</h1>
<h3 class="h3-text">Dipost Tanggal {{ $post->created_at->format('j F, Y') }}</h3>
@stop

@section('pages-style')
<style type="text/css">
	body{
		background-color: #fff !important;
		font-family: 'Lora', 'Times New Roman', serif;
		font-size: 20px;
		color: #404040;
	}

	p{
		text-align: justify;
	}

	.header-text{
		margin-top: 0;
		font-size: 40px;
		text-transform: uppercase;
		color: #fff;

	}

	.h3-text{
		font-size: 20px;
		color: #fff;
		font-weight: 100;
	}

	.header-style{
		@if($post->image !== null)
		background: url('{{ asset('img') }}/{{ $post->image }}') fixed no-repeat center center;
		@else
		background: url('{{ asset('img/header-img.jpg') }}') fixed no-repeat center center;
		@endif
		background-size: cover;
		position: relative;
		margin-bottom: 50px;
		height: 500px;
	}

	.tag-style{
		list-style: none;
		font-family: 'Open Sans',arial,sans-serif;
		font-size: 10px;
		margin-top: 280px;
		margin-bottom: 5px;
		line-height: 1;
	}

	.tag-style li{
		display: inline-block;
		margin: 0 5px 5px 0;
		line-height: 1;
	}

	.tag-style li a{
		color: #fff;
		background-color: #4CAF50;
		padding: 6px 8px 6px 8px;
		display: inline-block;
		white-space: nowrap;
	}

	.tag-style li a:hover{
		padding: 8px 10px 8px 10px;
		text-decoration: none;
	}

	.panel.panel-default{
		margin-top: -40px;
	}

	.panel.panel-default{
		border-color: transparent;
		border: none;
		border-radius: 0;
	}

	.panel.panel-default > .panel-heading{
		background-color: transparent;
		border-color: transparent;
		border: none;
		padding: 20px 15px;
	}

	.panel.panel-default .margin-widget{
		margin-bottom: 40px;
	}

	.panel.panel-default .konten-widget-wrapper{
		padding-bottom: 15px;
		position: relative;
	}

	.panel.panel-default .konten-widget-wrapper .widget-img{
		position: absolute;
		left: 0;
		top: 0;
	}

	.panel.panel-default .konten-widget-wrapper .widget-konten{
		margin-left: 116px;
		min-height: 70px;
	}

	.panel.panel-default .panel-body .list-group{
		margin-top: 0;
		margin-bottom: 0;
	}

	.panel.panel-default .konten-widget-wrapper .widget-konten .judul-widget{
		font-size: 14px;
		line-height: 20px;
		margin-bottom: 4px;
		margin-top: 0;
		margin-left: 0;
		margin-right: 0;
	}

	.panel.panel-default .konten-widget-wrapper .widget-konten .konten-tanggal{
		font-size: 11px;
		margin-bottom: 0;
		line-height: 1;
		min-height: 0;
	}

	.panel.panel-default .konten-widget-wrapper .widget-konten .konten-tanggal .tanggal{
		color: #aaa;
		display: inline-block;
		position: relative;
		top: 2px;
	}

	.panel.panel-default > .panel-heading.tags{
		margin-bottom: -30px;
	}

	.widget-fixed{
		top: 90px;
		position: fixed;
		width: 413px;
	}

	@media(max-width: 768px){
		.header-text{
			font-size: 20px;
			margin-left: 37px;
		}

		.header-style{
			margin-bottom: 30px;
		}

		.h3-text{
			font-size: 14px;
			margin-left: 37px;
		}

		.tag-style{
			margin-top: 340px;
		}

		.tag-style li{
			margin-left: 0 !important;
		}

		.panel{
			margin-top: 0 !important;
		}

		.panel.panel-default > .panel-heading.tags{
			margin-bottom: -14px;
		}

		.widget-fixed{
			top: 0;
			position: relative;
		}
	}

	@media(max-width: 750px){
		p{
			font-size: 18px;
		}

		.panel{
			margin-top: 0 !important;
		}

		.col-md-8{
			padding: 0;
		}

		.col-md-4{
			padding: 0;
		}

		.panel.panel-default .margin-widget{
			padding: 0;
		}

		.panel.panel-default > .panel-heading.tags{
			margin-bottom: -14px;
		}

		.widget-fixed{
			top: 0;
			position: relative;
		}

		.panel.panel-default .panel-body .list-group{
			padding: 20px;
			margin-left: -15px;
		}
	}

	@media(min-width: 320px) and (max-width: 320px){
		.tag-style{
			margin-left: -18px;
		}
		.header-text{
			margin-left: 18px;
		}
		.h3-text{
			margin-left: 18px;
		}
	}
</style>
@stop

@section('content')
<div class="container-fluid" id="startchange">
	<div class="col-md-8">
		{!! $post->content !!}
	</div>

	<div class="col-md-4">
		@if(count($posts) > 2)
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3>Latest Posts</h3>
			</div>

			<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 margin-widget">
				@foreach($posts as $postwidget)
				<div class="konten-widget-wrapper">
					<div class="widget-img">
						@if($postwidget->image !== null)
						<img src="{{ asset('img') }}/{{ $postwidget->image }}" style="width: 100px; height: 70px;" />
						@else
						<img src="{{ asset('img/noimg.png') }}" style="width: 100px; height: 70px;" />
						@endif
					</div>
					<div class="widget-konten">
						<h3 class="judul-widget"><a href="/read/{{ $postwidget->slug }}" target="_blank">{{ $postwidget->title }}</a></h3>
						<div class="konten-tanggal">
							<span class="tanggal"><time>{{ $postwidget->created_at->format('j F, Y') }}</time></span>
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>

			@if(count($popularPosts) > 0)
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3>Popular Posts</h3>
				</div>

				<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 margin-widget">
					@foreach($popularPosts as $postwidget)
					<div class="konten-widget-wrapper">
						<div class="widget-img">
							@if($postwidget->image !== null)
							<img src="{{ asset('img') }}/{{ $postwidget->image }}" style="width: 100px; height: 70px;" />
							@else
							<img src="{{ asset('img/noimg.png') }}" style="width: 100px; height: 70px;" />
							@endif
						</div>
						<div class="widget-konten">
							<h3 class="judul-widget"><a href="/read/{{ $postwidget->slug }}" target="_blank">{{ $postwidget->title }}</a></h3>
							<div class="konten-tanggal">
								<span class="tanggal"><time>{{ $postwidget->created_at->format('j F, Y') }}</time></span>
							</div>
						</div>
					</div>
					@endforeach
				</div>
			</div>
			@endif 
		@endif

		@if(count($tags) > 0)
		<div class="panel panel-default">
			<div class="panel-heading tags">
				<h3>Tags</h3>
			</div>
			<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 panel-body margin-widget">
				<ul class="tag-style" style="margin-top: 0; margin-bottom: 0; margin-left: -35px;">
					@foreach($tags as $tag)
						<li><a href="#">{{ $tag->tag }}</a></li>
					@endforeach
				</ul>
			</div>
		</div>
		@endif

		@if(count($categories) > 0)
		<div class="panel panel-default" id="widget-kategori">
			<div class="panel-heading tags">
				<h3>Categories</h3>
			</div>
			<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 panel-body margin-widget">
				<ul class="list-group">
					@foreach($categories as $category)
						<a href="#" class="list-group-item"><span class="badge">{{ $category->posts_count }}</span> {{ $category->category }}</a>
					@endforeach
				</ul>
			</div>
		</div>
		@endif
	</div>
</div>
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
	      if(scroll_start > (offset.top - 540) ) {
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

<script type="text/javascript">
	$(document).ready(function() {
		if($(window).width() > 1024){
			var ks_widget_top = $('#widget-kategori').offset().top;
	        var ks_sticky_widgets = function(){
	            var ks_current_top = $(window).scrollTop() + 30; 

	            if (ks_current_top > ks_widget_top) { 
	              $('#widget-kategori').addClass('widget-fixed');
	            } else {
	              $('#widget-kategori').removeClass('widget-fixed');
	            }   
	        };

	        ks_sticky_widgets();
	        $(window).scroll(function() {
	             ks_sticky_widgets();
	        });	
		}
	});
</script>
@stop