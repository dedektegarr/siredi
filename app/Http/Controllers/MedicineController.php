<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('medicines.index', [
            'pageTitle' => 'Data Obat',
            'medicines' => Medicine::latest()->get()
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
        $validatedData = $request->validate([
            'nama_obat' => ['required', 'unique:medicines', 'max:50'],
            'stok' => ['required', 'numeric', 'max_digits:11']
        ]);

        Medicine::create($validatedData);

        return redirect()->route('obat.index')->with('success', 'Data berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function show(Medicine $medicine)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function edit(Medicine $medicine)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Medicine $obat)
    {
        $rules = [
            'stok' => ['required', 'numeric', 'max_digits:11']
        ];

        if($obat->nama_obat !== $request->nama_obat) {
            $rules['nama_obat'] = ['required', 'unique:medicines', 'max:50'];
        }

        $validatedData = $request->validate($rules);

        Medicine::where('id_obat', $obat->id_obat)->update($validatedData);

        return redirect()->route('obat.index')->with('success', 'Data berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function destroy(Medicine $obat)
    {
        Medicine::where('id_obat', $obat->id_obat)->delete();

        return back()->with('success', 'Data berhasil dihapus');
    }
}
