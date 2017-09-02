@extends('layouts.adminmenu')
@section('add-ons')
<link rel="stylesheet" type="text/css" href="{{ asset('DataTables/datatables.min.css') }}">
@stop

@section('content')
<div class="row">
    <a href="{{ url('/admin/categories/add') }}" class="btn btn-default pull-right">Tambah Kategori</a>
</div>
<br>
<div class="row">
@if($categories > 0)
<div class="table-responsive">
	<table class="table" id="table-category">
		<thead>
			<th style="width:50px">#</th>
			<th>Category</th>
            <th style="width:95px">Aksi</th>
		</thead>
	</table>
</div>
@else
<div class="alert alert-danger text-center">Belum ada kategori terdaftar!</div>
@endif
</div>
@endsection

@section('js')
<script type="text/javascript" src="{{ asset('DataTables/datatables.min.js') }}"></script>
<script type="text/javascript">
$(function() {
        var oTable = $('#table-category').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '{{ url("/ajax-category") }}',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
            },
            columns: [
            {data: 'id', name: 'id'},
            {data: 'category', name: 'category',  orderable: false},
            {data: 'action', name: 'action', orderable: false, searchable: false}
        ],
        });
    });
</script>
@stop