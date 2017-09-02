@extends('layouts.adminmenu')
@section('add-ons')
<link rel="stylesheet" type="text/css" href="{{ asset('DataTables/datatables.min.css') }}">
@stop

@section('content')
<div class="row">
    <a href="{{ url('/admin/pages/add') }}" class="btn btn-default pull-right">Tambah Page</a>
</div>
<br>
<div class="row">
@if($pagesCount > 0)
<div class="table-responsive">
	<table class="table" id="table-pages">
		<thead>
			<th>#</th>
			<th>Slug</th>
			<th>Judul</th>
            <th class="text-center" style="width:95px">Aksi</th>
		</thead>
	</table>
</div>
@else
<div class="alert alert-danger text-center">Belum ada page terdaftar!</div>
@endif
</div>
@endsection

@section('js')
<script type="text/javascript" src="{{ asset('DataTables/datatables.min.js') }}"></script>
<script type="text/javascript">
$(function() {
        var oTable = $('#table-pages').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '{{ url("/ajax-page") }}',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
            },
            columns: [
            {data: 'id', name: 'id'},
            {data: 'slug', name: 'slug',  orderable: false},
            {data: 'title', name: 'judul',  orderable: false},
            {data: 'action', name: 'action', orderable: false, searchable: false}
        ],
        });
    });
</script>
@stop