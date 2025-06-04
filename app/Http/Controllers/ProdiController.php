<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use App\Models\Prodi;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prodi = Prodi::all(); // perintah SQL select * from prodi
        // dd($prodi); // dump and die
        return view('prodi.index')->with('prodi', $prodi);
    } 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $fakultas = Fakultas    ::all();
        return view('prodi.create', compact('fakultas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validasi data
        $input = $request->validate([
            'nama' => 'required|unique:prodi',
            'singkatan' => 'required|max:5',
            'kaprodi' => 'required',
            'sekprodi' => 'required',
            'fakultas_id' => 'required',
        ]);
        //simpan data ke database
        Prodi::create($input);
        //redirect ke halaman prodi
        return redirect()->route('prodi.index')->with('success', 'Data Prodi Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Prodi  $prodi
     * @return \Illuminate\Http\Response
     */
    public function show(Prodi $prodi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Prodi  $prodi
     * @return \Illuminate\Http\Response
     */
    public function edit($prodi)
    {
        // ambil data prodi berdasarkan id
        $prodi = Prodi::findOrFail($prodi);
        // ambil data fakultas untuk dropdown
        $fakultas = Fakultas::all();
        // tampilkan form edit
        return view('prodi.edit', compact('prodi', 'fakultas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Prodi  $prodi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $prodi)
    {
        $prodi = Prodi::findOrFail($prodi);
        //validasi data
        $input = $request->validate([
            'nama' => 'required',
            'singkatan' => 'required|max:5',
            'kaprodi' => 'required',
            'sekprodi' => 'required',
            'fakultas_id' => 'required',
        ]);
        //update data ke database
        $prodi->update($input);
        //redirect ke halaman prodi
        return redirect()->route('prodi.index')->with('success', 'Data Prodi Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Prodi  $prodi
     * @return \Illuminate\Http\Response
     */
    public function destroy($prodi)
    {
        $prodi = Prodi::findOrFail($prodi);
        //hapus data prodi
        $prodi->delete();
        //redirect ke halaman prodi
        return redirect()->route('prodi.index')->with('success', 'Data Prodi Berhasil Dihapus');
    }
}
