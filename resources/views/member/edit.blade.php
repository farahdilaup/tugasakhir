@extends('layouts.master')
@push('style')
<script src="https://cdn.tiny.cloud/1/uf5lkyxtnybuxubv009ys4y6al6h3c4zghyfd2o1lori9hwx/tinymce/5/tinymce.min.js"
    referrerpolicy="origin"></script>
@endpush
@section('judul')
Bengkel "Sinar Terang Motor"
@endsection
@section('judul_sub')
Edit Data member
@endsection
@section('content')
<div class="h2 mb-3 text-center">Edit Data member</div>
<hr style="width:75%">
<form action="/master-member/{{ $member->id }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="nama">Nama member</label>
        <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama member"
            value="{{ $member->nama }}">
        @error('nama')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
        @enderror
    </div>
        <div class="form-group">
        <label for="alamat">alamat member</label>
        <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Masukkan alamat member"
            value="{{ $member->alamat }}">
        @error('alamat')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
        @enderror
    </div>
        <div class="form-group">
        <label for="telepon">telepon member</label>
        <input type="text" class="form-control" name="telepon" id="telepon" placeholder="Masukkan telepon member"
            value="{{ $member->telepon }}">
        @error('telepon')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Edit</button>
    <a href="{{ url('master-member') }}" class="btn btn-danger">Kembali</a>
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
