<?php

namespace App\Http\Controllers;

use App\Models\MedicalRecord;
use App\Models\Queue;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MedicalRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            'id_pasien' => ['required', 'size:5'],
            'id_dokter' => ['required', 'size:5'],
            'id_poli' => ['required', 'size:5'],
            'sistole' => ['required', 'numeric', 'max_digits:3'],
            'diastole' => ['required', 'numeric', 'max_digits:3'],
            'gula_darah' => ['required', 'numeric', 'max_digits:3'],
            'alergi' => ['nullable', 'max:100'],
            'keluhan' => ['required'],
            'diagnosis' => ['required'],
            'terapi' => ['required']
        ]);

        $validatedData['tgl_periksa'] = Carbon::now();

        MedicalRecord::create($validatedData);

        // update patient check status
        $queue = Queue::where('id_antrian', $request->id_antrian)->first();
        $queue->update([
            'status' => 1
        ]);

        // return Queue::where('id_antrian', $request->id_antrian)->get();
        return redirect()->route('antrian.index')->with('success', 'Pasien dengan nama <strong>' . $queue->patient->nama . '</strong> berhasil di periksa');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MedicalRecord  $medicalRecord
     * @return \Illuminate\Http\Response
     */
    public function show(MedicalRecord $medicalRecord)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MedicalRecord  $medicalRecord
     * @return \Illuminate\Http\Response
     */
    public function edit(MedicalRecord $medicalRecord)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MedicalRecord  $medicalRecord
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MedicalRecord $medicalRecord)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MedicalRecord  $medicalRecord
     * @return \Illuminate\Http\Response
     */
    public function destroy(MedicalRecord $medicalRecord)
    {
        //
    }
}
