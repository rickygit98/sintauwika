<!-- Main content -->
@extends('layouts.dsnmain')
@section('content')
    @if (session()->has('success'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <i data-feather="check"></i>
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if ($topiks)
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Menunggu Response dari Anda :)</h3>
                </div>
                <!-- ./card-header -->
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Judul Topik</th>
                                <th>Kategori Topik</th>
                                <th>Nama Mahasiswa</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($topiks as $topik)

                                <tr data-widget="expandable-table" aria-expanded="false">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $topik->title }}</td>
                                    <td>{{ $topik->kategori->name }}</td>
                                    <td>{{ $topik->mahasiswa->user->name }}</td>
                                    <td>
                                        <a href="/dosen/topik/{{ $topik->id }}" class="badge bg-primary p-2">
                                            <i class="fas fa-eye fa-lg"></i>
                                        </a>

                                        <form action="/dosen/topik/{{ $topik->id }}" method="post" class="d-inline"
                                            id="form-confirm">
                                            @method('put')
                                            @csrf
                                            <input type="hidden" id="status" name="status">
                                            <input type="hidden" id="contact" name="contact"
                                                value="{{ $topik->mahasiswa->user->contact }}">
                                            <input type="hidden" id="email" name="email"
                                                value="{{ $topik->mahasiswa->user->email }}">

                                            <button class="badge bg-warning border-0 p-2" id="btnTerima" type="submit"
                                                onclick="return confirm('Apakah anda yakin ingin menerima Topik?')">
                                                <i class="fas fa-check fa-lg"></i>
                                            </button>

                                            <button class="badge bg-danger border-0 p-2" id="btnTolak" type="submit"
                                                onclick="return confirm('Apakah anda yakin ingin menolak Topik?')">
                                                <i class="fas fa-minus-circle fa-lg"></i>
                                            </button>
                                        </form>


                                    </td>

                                </tr>
                                <tr class="expandable-body d-none">
                                    <td colspan="6">
                                        <p style="display: none;">
                                            {!! $topik->comment !!}
                                        </p>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    @else
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Belum ada Topik yang harus anda cek untuk saat ini</h3>
                </div>
                <!-- ./card-header -->
                <div class="card-body">
                    <img src="https://64.media.tumblr.com/f74633365530a38b62a3b30f3d41e8cf/2335c431e4074bd3-c2/s1280x1920/aaf32833587c816ffbf2921ce51d9f958e6a0160.jpg"
                        style="width:200px" alt="">
                </div>
            </div>
        </div>

    @endif
@endsection
