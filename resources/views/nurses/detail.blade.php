@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="card card-primary card-outline">
            <div class="card-body box-profile">
                <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle" src="https://source.unsplash.com/100x100?avatar"
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
                    <div class="col-6">
                        <a href="#" class="btn btn-warning btn-block" id="edit-btn">
                            <i class="fa-solid fa-pen-to-square"></i>
                            Edit</a>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>

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
    <div class="col-md-8">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary collapsed-card">
                    <div class="card-header">
                        <h3 class="card-title">Akun</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-plus"></i>
                            </button>
                        </div>
                        <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body" style="display: none;">
                        <form class="form-horizontal">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="username" class="col-sm-2 col-form-label">Username</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control form-control-sm" id="username" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="password" class="col-sm-2 col-form-label">Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control form-control-sm" id="password"
                                            placeholder="Password">
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                            <!-- /.card-footer -->
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form>
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" value="{{ old('nama', $nurse->nama) }}">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" value="{{ old('email', $nurse->email) }}">
                    </div>
                    <div class="form-group">
                        <label for="no_hp">No Hp</label>
                        <input type="number" class="form-control" id="no_hp" value="{{ old('no_hp', $nurse->no_hp) }}">
                    </div>
                    <div class="form-group">
                        <label for="tgl_lahir">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tgl_lahir"
                            value="{{ old('tgl_lahir', $nurse->tgl_lahir) }}">
                    </div>
                    <div class="form-group">
                        <label for="tempat_lahir">Tempat Lahir</label>
                        <input type="text" class="form-control" id="tempat_lahir"
                            value="{{ old('tempat_lahir', $nurse->tempat_lahir) }}">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea name="alamat" id="alamat" class="form-control"
                            rows="3">{{ $nurse->alamat }}</textarea>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
