<?php

namespace App\Http\Controllers;

use App\Models\Arsip;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            'kategori' => 'required|integer', // Make sure there is a 'kategori' field in the form
            'judul' => 'required|string|max:255',
            'file_surat' => 'required|mimes:pdf|max:2048',
        ]);
    
        // Process file upload
        if ($request->hasFile('file_surat')) {
            $file = $request->file('file_surat');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('arsip', $fileName, 'public');
    
            // Save data to the database
            $arsip = new Arsip();
            $arsip->nomor_surat = $request->nomor_surat;
            $arsip->kategori = $request->kategori;
            $arsip->judul = $request->judul;
            $arsip->file_path = $filePath; // Store the file path
            $arsip->waktu_pengarsipan = now();
            $arsip->save();
    
            // Redirect to index page with success message
            return redirect()->route('arsip.index')->with('success', 'Surat berhasil diunggah.');
        }
    
        // Handle case where file was not uploaded
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
        return view('arsip.edit', compact('surat'));
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

    public function download($id)
{
    $surat = Arsip::findOrFail($id);
    $filePath = storage_path('app/public/' . $surat->file_path);

    return response()->download($filePath);
}
}
