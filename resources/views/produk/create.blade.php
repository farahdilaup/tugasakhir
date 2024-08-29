@extends('layouts.master')
@push('style')
<script src="https://cdn.tiny.cloud/1/uf5lkyxtnybuxubv009ys4y6al6h3c4zghyfd2o1lori9hwx/tinymce/5/tinymce.min.js"
    referrerpolicy="origin"></script>
@endpush
@section('judul')
Bengkel "Sinar Terang Motor"
@endsection
@section('judul_sub')
Tambah Data produk
@endsection
@section('content')
<div class="h2 mb-3 text-center">Tambah Data produk</div>
<hr style="width:75%">
<form action="/master-produk" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="nama_produk">Nama produk</label>
        <input type="text" class="form-control" name="nama_produk" id="nama_produk" placeholder="Masukkan Nama produk">
        @error('nama_produk')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
        @enderror
    </div>

        <div class="form-group">
        <label for="nama_produk">Kategori</label>
        <select name="id_kategori" id="id_kategori" class="form-control" required>
                                <option value="">Pilih Kategori</option>
                                @foreach ($kategori as $key => $item)
                                <option value="{{ $key }}">{{ $item }}</option>
                                @endforeach
        </select>
        @error('id_kategori')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="form-group">
        <label for="merk">Merk</label>
        <input type="text" class="form-control" name="merk" id="merk" placeholder="Masukkan Merk">
        @error('merk')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
        @enderror
    </div>

        <div class="form-group">
        <label for="harga_beli">Harga beli</label>
        <input type="number" class="form-control" name="harga_beli" id="harga_beli" placeholder="Masukkan Harga beli">
        @error('harga_beli')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
        @enderror
    </div>

        <div class="form-group">
        <label for="harga_jual">Harga jual</label>
        <input type="number" class="form-control" name="harga_jual" id="harga_jual" placeholder="Masukkan Harga jual">
        @error('harga_jual')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="form-group">
        <label for="diskon">stok</label>
        <input type="number" class="form-control" name="stok" id="stok" placeholder="Masukkan Nama stok" value="0">
        @error('stok')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Tambah</button>
    <a href="{{ url('master-produk') }}" class="btn btn-danger">Kembali</a>
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
