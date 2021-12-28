@extends('layouts.dsnmain')

@section('content')

    @forelse ($jadwal as $j)
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Jadwal sidang yang akan datang</h3>

                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0" style="height: 550px;">
                    <table class="table table-head-fixed text-nowrap">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Mahasiswa</th>
                                <th>Link Sidang</th>
                                <th>Link Seminar</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>


                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $j->skripsi->topik->title }}</td>
                                <td>{{ $j->skripsi->topik->mahasiswa->user->name }}</td>

                                {{-- Link Sidang --}}
                                @if (now() > $j->tgl_sidang)
                                    <td><a href="{{ $j->link_sidang }}" class="btn btn-primary" target="blank">Go to
                                            Meet</a></td>
                                @else
                                    <td><a href="#" class="btn btn-primary disabled">Link ini akan aktif pada tanggal
                                            {{ $j->tgl_sidang }}</a></td>
                                @endif

                                {{-- Link Seminar --}}
                                @if (now() > $j->tgl_seminar)
                                    <td><a href="{{ $j->link_sidang }}" class="btn btn-primary" target="blank">Go to
                                            Meet</a></td>
                                @else
                                    <td><a href="#" class="btn btn-primary disabled">Link ini akan aktif pada tanggal
                                            {{ $j->tgl_seminar }}</a></td>
                                @endif
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>

    @empty
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Belum ada Jadwal sidang / seminar yang yang harus anda hadiri untuk saat ini
                    </h3>
                </div>
                <!-- ./card-header -->
                <div class="card-body">
                    <img src="https://64.media.tumblr.com/f74633365530a38b62a3b30f3d41e8cf/2335c431e4074bd3-c2/s1280x1920/aaf32833587c816ffbf2921ce51d9f958e6a0160.jpg"
                        style="width:200px" alt="">
                </div>
            </div>
        </div>
    @endforelse
@endsection
