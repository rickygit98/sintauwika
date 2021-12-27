@extends('layouts.mhsmain')
@section('content')
    <!-- Page Content  -->

    @if (session()->has('success'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <i data-feather="check"></i>
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- Mendapat data dari controller dan lakukan pengkondisian --}}
    {{-- Jika jumlah skripsinya lebih besar dari nol tampilkan datanya --}}
    @if ($skripsi)
        {{-- tampilkan progress Skripsi dan datanya --}}

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">


                        <!-- Main content -->
                        <div class="invoice p-3 mb-3">
                            @if ($skripsi->status == 'Approve')
                                <img src="{{ asset('/img/approve.png') }}" alt="" srcset="" class='position-absolute'
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

                                        <br>Name: {{ $skripsi->topik->mahasiswa->user->name }}
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
                                                        <td><a href="{{ url('/download/?file=' . $skripsi->file) }}"
                                                                class="btn btn-default">Download File</a></td>

                                                    </tr>


                                                </tbody>
                                            </table>
                                        @endif
                                    @else

                                        <div class="alert alert-warning alert-dismissible">
                                            <button type="button" class="close" data-dismiss="alert"
                                                aria-hidden="true">×</button>
                                            <h5><i class="icon fas fa-exclamation-triangle"></i> Anda belum mengajukan
                                                skripsi anda!</h5>
                                            Ajukan Skripsi pertama anda agar anda segera bisa memulai bimbingan skripsi.
                                        </div>
                                    @endif
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->


                            <!-- Button Cetak -->
                            <div class="row no-print">
                                <div class="col-12">

                                    @if ($skripsi->status == 'Approve')

                                        <td><a href="{{ url('/print/' . $skripsi->id) }}" class="btn btn-default"><i
                                                    class="fas fa-print me-2"></i>Print</a>
                                        </td>
                                        <td><a href="{{ url('/download-pdf/' . $skripsi->id) }}"
                                                class="btn btn-default"><i class="fas fa-print me-2"></i>Save PDF</a>
                                        </td>

                                    @else
                                        @if ($skripsi->bimbingan->count() > 0)
                                            <a class="btn btn-success float-right"
                                                href="{{ url('/mahasiswa/skripsi/' . $skripsi->id) }}/edit"><i
                                                    class="far fa-credit-card"></i> Submit Revisi
                                            </a>
                                        @else

                                            <a class="btn btn-primary float-right" style="margin-right: 5px;"
                                                href="{{ url('/mahasiswa/skripsi/' . $skripsi->id) }}/edit">
                                                <i class="fas fa-download"></i> Submit Skripsi
                                            </a>
                                        @endif
                                    @endif

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

            <a class="btn btn-primary my-3" href="{{ url('/mahasiswa/dashboard/') }}" style="text-decoration: none;">
                Kembali ke
                Dashboard </a>
        </div>

    @endif





@endsection
