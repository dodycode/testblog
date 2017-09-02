@extends('layouts.adminmenu')
@section('add-ons')
<link rel="stylesheet" type="text/css" href="{{ asset('DataTables/datatables.min.css') }}">
@stop

@section('content')
<div class="row">
    <a href="{{ url('/admin/tags/add') }}" class="btn btn-default pull-right">Tambah Tag</a>
</div>
<br>
<div class="row">
@if($tags > 0)
<div class="table-responsive">
	<table class="table" id="table-tags">
		<thead>
			<th style="width:50px">#</th>
			<th>Tag</th>
            <th style="width:95px">Aksi</th>
		</thead>
	</table>
</div>
@else
<div class="alert alert-danger text-center">Belum ada tag terdaftar!</div>
@endif
</div>
@endsection

@section('js')
<script type="text/javascript" src="{{ asset('DataTables/datatables.min.js') }}"></script>
<script type="text/javascript">
$(function() {
        var oTable = $('#table-tags').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '{{ url("/ajax-tag") }}',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
            },
            columns: [
            {data: 'id', name: 'id'},
            {data: 'tag', name: 'tag',  orderable: false},
            {data: 'action', name: 'action', orderable: false, searchable: false}
        ],
        });
    });
</script>
@stop