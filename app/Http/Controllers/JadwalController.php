<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Sesi;
use App\Models\User;
use App\Models\Matakuliah;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jadwal = Jadwal::all();

        return view('jadwal.index', compact('jadwal'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sesi = Sesi::all();
        $matakuliah = Matakuliah::all();
        $users = User::all();

        return view('jadwal.create', compact('sesi', 'matakuliah', 'users'));
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->validate([
            'tahun_akademik' => 'required|max:9',
            'kode_smt' => 'required|max:10',
            'kelas' => 'required|max:50',
            'matakuliah_id' => 'required|exists:matakuliah,id',
            'dosen_id' => 'required|exists:users,id',
            'sesi_id' => 'required|exists:sesi,id'
            
        ]);

        Jadwal::create($input);

        return redirect()->route('jadwal.index')->with('success', 'Data Jadwal berhasil diupdate!');
        
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function show($jadwal)
    {
        //dd($jadwal);
        $jadwal = Jadwal::findOrFail($jadwal);

        return view('jadwal.show', compact('jadwal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function edit($jadwal)
    {
        $sesi = Sesi::all();
        $matakuliah = Matakuliah::all();
        $users = User::all();

        //dd($jadwal);
        $jadwal = Jadwal::findOrFail($jadwal);

        return view('jadwal.edit', compact('jadwal', 'sesi', 'matakuliah', 'users'));
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $jadwal)
    {
        //dd($jadwal);
        $jadwal = Jadwal::findOrFail($jadwal);
        $input = $request->validate([
            'tahun_akademik' => 'required|max:9',
            'kode_smt' => 'required|max:10',
            'kelas' => 'required|max:50',
            'matakuliah_id' => 'required|exists:matakuliah,id',
            'dosen_id' => 'required|exists:users,id',
            'sesi_id' => 'required|exists:sesi,id'
        ]);

        $jadwal->update($input);

        return redirect()->route('jadwal.index')->with('success', 'Data Jadwal berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function destroy($jadwal)
    {
        //dd($jadwal);

        $jadwal = Jadwal::findOrFail($jadwal);

        $jadwal->delete();

        return redirect()->route('jadwal.index')->with('success', 'Data Jadwal berhasil dihapus!');
        //
    }
}
