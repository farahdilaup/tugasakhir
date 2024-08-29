@extends('layouts.master')
@section('judul')
Bengkel "Sinar Terang Motor"
@endsection
@section('judul_sub')
Data Lengkap member
@endsection
@section('content')
<div class="h2 mb-3 text-center">Data Lengkap member</div>
<hr style="width:75%">
<div class="card mb-4">
    <div class="card-header">
        Detail Data Lengkap member
    </div>
    <div class="card-body">
        <div class="mb-3">
            <a href="{{ url('pdf-master-member-detail') }}/{{ $member->id }}"><button type="button"
                    class="btn btn-outline-danger"><i class="fas fa-file-pdf"></i></button></a>
            <a href="{{ url('print-master-member-detail')}}/{{ $member->id }}"><button type="button"
                    class="btn btn-outline-warning"><i class="fas fa-print"></i></button></a>
        </div>
        <h4 class="card-text"><b>ID member</b> : {{ $member->id_member }}</h4>
        <h4 class="card-text"><b>Nama member</b> : {{ $member->nama}}</h4>
        <h4 class="card-text"><b>alamat member</b> : {{ $member->alamat}}</h4>
        <h4 class="card-text"><b>telepon member</b> : {{ $member->telepon }}</h4>
    </div>
</div>
<a href="{{ url('master-member') }}" class="btn btn-danger">Kembali</a>
@endsection