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

    @if ($skripsi->count() > 0)

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">DAFTAR JADWAL SKRIPSI</h3>
                </div>
                <!-- ./card-header -->
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Judul Skripsi</th>
                                <th>Mahasiswa</th>
                                <th>Tgl Sidang</th>
                                <th>Tgl Seminar</th>

                                <th>Penguji</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($skripsi as $sk)

                                <tr>
                                    <td> {{ $loop->iteration }}</td>
                                    <td> {{ $sk->topik->title }}</td>
                                    <td> {{ $sk->topik->mahasiswa->user->name }}</td>

                                    @if ($sk->jadwal->tgl_sidang)

                                        <td> {{ $sk->jadwal->tgl_sidang }}</td>
                                    @else
                                        <td> <span class="badge badge-danger p-2"> Belum ditetapkan</span></td>
                                    @endif

                                    @if ($sk->jadwal->tgl_seminar)

                                        <td> {{ $sk->jadwal->tgl_seminar }}</td>
                                    @else
                                        <td> <span class="badge badge-danger p-2"> Belum ditetapkan</span></td>
                                    @endif


                                    @if ($sk->jadwal->penguji)

                                        <td> {{ $sk->jadwal->penguji }}</td>
                                    @else
                                        <td> <span class="badge badge-danger p-2"> Belum ditetapkan</span></td>
                                    @endif

                                    <td>
                                        @if ($sk->jadwal->tgl_sidang)
                                            <a href="{{ url('/admin/jadwal/' . $sk->jadwal->id) }}/edit"
                                                class="badge bg-warning p-2">
                                                <i class="fas fa-calendar-alt fa-lg"></i> Edit Jadwal
                                            </a>
                                        @else
                                            <a href="{{ url('/admin/jadwal/' . $sk->jadwal->id) }}/edit"
                                                class="badge bg-primary p-2">
                                                <i class="fas fa-calendar-alt fa-lg"></i> Tambahkan Jadwal
                                            </a>
                                        @endif
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
                    <h3 class="card-title">Belum ada Skripsi untuk dijadwalkan</h3>
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
