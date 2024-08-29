@extends('layouts.master')
@push('style')
<script src="https://cdn.tiny.cloud/1/uf5lkyxtnybuxubv009ys4y6al6h3c4zghyfd2o1lori9hwx/tinymce/5/tinymce.min.js"
    referrerpolicy="origin"></script>
@endpush
@section('judul')
Bengkel "Sinar Terang Motor"
@endsection
@section('judul_sub')
Edit Data supplier
@endsection
@section('content')
<div class="h2 mb-3 text-center">Edit Data supplier</div>
<hr style="width:75%">
<form action="/master-supplier/{{ $supplier->id }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="nama">Nama supplier</label>
        <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama supplier"
            value="{{ $supplier->nama }}">
        @error('nama')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
        @enderror
    </div>
        <div class="form-group">
        <label for="alamat">alamat supplier</label>
        <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Masukkan alamat supplier"
            value="{{ $supplier->alamat }}">
        @error('alamat')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
        @enderror
    </div>
        <div class="form-group">
        <label for="telepon">telepon supplier</label>
        <input type="text" class="form-control" name="telepon" id="telepon" placeholder="Masukkan telepon supplier"
            value="{{ $supplier->telepon }}">
        @error('telepon')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Edit</button>
    <a href="{{ url('master-supplier') }}" class="btn btn-danger">Kembali</a>
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
