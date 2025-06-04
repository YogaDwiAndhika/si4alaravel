<?php

namespace App\Http\Controllers;

use App\Models\Sesi;
use Illuminate\Http\Request;

class SesiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sesi = Sesi::all();
        //dd($sesi);Add commentMore actions

        return view('sesi.index', compact('sesi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sesi.create');
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
        // Validate the request inputAdd commentMore actions
        $input = $request->validate([
            'nama' => 'required|unique:sesi|max:30'
        ]);
        
        Sesi::create($input);
        
        // Redirect to the sesi.index route with a success message
        return redirect()->route('sesi.index')->with('success', 'Data sesi berhasil ditambahkan!');
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sesi  $sesi
     * @return \Illuminate\Http\Response
     */
    public function show(Sesi $sesi)
    {
        //dd($sesi);
        // Show the details of a specific session
        return view('sesi.show', compact('sesi'));
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sesi  $sesi
     * @return \Illuminate\Http\Response
     */
    public function edit(Sesi $sesi)
    {
        //dd($sesi);
        // Show the form to edit a specific session
        return view('sesi.edit', compact('sesi'));
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sesi  $sesi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sesi $sesi)
    {
        $input = $request->validate([
            'nama' => 'required'
        ]);
        
        $sesi->update($input);

        return redirect()->route('sesi.index')->with('success', 'Data sesi berhasil diupdate!');
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sesi  $sesi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sesi $sesi)
    {
        $sesi->delete();

         return redirect()->route('sesi.index')->with('success', 'Data sesi berhasil dihapus!');
        //
    }
}
