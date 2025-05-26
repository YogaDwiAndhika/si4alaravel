<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use Illuminate\Http\Request;

class FakultasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // panggil model fakultas menggunakan eloquent
        $fakultas = Fakultas::all(); // perintah SQL select * from fakultas
        // dd($fakultas); // dump and die
        return view('fakultas.index', compact('fakultas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $fakultas = Fakultas::all();
        return view('fakultas.create', compact('fakultas'));
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
            'nama' => 'required|unique:fakultas',
            'singkatan' => 'required|max:5',
            'dekan' => 'required',
            'wakil_dekan' => 'required',
        ]);
        //simpan data ke database
        Fakultas::create($input);
        //redirect ke halaman fakultas
        return redirect()->route('fakultas.index')->with('success', 'Data Fakultas Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fakultas  $fakultas
     * @return \Illuminate\Http\Response
     */
    public function show(Fakultas $fakultas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fakultas  $fakultas
     * @return \Illuminate\Http\Response
     */
    public function edit(Fakultas $fakultas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fakultas  $fakultas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fakultas $fakultas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fakultas  $fakultas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fakultas $fakultas)
    {
        //
    }
}
