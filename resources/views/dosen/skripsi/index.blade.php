@extends('layouts.dsnmain')

@section('content')

    @if (session()->has('success'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <i data-feather="check"></i>
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @forelse ($topik as $t)

        @if ($t->skripsi)

            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Bimbingan yang sedang berlangsung</h3>

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

                                    <th>Subject</th>
                                    <th>Link</th>
                                    <th>File</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $t->title }}</td>
                                    <td>{{ $t->mahasiswa->user->name }}</td>

                                    <td>{{ $t->skripsi->subject }}</td>
                                    @if ($t->skripsi->link)
                                        <td><a href="{{ $t->skripsi->link }}" class="btn btn-default"
                                                target="blank">Menuju Link</a>
                                        </td>
                                    @else
                                        <td>None</td>
                                    @endif
                                    @if ($t->skripsi->file)
                                        <td><a href="{{ url('/download/?file=' . $t->skripsi->file) }}"
                                                class="btn btn-default">Download
                                                File</a></td>
                                    @else
                                        <td>None</td>
                                    @endif

                                    @if ($t->skripsi->status == 'Revisi')
                                        <td> <span class="badge badge-danger p-2">{{ $t->skripsi->status }}</span>
                                        </td>
                                    @else
                                        <td> <span class="badge badge-success p-2">{{ $t->skripsi->status }}</span>
                                        </td>
                                    @endif


                                    <td>
                                        <a class="badge bg-primary border-0 p-2"
                                            href="{{ url('/dosen/skripsi/' . $t->skripsi->id) }}">
                                            <i class="fas fa-eye fa-lg"></i>
                                        </a>
                                        @if ($t->skripsi->status == 'Revisi')

                                            <form action="{{ url('/dosen/skripsi/' . $t->skripsi->id) }}" method="post"
                                                class="d-inline">
                                                @method('put')
                                                @csrf
                                                <input type="hidden" id="statusSkripsi" name="statusSkripsi" value="">

                                                <button class="badge bg-success border-0 p-2" id="btnApprove"
                                                    name="btnApprove" type="submit"
                                                    onclick="return confirm('Apakah anda yakin ingin Approve Skripsi?')">
                                                    <i class="fas fa-check fa-lg"></i>
                                                </button>
                                            </form>
                                        @endif

                                    </td>


                                </tr>
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
                        <h3 class="card-title">Bimbingan yang sedang berlangsung</h3>

                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control float-right"
                                    placeholder="Search">

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

                                    <th>Subject</th>
                                    <th>Link</th>
                                    <th>File</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                        <div class="alert alert-info alert-dismissible">
                            <h5><i class="icon fas fa-info"></i> Belum ada skripsi</h5>
                            Belum ada skripsi untuk di cek saat ini, coba lagi beberapa saat nanti
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        @endif

    @empty

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Bimbingan yang sedang berlangsung</h3>

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

                                <th>Subject</th>
                                <th>Link</th>
                                <th>File</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                    <div class="alert alert-info alert-dismissible">
                        <h5><i class="icon fas fa-info"></i> Belum ada skripsi</h5>
                        Belum ada skripsi untuk di cek saat ini, coba lagi beberapa saat nanti
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>

    @endforelse




@endsection
