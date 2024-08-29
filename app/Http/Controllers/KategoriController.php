<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Exports\KategoriExport;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use PDF;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori = Kategori::all();
        return view('kategori.index', compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required'
        ]);

        Kategori::create([
            "nama_kategori" => $request["nama_kategori"]
        ]);

        Alert::success('Berhasil', 'Menambahkan Data kategori');
        return redirect('/master-kategori');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kategori  $Kategori
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kategori = Kategori::find($id);
        return view('kategori.show', compact('kategori'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kategori  $Kategori
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kategori = Kategori::find($id);
        return view('kategori.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kategori  $Kategori
     * @return \Illuminate\Http\Response
     */
    public function update(request $request, $id)
    {
        $request->validate([
            'nama_kategori' => 'required',
        ]);

        $kategori = Kategori::find($id);

        $data_kategori = [
            'nama_kategori' => $request->nama_kategori,
        ];

        $kategori->update($data_kategori);
        Alert::success('Berhasil', 'Mengubah Data kategori');
        return redirect('/master-kategori');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kategori  $Kategori
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kategori = Kategori::find($id);
        $kategori->delete();
        Alert::success('Berhasil', 'Menghapus Data kategori');
        return redirect('/master-kategori');
    }

    public function pdf()
    {
        $kategori = Kategori::all();
        $pdf = PDF::loadview('kategori.pdf', compact('kategori'));
        return $pdf->stream('kategori.pdf');
    }

    public function print()
    {
        $kategori = Kategori::all();
        return view('kategori.print', compact('kategori'));
    }

    public function pdf_detail($id)
    {
        $kategori = Kategori::find($id);
        $pdf = PDF::loadview('kategori.pdf_detail', compact('kategori'));
        return $pdf->stream('kategori_detail.pdf');
    }

    public function print_detail($id)
    {
        $kategori = Kategori::find($id);
        return view('kategori.print_detail', compact('kategori'));
    }

    public function excel()
    {
        return \Maatwebsite\Excel\Facades\Excel::download(new KategoriExport, 'master-kategori.xlsx');
    }
    // public function cari(Request $request)
    // {
    //     // menangkap data pencarian
    //     $cari = $request->cari;

    //     // mengambil data dari table pegawai sesuai pencarian data
    //     $kategori = Kategori::where('nama_barang', 'harga_satuan', $cari);

    //     // mengirim data pegawai ke view index
    //     return view('kategori.index', compact('barang'));
    // }
}