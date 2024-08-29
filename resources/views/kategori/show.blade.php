@extends('layouts.master')
@section('judul')
Bengkel "Sinar Terang Motor"
@endsection
@section('judul_sub')
Data Lengkap kategori
@endsection
@section('content')
<div class="h2 mb-3 text-center">Data Lengkap kategori</div>
<hr style="width:75%">
<div class="card mb-4">
    <div class="card-header">
        Detail Data Lengkap kategori
    </div>
    <div class="card-body">
        <div class="mb-3">
            <a href="{{ url('pdf-master-kategori-detail') }}/{{ $kategori->id_kategori }}"><button type="button"
                    class="btn btn-outline-danger"><i class="fas fa-file-pdf"></i></button></a>
            <a href="{{ url('print-master-kategori-detail')}}/{{ $kategori->id_kategori }}"><button type="button"
                    class="btn btn-outline-warning"><i class="fas fa-print"></i></button></a>
        </div>
        <h4 class="card-text"><b>ID kategori</b> : {{ $kategori->id_kategori }}</h4>
        <h4 class="card-text"><b>Nama kategori</b> : {{ $kategori->nama_kategori }}</h4>
    </div>
</div>
<a href="{{ url('master-kategori') }}" class="btn btn-danger">Kembali</a>
@endsection