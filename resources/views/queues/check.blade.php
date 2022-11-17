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
                                    <td>
                                        <select name="dokter" id="doctor-select" class="form-control">
                                            <option value="">Pilih dokter</option>
                                            @foreach ($doctors as $id => $doctor)
                                                <option value="{{ $id }}">{{ $id . ' - ' . $doctor }}</option>
                                            @endforeach
                                        </select>
                                    </td>
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
                                    <td>{{ now()->format('d M y / H:i') }}</td>
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

                <hr>

                <form action="#" method="POST">
                    @csrf
                    <div class="row mt-2">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="sistole">Sistole</label>
                                <input type="number" class="form-control" placeholder="Sistole" id="sistole" name="sistole">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="diastole">Diastole</label>
                                <input type="number" class="form-control" placeholder="Diastole" id="diastole" name="sistole">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="gula_darah">Gula Darah</label>
                                <input type="number" class="form-control" placeholder="Gula Darah" id="gula_darah" name="gula_darah">
                            </div>
                        </div>
                    </div>
                </form>
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

@section('custom_script')
    <script>
        $(document).ready(function() {
            $('#doctor-select').select2();
        });
    </script>
@endsection
