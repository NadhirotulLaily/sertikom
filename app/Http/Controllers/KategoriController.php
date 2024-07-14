<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $kategori = Kategori::when($search, function ($query, $search) {
            return $query->where('keterangan', 'like', "%{$search}%");
        })->get();

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
        // Validasi data yang dikirimkan dari formulir
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'keterangan' => 'required|string|max:255',
        ]);

        // Buat entri baru dalam database menggunakan model Kategori
        Kategori::create([
            'nama_kategori' => $request->nama_kategori,
            'keterangan' => $request->keterangan,
        ]);

        // Alert success menggunakan SweetAlert2
        Alert::success('Berhasil', 'Kategori berhasil ditambahkan.');

        // Redirect dengan pesan sukses
        return redirect()->route('kategori.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function show(Kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function edit($id_kategori)
    {
        $kategori = Kategori::findOrFail($id_kategori);
        return view('kategori.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_kategori)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'keterangan' => 'required|string',
        ]);

        $kategori = Kategori::findOrFail($id_kategori);
        $kategori->nama_kategori = $request->input('nama_kategori');
        $kategori->keterangan = $request->input('keterangan');
        $kategori->save();

        // Alert success menggunakan SweetAlert2
        Alert::success('Berhasil', 'Kategori berhasil diperbarui.');

        return redirect()->route('kategori.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_kategori)
    {
        $kategori = Kategori::findOrFail($id_kategori);
        $kategori->delete();

        // Alert success menggunakan SweetAlert2
        Alert::success('Berhasil', 'Kategori berhasil dihapus.');

        return redirect()->route('kategori.index');
    }
}
