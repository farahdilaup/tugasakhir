<?php

namespace App\Http\Controllers;

use App\Models\Pengeluaran;
use App\Exports\PengeluaranExport;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use PDF;

class PengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengeluaran = Pengeluaran::all();
        return view('pengeluaran.index', compact('pengeluaran'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pengeluaran.create');
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
            'deskripsi' => 'required',
            'nominal' => 'required'
        ]);

        Pengeluaran::create([
            "deskripsi" => $request["deskripsi"],
            "nominal" => $request["nominal"]
        ]);

        Alert::success('Berhasil', 'Menambahkan Data pengeluaran');
        return redirect('/master-pengeluaran');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pengeluaran  $pengeluaran
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pengeluaran = Pengeluaran::find($id);
        return view('pengeluaran.show', compact('pengeluaran'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pengeluaran  $pengeluaran
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pengeluaran = Pengeluaran::find($id);
        return view('pengeluaran.edit', compact('pengeluaran'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pengeluaran  $pengeluaran
     * @return \Illuminate\Http\Response
     */
    public function update(request $request, $id)
    {
        $request->validate([
            'deskripsi' => 'required',
            'nominal' => 'required'
        ]);

        $pengeluaran = Pengeluaran::find($id);

        $data_pengeluaran = [
            'deskripsi' => $request->deskripsi,
            'nominal' => $request->nominal
        ];

        $pengeluaran->update($data_pengeluaran);
        Alert::success('Berhasil', 'Mengubah Data pengeluaran');
        return redirect('/master-pengeluaran');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pengeluaran  $pengeluaran
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pengeluaran = Pengeluaran::find($id);
        $pengeluaran->delete();
        Alert::success('Berhasil', 'Menghapus Data pengeluaran');
        return redirect('/master-pengeluaran');
    }

    public function pdf()
    {
        $pengeluaran = Pengeluaran::all();
        $pdf = PDF::loadview('pengeluaran.pdf', compact('pengeluaran'));
        return $pdf->stream('pengeluaran.pdf');
    }

    public function print()
    {
        $pengeluaran = Pengeluaran::all();
        return view('pengeluaran.print', compact('pengeluaran'));
    }

    public function pdf_detail($id)
    {
        $pengeluaran = Pengeluaran::find($id);
        $pdf = PDF::loadview('pengeluaran.pdf_detail', compact('pengeluaran'));
        return $pdf->stream('pengeluaran_detail.pdf');
    }

    public function print_detail($id)
    {
        $pengeluaran = Pengeluaran::find($id);
        return view('pengeluaran.print_detail', compact('pengeluaran'));
    }

    public function excel()
    {
        return \Maatwebsite\Excel\Facades\Excel::download(new pengeluaranExport, 'master-pengeluaran.xlsx');
    }
    // public function cari(Request $request)
    // {
    //     // menangkap data pencarian
    //     $cari = $request->cari;

    //     // mengambil data dari table pegawai sesuai pencarian data
    //     $pengeluaran = Pengeluaran::where('nama_barang', 'harga_satuan', $cari);

    //     // mengirim data pegawai ke view index
    //     return view('pengeluaran.index', compact('barang'));
    // }
}