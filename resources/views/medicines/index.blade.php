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
                <div id="medicines_table_wrapper" class="dataTables_wrapper dt-bootstrap4">
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
                                            <h5 class="modal-title" id="addModalLabel">Tambah Data Obat</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('obat.store') }}" method="post">
                                            <div class="modal-body">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="nama_obat">Nama Obat</label>
                                                    <input type="text"
                                                        class="form-control @error('nama_obat') is-invalid @enderror"
                                                        id="nama_obat" placeholder="Nama obat" name="nama_obat"
                                                        value="{{ old('nama_obat') }}">
                                                    @error('nama_obat')
                                                    <p class="invalid-feedback">
                                                        {{ $message }}
                                                    </p>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label for="stok">Stok</label>
                                                    <input type="text"
                                                        class="form-control @error('stok') is-invalid @enderror"
                                                        id="stok" placeholder="Stok obat" name="stok"
                                                        value="{{ old('stok') }}">
                                                    @error('stok')
                                                    <p class="invalid-feedback">
                                                        {{ $message }}
                                                    </p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Tutup</button>
                                                <button type="submit" class="btn btn-primary">Tambah</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <table id="medicines_table" class="table table-bordered table-striped dataTable dtr-inline"
                                aria-describedby="medicines_table_info">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Nama Obat</th>
                                        <th>Stok</th>
                                        <th style="width: 200px;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($medicines as $medicine)
                                    <!-- Edit Modal -->
                                    <div class="modal fade" id="modal{{ $medicine->id_obat }}" tabindex="-1"
                                        role="dialog" aria-labelledby="modal{{ $medicine->id_obat }}Label"
                                        aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modal{{ $medicine->id_obat }}Label">
                                                        Update Data Obat</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{ route('obat.update', $medicine->id_obat) }}"
                                                    method="post">
                                                    <div class="modal-body">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="form-group">
                                                            <label for="nama_obat">Nama Obat</label>
                                                            <input type="text"
                                                                class="form-control @error('nama_obat') is-invalid @enderror"
                                                                id="nama_obat" placeholder="Nama obat" name="nama_obat"
                                                                value="{{ old('nama_obat', $medicine->nama_obat) }}">
                                                            @error('nama_obat')
                                                            <p class="invalid-feedback">
                                                                {{ $message }}
                                                            </p>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="stok">Stok</label>
                                                            <input type="text"
                                                                class="form-control @error('stok') is-invalid @enderror"
                                                                id="stok" placeholder="Stok Obat" name="stok"
                                                                value="{{ old('stok', $medicine->stok) }}">
                                                            @error('stok')
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
                                        <td>{{ $loop->iteration }}.</td>
                                        <td>{{ $medicine->nama_obat }}</td>
                                        <td>{{ $medicine->stok }}</td>
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
                                                        data-target="#modal{{ $medicine->id_obat }}">
                                                        <i class="fa-solid fa-pen-to-square"></i>
                                                        Edit
                                                    </button>
                                                    <div class="dropdown-divider"></div>
                                                    <form action="{{ route('obat.destroy', $medicine->id_obat) }}"
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

    $(function () {
        $("#medicines_table").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "ordering": false,
            "buttons": ["pdf", "print", "colvis"]
        }).buttons().container().appendTo('#medicines_table_wrapper .col-md-6:eq(0)');
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
