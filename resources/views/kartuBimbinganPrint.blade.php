<!doctype html>
<html lang="en">

<head>
    @include('layouts.style')

    <title>Kartu Bimbingan</title>
</head>

<body onload="window.print();">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <!-- Main content -->
                    <div class="invoice p-3 mb-3">

                        <img src="/img/approve.png" alt="" srcset="" class='position-absolute'
                            style="width: 100px; right:10px;">


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


                                {{-- History Bimbingan --}}
                                <div class="row">
                                    <div class="col-12">
                                        <h4>
                                            <i class="fas fa-globe"></i> History Bimbingan
                                        </h4>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Sender</th>
                                            <th>Subject</th>
                                            <th>Comment</th>
                                            <th>Last update</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($bimbingan as $bmb)

                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $bmb->sender }}</td>
                                                <td>{{ $bmb->subject }}</td>
                                                <td>{!! $bmb->comment !!}</td>
                                                <td>{{ $bmb->updated_at->diffForHumans() }}</td>
                                            </tr>
                                        @endforeach


                                    </tbody>
                                </table>

                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.invoice -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>

    @include('layouts.script')
</body>

</html>
