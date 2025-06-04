<?php

namespace App\Http\Controllers;

use App\Models\Matakuliah;
use App\Models\Prodi;
use Illuminate\Http\Request;

class MatakuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $matakuliah = Matakuliah::all();
        
        return view('matakuliah.index')->with('matakuliah', $matakuliah);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $prodi = Prodi::all();

        return view('matakuliah.create', compact('prodi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi inputAdd commentMore actions
        $input = $request->validate([
            'kode_mk' => 'required|unique:matakuliah',
            'nama' => 'required|max:100',
            'prodi_id' => 'required|exists:prodi,id'
        ]);
        
        Matakuliah::create($input);

        return redirect()->route('matakuliah.index')->with('success', 'Data matakuliah berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Matakuliah  $matakuliah
     * @return \Illuminate\Http\Response
     */
    public function show(Matakuliah $matakuliah)
    {
        return view('matakuliah.show', compact('matakuliah'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Matakuliah  $matakuliah
     * @return \Illuminate\Http\Response
     */
    public function edit(Matakuliah $matakuliah)
    {
        $prodi = Prodi::all();
        //dd($matakuliah);
        return view('matakuliah.edit', compact('matakuliah', 'prodi'));
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Matakuliah  $matakuliah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Matakuliah $matakuliah)
    {
        //dd($matakuliah);Add commentMore actions
        
        $input = $request->validate([
            'kode_mk' => 'required|unique:matakuliah',
            'nama' => 'required|max:100',
            'prodi_id' => 'required|exists:prodi,id'
        ]);
        
        $matakuliah->update($input);

        return redirect()->route('matakuliah.index')->with('success', 'Data Matakuliah berhasil ditambahkan!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Matakuliah  $matakuliah
     * @return \Illuminate\Http\Response
     */
    public function destroy(Matakuliah $matakuliah)
    {
        //dd($matakuliah);Add commentMore actions
        $matakuliah->delete();

        return redirect()->route('matakuliah.index')->with('success', 'Data Matakuliah berhasil dihapus!');
        //
    }
}
