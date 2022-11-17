@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Periksa Pasien</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <table cellpadding="5">
                            <tbody>
                                <tr>
                                    <td>ID Pasien</td>
                                    <td>:</td>
                                    <td>{{ $queue->patient->id_pasien }}</td>
                                </tr>
                                <tr>
                                    <td>ID Antrian</td>
                                    <td>:</td>
                                    <td>{{ $queue->id_antrian }}</td>
                                </tr>
                                <tr>
                                    <td>Nama Dokter</td>
                                    <td>:</td>
                                    <td>Select</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-6">
                        <table cellpadding="5">
                            <tbody>
                                <tr>
                                    <td>Nama Pasien</td>
                                    <td>:</td>
                                    <td>{{ $queue->patient->nama }}</td>
                                </tr>
                                <tr>
                                    <td>Tanggal / Jam</td>
                                    <td>:</td>
                                    <td>{{ now()->format('d M y / h:i') }}</td>
                                </tr>
                                <tr>
                                    <td>Poli</td>
                                    <td>:</td>
                                    <td>{{ $queue->poly->nama_poli }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <div class="row">
                    <div class="col-6">
                        <a href="{{ route('antrian.index') }}" class="btn btn-sm btn-info">
                            <i class="fa-solid fa-circle-xmark mr-1"></i>
                            Kembali
                        </a>
                    </div>
                    <div class="col-6">
                        <a href="#" class="btn btn-sm btn-info float-right">
                            <i class="fa-solid fa-check mr-1"></i>
                            Simpan
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
