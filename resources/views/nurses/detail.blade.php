@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="card card-primary card-outline">
            <div class="card-body box-profile">
                <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle" src="/img/user4-128x128.jpg"
                        alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">{{ $nurse->nama }}</h3>

                <p class="text-muted text-center">Perawat</p>

                <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                        <b>Email</b> <a class="float-right">{{ $nurse->email }}</a>
                    </li>
                    <li class="list-group-item">
                        <b>No Hp</b> <a class="float-right">{{ $nurse->no_hp }}</a>
                    </li>
                </ul>

                <div class="row">
                    <div class="col-6">
                        <a href="#" class="btn btn-warning btn-block">
                            <i class="fa-solid fa-pen-to-square"></i>
                            Edit</a>
                    </div>
                    <div class="col-6">
                        <form action="{{ route('perawat.destroy', $nurse->id_perawat) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-block"
                                onclick="return confirm('Anda yakin ingin menghapus data ini?')">
                                <i class="fa-solid fa-trash"></i>
                                Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
    <div class="col-md-8">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Detail</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

                <strong><i class="fas fa-calendar-days mr-1"></i> Tanggal lahir</strong>
                <p class="text-muted">{{ $nurse->tgl_lahir }}</p>
                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Tempat lahir</strong>
                <p class="text-muted">{{ $nurse->tempat_lahir }}</p>
                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Alamat</strong>
                <p class="text-muted">{{ $nurse->alamat }}</p>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>
@endsection
