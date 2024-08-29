@extends('layouts.master')
@section('judul')
Bengkel "Sinar Terang Motor"
@endsection
@section('judul_sub')
Data Lengkap supplier
@endsection
@section('content')
<div class="h2 mb-3 text-center">Data Lengkap supplier</div>
<hr style="width:75%">
<div class="card mb-4">
    <div class="card-header">
        Detail Data Lengkap supplier
    </div>
    <div class="card-body">
        <div class="mb-3">
            <a href="{{ url('pdf-master-supplier-detail') }}/{{ $supplier->id }}"><button type="button"
                    class="btn btn-outline-danger"><i class="fas fa-file-pdf"></i></button></a>
            <a href="{{ url('print-master-supplier-detail')}}/{{ $supplier->id }}"><button type="button"
                    class="btn btn-outline-warning"><i class="fas fa-print"></i></button></a>
        </div>
        <h4 class="card-text"><b>ID supplier</b> : {{ $supplier->id_supplier }}</h4>
        <h4 class="card-text"><b>Nama supplier</b> : {{ $supplier->nama}}</h4>
        <h4 class="card-text"><b>alamat supplier</b> : {{ $supplier->alamat}}</h4>
        <h4 class="card-text"><b>telepon supplier</b> : {{ $supplier->telepon }}</h4>
    </div>
</div>
<a href="{{ url('master-supplier') }}" class="btn btn-danger">Kembali</a>
@endsection