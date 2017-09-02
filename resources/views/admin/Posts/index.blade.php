@extends('layouts.adminmenu')
@section('add-ons')
<link rel="stylesheet" type="text/css" href="{{ asset('DataTables/datatables.min.css') }}">
@stop

@section('content')
<div class="row">
    <a href="{{ url('/admin/posts/add') }}" class="btn btn-default pull-right">Tambah Posts</a>
</div>
<br>
<div class="row">
@if($categories > 0)
    @if($tags > 0)
        @if($posts > 0)
        <div class="table-responsive">
            <table class="table" id="table-posts">
                <thead>
                    <th>#</th>
                    <th>Judul Post</th>
                    <th>Kategori Post</th>
                    <th class="text-center" style="width:125px">Aksi</th>
                </thead>
            </table>
        </div>
        @else
        <div class="alert alert-danger text-center">Belum ada post terdaftar!</div>
        @endif
    @else
    <div class="alert alert-danger text-center">Dimohon untuk mengisi daftar tag dulu, sebelum membuat post!</div>
    @endif
@else
<div class="alert alert-danger text-center">Dimohon untuk mengisi daftar kategori dulu, sebelum membuat post!</div>
@endif
</div>
@endsection

@section('js')
<script type="text/javascript" src="{{ asset('DataTables/datatables.min.js') }}"></script>
<script type="text/javascript">
$(function() {
        var oTable = $('#table-posts').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '{{ url("/ajax-post") }}',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
            },
            columns: [
            {data: 'id', name: 'id'},
            {data: 'title', name: 'judul',  orderable: false},
            {data: 'category', name: 'kategori',  orderable: false},
            {data: 'action', name: 'action', orderable: false, searchable: false}
        ],
        });
    });
</script>
@stop