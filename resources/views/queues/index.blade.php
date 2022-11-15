@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">{{ $pageTitle }}</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div id="queues_table_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12">
                            @if (session()->has('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="fa-solid fa-check mr-1"></i>
                                {!! session('success') !!}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-info btn-sm mb-2" data-toggle="modal"
                                data-target="#addModal">
                                <i class="fa-solid fa-plus"></i>
                                Tambah Data
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="addModal" tabindex="-1" role="dialog"
                                aria-labelledby="addModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="addModalLabel">Tambah Data Antrian</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('antrian.store') }}" method="post">
                                            <div class="modal-body">
                                                @csrf
                                                <div class="form-group">
                                                    <label>Pasien</label>
                                                    <select
                                                        id="patient-select"
                                                        class="form-control @error('id_pasien') is-invalid @enderror"
                                                        style="width: 100%;" tabindex="-1"
                                                        aria-hidden="true" name="id_pasien">
                                                        <option selected>Cari pasien</option>
                                                        @foreach ($patients as $id => $patient)
                                                        <option value="{{ $id }}">{{ $id . ' - ' . $patient }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('id_pasien')
                                                    <p class="invalid-feedback">
                                                        {{ $message }}
                                                    </p>
                                                    @enderror
                                                </div>
                                                <div class="form-group" data-select2-id="42">
                                                    <label>Poli Tujuan</label>
                                                    <select
                                                        id="poly-select"
                                                        class="form-control @error('id_poli') is-invalid @enderror"
                                                        style="width: 100%;" tabindex="-1"
                                                        aria-hidden="true" name="id_poli">
                                                        <option selected>Cari poli tujuan</option>
                                                        @foreach ($polies as $id => $poly)
                                                        <option value="{{ $id }}">{{ $id . ' - ' . $poly }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('id_poli')
                                                    <p class="invalid-feedback">
                                                        {{ $message }}
                                                    </p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Tutup</button>
                                                <button type="submit" class="btn btn-primary">Tambah Ke Antrian</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <table id="queues_table" class="table table-bordered table-striped dataTable dtr-inline"
                                aria-describedby="queues_table_info">
                                <thead>
                                    <tr>
                                        <th style="width: 100px">No Urut</th>
                                        <th>Nama Pasien</th>
                                        <th>Poli Tujuan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($queues as $queue)
                                    <!-- Edit Modal -->
                                    <div class="modal fade" id="modal{{ $queue->id_antrian }}" tabindex="-1"
                                        role="dialog" aria-labelledby="modal{{ $queue->id_antrian }}Label"
                                        aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modal{{ $queue->id_antrian }}Label">
                                                        Update Data Antrian</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{ route('antrian.update', $queue->id_antrian) }}"
                                                    method="post">
                                                    <div class="modal-body">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="form-group">
                                                            <label for="id_pasien">Nama Pasien</label>
                                                            <input type="text"
                                                                class="form-control @error('id_pasien') is-invalid @enderror"
                                                                id="id_pasien" placeholder="Nama pasien"
                                                                name="id_pasien"
                                                                value="{{ old('id_pasien', $queue->id_pasien) }}">
                                                            @error('id_pasien')
                                                            <p class="invalid-feedback">
                                                                {{ $message }}
                                                            </p>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Tutup</button>
                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <tr class="odd">
                                        <td>{{ $queue->id_pasien}}</td>
                                        <td>{{ $queue->id_poli }}</td>
                                        </td>
                                        <td></td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-info btn-sm">Action</button>
                                                <button type="button"
                                                    class="btn btn-info btn-sm dropdown-toggle dropdown-icon"
                                                    data-toggle="dropdown">
                                                    <span class="sr-only">Toggle Dropdown</span>
                                                </button>
                                                <div class="dropdown-menu" role="menu">
                                                    <button type="submit" class="dropdown-item text-warning"
                                                        data-toggle="modal"
                                                        data-target="#modal{{ $queue->id_antrian }}">
                                                        <i class="fa-solid fa-pen-to-square"></i>
                                                        Edit
                                                    </button>
                                                    <div class="dropdown-divider"></div>
                                                    <form action="{{ route('antrian.destroy', $queue->id_antrian) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="dropdown-item text-danger"
                                                            onclick="return confirm('Anda yakin ingin menghapus data ini?')">
                                                            <i class="fa-solid fa-trash"></i>
                                                            Hapus
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>

@section('custom_script')
<script>
    @if(count($errors) > 0)
    $('#addModal').modal('show');
    @endif

    $(document).ready(function () {
        $('#poly-select, #patient-select').select2({
            tags: true,
            dropdownParent: $('#addModal')
        });
    });

    $(function () {
        $("#queues_table").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "ordering": false,
            "buttons": ["pdf", "print", "colvis"]
        }).buttons().container().appendTo('#queues_table_wrapper .col-md-6:eq(0)');
        // $('#example2').DataTable({
        //     "paging": true,
        //     "lengthChange": false,
        //     "searching": false,
        //     "ordering": true,
        //     "info": true,
        //     "autoWidth": false,
        //     "responsive": true,
        // });
    });

</script>
@endsection
@endsection
