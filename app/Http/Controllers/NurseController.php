<?php

namespace App\Http\Controllers;

use App\Models\Nurse;
use Illuminate\Http\Request;

class NurseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('nurses.index', [
            'pageTitle' => 'Data Perawat',
            'nurses' => Nurse::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Nurse  $nurse
     * @return \Illuminate\Http\Response
     */
    public function show(Nurse $perawat)
    {
        return view('nurses.detail', [
            'pageTitle' => $perawat->nama,
            'nurse' => $perawat
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Nurse  $nurse
     * @return \Illuminate\Http\Response
     */
    public function edit(Nurse $perawat)
    {
        // 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Nurse  $nurse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nurse $nurse)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Nurse  $nurse
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nurse $perawat)
    {
        Nurse::where('id_perawat', $perawat->id_perawat)->delete();
        return redirect()->route('perawat.index')->with('success', "Data <strong>$perawat->nama</strong> berhasil dihapus");
    }
}
