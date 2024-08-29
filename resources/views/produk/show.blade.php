@extends('layouts.master')
@section('judul')
Bengkel "Sinar Terang Motor"
@endsection
@section('judul_sub')
Data Lengkap produk
@endsection
@section('content')
<div class="h2 mb-3 text-center">Data Lengkap produk</div>
<hr style="width:75%">
<div class="card mb-4">
    <div class="card-header">
        Detail Data Lengkap produk
    </div>
    <div class="card-body">
        <div class="mb-3">
            <a href="{{ url('pdf-master-produk-detail') }}/{{ $produk->id }}"><button type="button"
                    class="btn btn-outline-danger"><i class="fas fa-file-pdf"></i></button></a>
            <a href="{{ url('print-master-produk-detail')}}/{{ $produk->id }}"><button type="button"
                    class="btn btn-outline-warning"><i class="fas fa-print"></i></button></a>
        </div>
        <h4 class="card-text"><b>ID produk</b> : {{ $produk->id }}</h4>
            <h4 class="card-text"><b>Id kategori</b> : {{ $produk->id_kategori }}</h4>
            <h4 class="card-text"><b>Nama produk</b> : {{ $produk->nama_produk }}</h4>
            <h4 class="card-text"><b>Merk</b> : {{ $produk->merk }}</h4>
            <h4 class="card-text"><b>Harga jual</b> : {{ $produk->harga_beli }}</h4>
            <h4 class="card-text"><b>Harga beli</b> : {{ $produk->harga_jual }}</h4>
            <h4 class="card-text"><b>Stok</b> : {{ $produk->stok }}</h4>
    </div>
</div>
<a href="{{ url('master-produk') }}" class="btn btn-danger">Kembali</a>
@endsection