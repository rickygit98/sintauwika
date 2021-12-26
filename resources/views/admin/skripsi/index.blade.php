<!-- Main content -->
@extends('layouts.adminmain')
@section('content')
    @if (session()->has('success'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <i data-feather="check"></i>
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if ($skripsi->count() == 0)
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Belum ada Topik yang diajukan saat ini</h3>
                </div>
                <!-- ./card-header -->
                <div class="card-body">
                    <img src="https://64.media.tumblr.com/f74633365530a38b62a3b30f3d41e8cf/2335c431e4074bd3-c2/s1280x1920/aaf32833587c816ffbf2921ce51d9f958e6a0160.jpg"
                        style="width:200px" alt="">
                </div>
            </div>
        </div>

    @else
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">DAFTAR SKRIPSI</h3>
                </div>
                <!-- ./card-header -->
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Judul Skripsi</th>
                                <th>Mahasiswa</th>
                                <th>Pembimbing</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($skripsi as $sk)
                                <tr data-widget="expandable-table" aria-expanded="false">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $sk->topik->title }}</td>
                                    <td>{{ $sk->topik->mahasiswa->user->name }}</td>
                                    <td>{{ $sk->topik->dosen->user->name }}</td>
                                    @if ($sk->status == 'Approve')
                                        <td> <span class="badge badge-success p-2">{{ $sk->status }}</span> </td>
                                    @else
                                        <td> <span class="badge badge-danger p-2">{{ $sk->status }}</span> </td>
                                    @endif
                                    <td>
                                        <a href="/admin/skripsi/{{ $sk->id }}" class="badge bg-primary p-2">
                                            <i class="fas fa-eye fa-lg"></i>
                                        </a>

                                        @if ($sk->status == 'Approve')
                                            @if ($sk->jadwal->tgl_sidang)
                                                <a href="/admin/jadwal/{{ $sk->jadwal->id }}/edit"
                                                    class="badge bg-warning p-2">
                                                    <i class="fas fa-calendar-alt fa-lg"></i> Edit Jadwal
                                                </a>
                                            @else
                                                <a href="/admin/jadwal/{{ $sk->jadwal->id }}/edit"
                                                    class="badge bg-primary p-2">
                                                    <i class="fas fa-calendar-alt fa-lg"></i> Tambahkan Jadwal
                                                </a>
                                            @endif

                                        @endif



                                    </td>

                                </tr>
                                <tr class="expandable-body d-none">
                                    <td colspan="3">
                                        <p style="display: none;">
                                            {!! $sk->comment !!}
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
    @endif
@endsection
