@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Resep obat
                        {{ $prescriptions->medical_record[0]->patient->nama }}
                    </h3>
                </div>
                <div class="card-body">
                    <section class="data">
                        <h3 class="text-center mt-1 mb-4">Resep Obat
                        </h3>

                        <div class="info mb-4">
                            <table cellpadding="5">
                                <tr>
                                    <td>Nama</td>
                                    <td>:</td>
                                    <td>{{ $prescriptions->medical_record[0]->patient->nama }}</td>
                                </tr>
                                <tr>
                                    <td>No BPJS</td>
                                    <td>:</td>
                                    <td>{{ $prescriptions->medical_record[0]->patient->no_bpjs ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td>Jenis Kelamin</td>
                                    <td>:</td>
                                    <td>{{ ucwords($prescriptions->medical_record[0]->patient->jenis_kelamin) }}</td>
                                </tr>
                                <tr>
                                    <td>Tanggal Periksa</td>
                                    <td>:</td>
                                    <td>{{ ucwords($prescriptions->medical_record[0]->created_at->format('m D Y')) }}</td>
                                </tr>
                            </table>
                        </div>

                        <table class="table">
                            <thead>
                                <th>#</th>
                                <th>Nama Obat</th>
                                <th>Aturan Pakai</th>
                            </thead>
                            <tbody>
                                <td>1.</td>
                                <td>{{ $prescriptions->medicine->nama_obat }}</td>
                                <td>{!! $prescriptions->aturan_pakai !!}</td>
                            </tbody>
                        </table>
                    </section>

                    <div class="row justify-content-end mt-5">
                        <div class="col-4">
                            <div class="role">
                                <p class="role">
                                    {{ ucwords(auth()->user()->role) }}
                                </p>
                                <p class="name mt-5">
                                    @if (auth()->user()->role === 'apoteker')
                                        {{ ucwords(auth()->user()->pharmacist->nama) }}
                                    @else
                                        {{ ucwords(auth()->user()->username) }}
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <form action="{{ route('print.prescriptions', $prescriptions->id_resep) }}" method="POST" target="_blank">
                @csrf
                <button type="submit" class="btn btn-info btn-sm">
                    <i class="fa-solid fa-print"></i>
                    Cetak Resep Obat
                </button>
            </form>
        </div>
    </div>
@endsection
