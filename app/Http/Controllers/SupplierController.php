<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use App\Exports\SupplierExport;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use PDF;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supplier = Supplier::all();
        return view('supplier.index', compact('supplier'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('supplier.create');
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
            'nama' => 'required',
            'alamat' => 'required',
            'telepon' => 'required'
        ]);

       Supplier::create([
            "nama" => $request["nama"],
            "alamat" => $request["alamat"],
            "telepon" => $request["telepon"]
        ]);

        Alert::success('Berhasil', 'Menambahkan Data supplier');
        return redirect('/master-supplier');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $supplier = Supplier::find($id);
        return view('supplier.show', compact('supplier'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $supplier = Supplier::find($id);
        return view('supplier.edit', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'telepon' => 'required'
        ]);

        $supplier = Supplier::find($id);

        $data_supplier = [
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon
        ];

        $supplier->update($data_supplier);
        Alert::success('Berhasil', 'Mengubah Data supplier');
        return redirect('/master-supplier');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $supplier = Supplier::find($id);
        $supplier->delete();
        Alert::success('Berhasil', 'Menghapus Data supplier');
        return redirect('/master-supplier');
    }

    public function pdf()
    {
        $supplier = Supplier::all();
        $pdf = PDF::loadview('supplier.pdf', compact('supplier'));
        return $pdf->stream('supplier.pdf');
    }

    public function print()
    {
        $supplier = Supplier::all();
        return view('supplier.print', compact('supplier'));
    }

    public function pdf_detail($id)
    {
        $supplier = Supplier::find($id);
        $pdf = PDF::loadview('supplier.pdf_detail', compact('supplier'));
        return $pdf->stream('supplier_detail.pdf');
    }

    public function print_detail($id)
    {
        $supplier = Supplier::find($id);
        return view('supplier.print_detail', compact('supplier'));
    }

    public function excel()
    {
        return \Maatwebsite\Excel\Facades\Excel::download(new SupplierExport, 'master-supplier.xlsx');
    }
    // public function cari(Request $request)
    // {
    //     // menangkap data pencarian
    //     $cari = $request->cari;

    //     // mengambil data dari table pegawai sesuai pencarian data
    //     $supplier = Supplier::where('nama_barang', 'harga_satuan', $cari);

    //     // mengirim data pegawai ke view index
    //     return view('kategori.index', compact('barang'));
    // }
}