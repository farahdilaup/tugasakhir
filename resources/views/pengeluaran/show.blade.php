@extends('layouts.master')
@section('judul')
Bengkel "Sinar Terang Motor"
@endsection
@section('judul_sub')
Data Lengkap pengeluaran
@endsection
@section('content')
<div class="h2 mb-3 text-center">Data Lengkap pengeluaran</div>
<hr style="width:75%">
<div class="card mb-4">
    <div class="card-header">
        Detail Data Lengkap pengeluaran
    </div>
    <div class="card-body">
        <div class="mb-3">
            <a href="{{ url('pdf-master-pengeluaran-detail') }}/{{ $pengeluaran->id }}"><button type="button"
                    class="btn btn-outline-danger"><i class="fas fa-file-pdf"></i></button></a>
            <a href="{{ url('print-master-pengeluaran-detail')}}/{{ $pengeluaran->id }}"><button type="button"
                    class="btn btn-outline-warning"><i class="fas fa-print"></i></button></a>
        </div>
        <h4 class="card-text"><b>ID pengeluaran</b> : {{ $pengeluaran->id }}</h4>
        <h4 class="card-text"><b>Deskripsi</b> : {{ $pengeluaran->deskripsi }}</h4>
            <h4 class="card-text"><b>Nonimal</b> : {{ $pengeluaran->nominal }}</h4>
    </div>
</div>
<a href="{{ url('master-pengeluaran') }}" class="btn btn-danger">Kembali</a>
@endsection