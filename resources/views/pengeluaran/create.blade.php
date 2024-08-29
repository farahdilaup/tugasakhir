@extends('layouts.master')
@push('style')
<script src="https://cdn.tiny.cloud/1/uf5lkyxtnybuxubv009ys4y6al6h3c4zghyfd2o1lori9hwx/tinymce/5/tinymce.min.js"
    referrerpolicy="origin"></script>
@endpush
@section('judul')
Bengkel "Sinar Terang Motor"
@endsection
@section('judul_sub')
Tambah Data pengeluaran
@endsection
@section('content')
<div class="h2 mb-3 text-center">Tambah Data pengeluaran</div>
<hr style="width:75%">
<form action="/master-pengeluaran" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="deskripsi">Deskripsi</label>
        <input type="text" class="form-control" name="deskripsi" id="deskripsi" placeholder="Masukkan Nama pengeluaran">
        @error('deskripsi')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
        @enderror
    </div>

        <div class="form-group">
        <label for="nominal">Nominal</label>
        <input type="number" class="form-control" name="nominal" id="nominal" placeholder="Masukkan Nama pengeluaran">
        @error('nominal')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Tambah</button>
    <a href="{{ url('master-pengeluaran') }}" class="btn btn-danger">Kembali</a>
</form>
@push('scripts')
<script>
    tinymce.init({
      selector: 'textarea',
      plugins: 'a11ychecker advcode casechange export formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
      toolbar: 'a11ycheck addcomment showcomments casechange checklist code export formatpainter pageembed permanentpen table',
      toolbar_mode: 'floating',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',
   });
</script>
@endpush
@endsection
