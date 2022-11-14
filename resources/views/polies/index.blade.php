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
                <div id="polies_table_wrapper" class="dataTables_wrapper dt-bootstrap4">
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
                            <a href="{{ route('poli.create') }}" class="btn btn-info btn-sm mb-2">
                                <i class="fa-solid fa-plus"></i>
                                Tambah Data
                            </a>
                            <table id="polies_table" class="table table-bordered table-striped dataTable dtr-inline"
                                aria-describedby="polies_table_info">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">ID</th>
                                        <th>Nama Poli</th>
                                        <th>Jumlah Dokter</th>
                                        <th>Jumlah Pasien</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($polies as $index => $poly)
                                    <tr class="odd">
                                        <td>{{ $poly->id_poli }}</td>
                                        <td>{{ $poly->nama_poli }}</td>
                                        <td>{{ $doctors[$index] }} orang</td>
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
                                                    <a class="dropdown-item text-info"
                                                        href="{{ route('poli.show', $poly->id_poli) }}">
                                                        <i class="fa-solid fa-circle-info"></i>
                                                        Detail
                                                    </a>
                                                    <a class="dropdown-item text-warning"
                                                        href="{{ route('poli.edit', $poly->id_poli) }}">
                                                        <i class="fa-solid fa-pen-to-square"></i>
                                                        Edit
                                                    </a>
                                                    <div class="dropdown-divider"></div>
                                                    <form action="{{ route('poli.destroy', $poly->id_poli) }}"
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
    $(function () {
        $("#polies_table").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "ordering": false,
            "buttons": ["pdf", "print", "colvis"]
        }).buttons().container().appendTo('#polies_table_wrapper .col-md-6:eq(0)');
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
