<?php

namespace App\Http\Controllers;

use App\Models\Arsip;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class ArsipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
{
    $search = $request->get('search');
    $arsips = Arsip::with('kategori')
                    ->when($search, function($query, $search) {
                        return $query->where('judul', 'like', "%{$search}%");
                    })
                    ->get();

    return view('arsip.index', compact('arsips'));
}



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = Kategori::all();
        return view('arsip.create', compact('kategori'));
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
        'nomor_surat' => 'required|string|max:255',
        'id_kategori' => 'required|exists:kategori,id_kategori',
        'judul' => 'required|string|max:255',
        'file_surat' => 'required|mimes:pdf|max:2048',
    ]);

    if ($request->hasFile('file_surat')) {
        $file = $request->file('file_surat');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('arsip', $fileName, 'public');

        $arsip = new Arsip();
        $arsip->nomor_surat = $request->nomor_surat;
        $arsip->id_kategori = $request->id_kategori; // Ubah ini dari 'kategori' menjadi 'id_kategori'
        $arsip->judul = $request->judul;
        $arsip->file_path = $filePath;
        $arsip->waktu_pengarsipan = now();
        $arsip->save();

        Alert::success('Berhasil', 'Surat berhasil diunggah.');
        return redirect()->route('arsip.index');
    }

    return back()->withErrors(['file_surat' => 'File surat tidak valid atau tidak diunggah.']);
}



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Arsip  $arsip
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $surat = Arsip::findOrFail($id);
        return view('arsip.show', compact('surat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Arsip  $arsip
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $surat = Arsip::findOrFail($id);
        $kategori = Kategori::all();
        return view('arsip.edit', compact('surat', 'kategori'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Arsip  $arsip
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $surat = Arsip::findOrFail($id);

        $surat->nomor_surat = $request->input('nomor_surat');
        $surat->id_kategori = $request->input('id_kategori');
        $surat->judul = $request->input('judul');

        if ($request->hasFile('file_path')) {
            // Proses upload file baru
            $file = $request->file('file_path');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public', $fileName);
            $surat->file_path = $fileName;
        }

        $surat->save();

        Alert::success('Berhasil', 'Surat berhasil diperbarui.');

        return redirect()->route('arsip.show', $surat->id);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Arsip  $arsip
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $arsip = Arsip::findOrFail($id);
        $arsip->delete();

        // Alert success menggunakan SweetAlert2
        Alert::success('Berhasil', 'Arsip berhasil dihapus.');

        return redirect()->route('arsip.index');
    }

    public function download($id)
    {
        $surat = Arsip::findOrFail($id);
        $filePath = storage_path('app/public/' . $surat->file_path);

        return response()->download($filePath);
    }
}
