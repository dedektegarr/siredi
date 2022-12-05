<?php

namespace App\Http\Controllers;

use App\Models\MedicalPrescription;
use App\Models\MedicalRecord;
use App\Models\Patient;
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
        $validatedMedRecord = $request->validate([
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

        $validatedMedRecord['tgl_periksa'] = Carbon::now();

        MedicalRecord::create($validatedMedRecord);

        // get id in latest medical record
        $latest_med_record = MedicalRecord::latest()->first();

        // validate medical prescription
        $validatedMedPrescription = $request->validate([
            'id_obat' => ['required', 'numeric'],
            'jumlah' => ['required', 'numeric'],
            'aturan_pakai' => ['required', 'max:255']
        ]);

        // fill all relationship id
        $validatedMedPrescription["id_dokter"] = $request->id_dokter;
        $validatedMedPrescription["id_rekmed"] = $latest_med_record->id_rekmed;

        MedicalPrescription::create($validatedMedPrescription);

        // update patient check status
        $queue = Queue::where('id_antrian', $request->id_antrian)->first();
        $queue->update([
            'status' => 1
        ]);

        $patient_id = $queue->patient->id_pasien;

        // return Queue::where('id_antrian', $request->id_antrian)->get();
        return redirect()->route('antrian.index')
            ->with('success', 'Pasien dengan nama 
                <strong>' . $queue->patient->nama . "</strong> 
                telah di periksa <a class='btn btn-sm btn-primary text-decoration-none' href='/pasien/$patient_id'>Tampilkan</a>");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MedicalRecord  $medicalRecord
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $pasien, MedicalRecord $rekam_medis)
    {
        return view('medical_records.detail', [
            'pageTitle' => 'Detail Rekam Medis',
            'medRecord' => $rekam_medis,
            'patient' => $pasien
        ]);
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