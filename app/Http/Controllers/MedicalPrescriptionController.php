<?php

namespace App\Http\Controllers;

use App\Models\MedicalPrescription;
use App\Models\MedicalRecord;
use Illuminate\Http\Request;

class MedicalPrescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('medical_prescriptions.index', [
            'pageTitle' => 'Resep Obat Pasien',
            'medRecords' => MedicalRecord::all()
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
     * @param  \App\Models\MedicalPrescription  $medicalPrescription
     * @return \Illuminate\Http\Response
     */
    public function show(MedicalPrescription $medicalPrescription)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MedicalPrescription  $medicalPrescription
     * @return \Illuminate\Http\Response
     */
    public function edit(MedicalPrescription $medicalPrescription)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MedicalPrescription  $medicalPrescription
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MedicalPrescription $medicalPrescription)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MedicalPrescription  $medicalPrescription
     * @return \Illuminate\Http\Response
     */
    public function destroy(MedicalPrescription $medicalPrescription)
    {
        //
    }

    public function print(MedicalPrescription $resep_obat)
    {
        return view('prints.prescription', [
            'pageTitle' => "Cetak Resep Obat",
            'prescriptions' => $resep_obat
        ]);
    }
}