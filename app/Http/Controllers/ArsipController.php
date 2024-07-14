<?php

namespace App\Http\Controllers;

use App\Models\Arsip;
use Illuminate\Http\Request;

class ArsipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $arsips = Arsip::all();
        return view('arsip.index', compact('arsips'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('arsip.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi data yang dikirimkan dari form
        $request->validate([
            'nomor_surat' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'judul' => 'required|string|max:255',
            'file_surat' => 'required|mimes:pdf|max:2048', // Hanya menerima file PDF dengan ukuran maksimum 2MB
        ]);

        // Proses penyimpanan data
        $file = $request->file('file_surat');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('arsip', $fileName, 'public');

        // Buat entry baru dalam database menggunakan model Arsip
        $arsip = new Arsip();
        $arsip->nomor_surat = $request->nomor_surat;
        $arsip->kategori = $request->kategori;
        $arsip->judul = $request->judul;
        $arsip->file_path = $filePath; // Simpan path file surat dalam database
        $arsip->waktu_pengarsipan = now();
        $arsip->save();

        // Redirect dengan pesan sukses jika berhasil
        return redirect()->route('arsip.index')->with('success', 'Surat berhasil diunggah dan diarsipkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Arsip  $arsip
     * @return \Illuminate\Http\Response
     */
    public function show(Arsip $arsip)
    {
        return view('arsip.show', compact('surat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Arsip  $arsip
     * @return \Illuminate\Http\Response
     */
    public function edit(Arsip $arsip)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Arsip  $arsip
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Arsip $arsip)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Arsip  $arsip
     * @return \Illuminate\Http\Response
     */
    public function destroy(Arsip $arsip)
    {
        $arsip->delete();

        return redirect()->route('arsip.index')
            ->with('success', 'Arsip berhasil dihapus.');
    }
}
