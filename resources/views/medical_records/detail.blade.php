@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Data Pasien</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <h5><strong>{{ $patient->nama }}</strong></h5>
                    </div>
                    <div class="col-6">
                        <h5><strong>{{ $patient->id_pasien }}</strong></h5>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-6 mb-2">
                        <strong>No BPJS</strong>
                        <p>{{ $patient->no_bpjs }}</p>
                    </div>
                    <div class="col-6 mb-2">
                        <strong>Jenis_kelamin</strong>
                        <p>{{ ucwords($patient->jenis_kelamin) }}</p>
                    </div>
                    <div class="col-6 mb-2">
                        <strong>Tempat Lahir</strong>
                        <p>{{ $patient->tempat_lahir }}</p>
                    </div>
                    <div class="col-6 mb-2">
                        <strong>Tanggal Lair</strong>
                        <p>{{ $patient->tgl_lahir }}</p>
                    </div>
                    <div class="col-6 mb-2">
                        <strong>No Hp</strong>
                        <p>{{ $patient->no_hp }}</p>
                    </div>
                    <div class="col-6 mb-2">
                        <strong>Alamat</strong>
                        <p>{{ $patient->alamat }}</p>
                    </div>
                    <div class="col-6 mb-2">
                        <strong>Berat Badan</strong>
                        <p>{{ $patient->berat_badan }}</p>
                    </div>
                    <div class="col-6 mb-2">
                        <strong>Tinggi Badan</strong>
                        <p>{{ $patient->tinggi_badan }}</p>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <div class="row">
                    <div class="col-6">
                        <form action="{{ route('pasien.destroy', $patient->id_pasien) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"
                                onclick="return confirm('Anda yakin ingin menghapus data ini?')">
                                <i class="fa-solid fa-trash mr-1"></i>
                                Hapus
                            </button>
                        </form>
                    </div>
                    <div class="col-6">
                        <a href="{{ route('pasien.edit', $patient->id_pasien) }}"
                            class="btn btn-sm btn-warning float-right">
                            <i class="fa-solid fa-pen-to-square mr-1"></i>
                            Edit
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-8">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-6">
                        <h3 class="card-title"><strong>Riwayat Rekam Medis</strong></h3>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row py-2 mb-3">
                    <div class="col-6">
                        <table cellpadding="6">
                            <tr>
                                <td>ID Rekmed</td>
                                <td>:</td>
                                <td>{{ $medRecord->id_rekmed }}</td>
                            </tr>
                            <tr>
                                <td>Nama Dokter</td>
                                <td>:</td>
                                <td>{{ $medRecord->doctor->nama }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-6">
                        <table cellpadding="6">
                            <tr>
                                <td>Tanggal / Jam</td>
                                <td>:</td>
                                <td>{{ $medRecord->created_at->format('d M Y') }} /
                                    {{ $medRecord->created_at->format('H:i') }}</td>
                            </tr>
                            <tr>
                                <td>Poli</td>
                                <td>:</td>
                                <td>{{ $medRecord->poly->nama_poli }}</td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Keluhan</th>
                                    <th>Sistole</th>
                                    <th>Diastole</th>
                                    <th>Gula Darah</th>
                                    <th>Alergi</th>
                                    <th>Diagnosis</th>
                                    <th>Terapi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $medRecord->keluhan }}</td>
                                    <td>{{ $medRecord->sistole }}</td>
                                    <td>{{ $medRecord->diastole }}</td>
                                    <td>{{ $medRecord->gula_darah }}</td>
                                    <td>{{ $medRecord->alergi ?? '-' }}</td>
                                    <td>{{ $medRecord->diagnosis }}</td>
                                    <td>{{ $medRecord->terapi }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>
@endsection
