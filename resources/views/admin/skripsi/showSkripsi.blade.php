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
        {{-- tampilkan progress Skripsi dan datanya --}}

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">


                        <!-- Main content -->
                        <div class="invoice p-3 mb-3">
                            @if ($skripsi->status == 'Approve')
                                <img src="/img/approve.png" alt="" srcset="" class='position-absolute'
                                    style="width: 100px; right:10px;">
                            @endif

                            <!-- title row -->
                            <div class="row">
                                <div class="col-12">
                                    <h4>
                                        <i class="fas fa-globe"></i> {{ $skripsi->topik->title }}
                                    </h4>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- info row -->
                            <div class="row invoice-info">
                                <div class="col-sm-4 invoice-col">
                                    From
                                    <address>
                                        <strong>Mahasiswa</strong>

                                        <br>Phone: {{ $skripsi->topik->mahasiswa->user->name }}
                                        <br>Phone: {{ $skripsi->topik->mahasiswa->user->contact }}
                                        <br>Email: {{ $skripsi->topik->mahasiswa->user->email }}
                                    </address>
                                </div>

                                <!-- /.col -->

                                <div class="col-sm-4 invoice-col">
                                    To
                                    <address>
                                        <strong>Dosen Pembimbing</strong>

                                        <br>Name: {{ $skripsi->topik->dosen->user->name }}
                                        <br>Phone: {{ $skripsi->topik->dosen->user->contact }}
                                        <br>Email: {{ $skripsi->topik->dosen->user->email }}
                                    </address>
                                </div>
                                <!-- /.col -->

                            </div>
                            <!-- /.row -->

                            <!-- Table row -->
                            <div class="row">
                                <div class="col-12 table-responsive">
                                    @if ($skripsi->bimbingan->count() > 0)

                                        @if ($skripsi->status == 'Approve')
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Subject</th>
                                                        <th>Comment</th>
                                                        <th>Last update</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <tr>
                                                        <td>1</td>
                                                        <td>{{ $skripsi->subject }}</td>
                                                        <td>{!! $skripsi->comment !!}</td>
                                                        <td>{{ $skripsi->updated_at->diffForHumans() }}</td>
                                                    </tr>


                                                </tbody>
                                            </table>

                                        @else

                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Subject</th>
                                                        <th>Comment</th>
                                                        <th>Last update</th>
                                                        <th>Link</th>
                                                        <th>File</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <tr>
                                                        <td>1</td>
                                                        <td>{{ $skripsi->subject }}</td>
                                                        <td>{!! $skripsi->comment !!}</td>
                                                        <td>{{ $skripsi->updated_at->diffForHumans() }}</td>
                                                        <td><a href="{{ $skripsi->link }}" class="btn btn-default"
                                                                target="blank">Link
                                                                File Skripsi</a></td>
                                                        <td><a href="/download/?file={{ $skripsi->file }}"
                                                                class="btn btn-default">Download File</a></td>

                                                    </tr>


                                                </tbody>
                                            </table>
                                        @endif
                                    @else

                                        <div class="alert alert-warning alert-dismissible">
                                            <button type="button" class="close" data-dismiss="alert"
                                                aria-hidden="true">×</button>
                                            <h5><i class="icon fas fa-exclamation-triangle"></i> Belum Ada Pengajuan Skripsi
                                            </h5>
                                            Tunggu Mahasiswa yang bersangkutan mengajukan skripsi untuk topiknya untuk
                                            melanjutkan bimbingan
                                        </div>
                                    @endif
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->


                            <!-- this row will not appear when printing -->
                            <div class="row no-print">
                                <div class="col-12">
                                    @if ($skripsi->status == 'Approve')
                                        <div class="alert alert-success">
                                            <h5><i class="fas fa-check fa-lg"></i> Approved!
                                            </h5>
                                            Skripsi ini telah di approve!
                                        </div>
                                        <td><a href="/print/{{ $skripsi->id }}" class="btn btn-default"><i
                                                    class="fas fa-print me-2"></i>Print</a>
                                        </td>
                                        <td><a href="/download-pdf/{{ $skripsi->id }}" class="btn btn-default"><i
                                                    class="fas fa-print me-2"></i>Save PDF</a>
                                        </td>
                                    @endif

                                    <td>
                                        <a class="btn btn-success float-right me-2"
                                            href="/admin/skripsi/showbimbingan/{{ $skripsi->id }}">
                                            <i class="fas fa-history"></i>
                                            Lihat History Bimbingan
                                        </a>
                                    </td>
                                </div>


                            </div>
                        </div>
                        <!-- /.invoice -->
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>

    @else
        {{-- Jika jumlah skripsinya nol / belum punya skripsi , tampilkan div di bawah --}}
        {{-- Tampilkan permintaan pilih judul skripsi dan pilih dosen --}}

        <div class="alert" role="alert">
            <h4 class="alert-heading">Anda Belum Mengajukan Topik Skripsi</h4>
            <p>
                Maaf Mahasiswa teladan!
                Kamu tidak belum bisa mengakses halaman ini jika belum mendapat topik yang tervalidasi , pastikan anda sudah
                mengirim topik dulu sebelumnya dan tunggu validasi dari dosen pembimbing pilihan anda
            </p>
            <hr>

            <a class="btn btn-primary my-3" href="/mahasiswa/dashboard/" style="text-decoration: none;"> Kembali ke
                Dashboard </a>
        </div>

    @endif


@endsection
