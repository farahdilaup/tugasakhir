<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use App\Exports\ProdukExport;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use PDF;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $produk = Produk::all();
         $kategori = Kategori::all()->pluck('nama_kategori', 'id_kategori');
        return view('produk.index', compact('produk','kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $produk = Produk::all();
        $kategori = Kategori::all()->pluck('nama_kategori', 'id_kategori');

        return view('produk.create', compact('produk', 'kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $produk = Produk::latest()->first() ?? new Produk();

        $produk = Produk::create($request->all());

        Alert::success('Berhasil', 'Menambahkan Data produk');
        return redirect('/master-produk');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kategori  $Kategori
     * @return \Illuminate\Http\Response
     */
    public function show($id_produk)
    {
        $produk = Produk::find($id_produk);

        $kategori = Kategori::all()->pluck('nama_kategori', 'id_kategori');
        return view('produk.show', compact('produk','kategori'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produk = Produk::find($id);
        
        $kategori = Kategori::all()->pluck('nama_kategori', 'id_kategori');
        return view('produk.edit', compact('produk','kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(request $request, $id)
    {
        $request->validate([
            'id_kategori' => 'required',
            'nama_produk' => 'required',
            'merk' => 'required',
            'harga_jual' => 'required',
            'harga_beli' => 'required',
            'stok' => 'required'
        ]);

        $produk = Produk::find($id);

        $data_produk = [
            'id_kategori' => $request->id_kategori,
            'nama_produk' => $request->nama_produk,
            'merk' => $request->merk,
            'harga_jual' => $request->harga_jual,
            'harga_beli' => $request->harga_beli,
            'stok' => $request->stok
        ];

        $produk->update($data_produk);
        Alert::success('Berhasil', 'Mengubah Data produk');
        return redirect('/master-produk');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kategori  $Kategori
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produk = Produk::find($id);
        $produk->delete();
        Alert::success('Berhasil', 'Menghapus Data produk');
        return redirect('/master-produk');
    }

    public function pdf()
    {
        $produk = Produk::all();
        $pdf = PDF::loadview('produk.pdf', compact('produk'));
        return $pdf->stream('produk.pdf');
    }

    public function print()
    {
        $produk = Produk::all();
        return view('produk.print', compact('produk'));
    }

    public function pdf_detail($id)
    {
        $produk = Produk::find($id);
        $pdf = PDF::loadview('produk.pdf_detail', compact('produk'));
        return $pdf->stream('produk_detail.pdf');
    }

    public function print_detail($id)
    {
        $produk = Produk::find($id);
        return view('produk.print_detail', compact('produk'));
    }

    public function excel()
    {
        return \Maatwebsite\Excel\Facades\Excel::download(new ProdukExport, 'master-produk.xlsx');
    }

    // public function cari(Request $request)
    // {
    //     // menangkap data pencarian
    //     $cari = $request->cari;

    //     // mengambil data dari table pegawai sesuai pencarian data
    //     $kategori = Produk::where('nama_barang', 'harga_satuan', $cari);

    //     // mengirim data pegawai ke view index
    //     return view('kategori.index', compact('barang'));
    // }
}