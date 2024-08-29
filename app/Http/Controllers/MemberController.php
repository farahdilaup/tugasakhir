<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Exports\MemberExport;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use PDF;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $member = Member::all();
        return view('member.index', compact('member'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('member.create');
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

       Member::create([
            "nama" => $request["nama"],
            "alamat" => $request["alamat"],
            "telepon" => $request["telepon"]
        ]);

        Alert::success('Berhasil', 'Menambahkan Data member');
        return redirect('/master-member');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\member  $member
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $member = Member::find($id);
        return view('member.show', compact('member'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $member = Member::find($id);
        return view('member.edit', compact('member'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'telepon' => 'required'
        ]);

        $member = Member::find($id);

        $data_member = [
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon
        ];

        $member->update($data_member);
        Alert::success('Berhasil', 'Mengubah Data member');
        return redirect('/master-member');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $member = Member::find($id);
        $member->delete();
        Alert::success('Berhasil', 'Menghapus Data member');
        return redirect('/master-member');
    }

    public function pdf()
    {
        $member = Member::all();
        $pdf = PDF::loadview('member.pdf', compact('member'));
        return $pdf->stream('member.pdf');
    }

    public function print()
    {
        $member = Member::all();
        return view('member.print', compact('member'));
    }

    public function pdf_detail($id)
    {
        $member = Member::find($id);
        $pdf = PDF::loadview('member.pdf_detail', compact('member'));
        return $pdf->stream('member_detail.pdf');
    }

    public function print_detail($id)
    {
        $member = Member::find($id);
        return view('member.print_detail', compact('member'));
    }

    public function excel()
    {
        return \Maatwebsite\Excel\Facades\Excel::download(new MemberExport, 'master-member.xlsx');
    }
    // public function cari(Request $request)
    // {
    //     // menangkap data pencarian
    //     $cari = $request->cari;

    //     // mengambil data dari table pegawai sesuai pencarian data
    //     $member = Member::where('nama_barang', 'harga_satuan', $cari);

    //     // mengirim data pegawai ke view index
    //     return view('kategori.index', compact('barang'));
    // }
}