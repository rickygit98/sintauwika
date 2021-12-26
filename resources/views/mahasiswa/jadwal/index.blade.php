@extends('layouts.mhsmain')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col">

                @if ($skripsi == null)
                    <div class="card">
                        <h5 class="card-header">MAAF</h5>
                        <div class="card-body">
                            <h5 class="card-title">Maaf {{ Auth::user()->name }}</h5>
                            <p class="card-text">Anda belum punya skripsi yang diaprove</p>
                            <a href="/mahasiswa/dashboard" class="btn btn-primary">Kembali ke dashboard</a>
                        </div>
                    </div>
                @else

                    @if ($skripsi->jadwal->tgl_sidang)


                        <div class="card">
                            <h5 class="card-header">SELAMAT</h5>
                            <div class="card-body">
                                <h5 class="card-title">Selamat {{ $skripsi->topik->mahasiswa->user->name }} Anda sudah
                                    mendapat jadwal</h5>
                                <br>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"> Jadwal Sidang Anda : <strong>
                                        {{ $skripsi->jadwal->tgl_sidang }}</strong></li>
                                <li class="list-group-item"> Jadwal Seminar Anda :<strong>
                                        {{ $skripsi->jadwal->tgl_seminar }}</strong></li>
                                <li class="list-group-item"> Penguji Anda :<strong>
                                        {{ $skripsi->jadwal->penguji }}</strong></li>
                            </ul>
                            <div class="card-body">
                                @if (now() > $skripsi->jadwal->tgl_sidang)
                                    <a href="{{ $skripsi->jadwal->link_sidang }}" class="btn btn-primary"> Go to Google
                                        Meet</a>
                                @else
                                    <a href="#" class="btn btn-primary disabled"> Link ini akan aktif
                                        pada tanggal : {{ $skripsi->jadwal->tgl_sidang }}</a>
                                @endif

                                @if (now() > $skripsi->jadwal->tgl_seminar)
                                    <a href="{{ $skripsi->jadwal->link_seminar }}" class="btn btn-primary"> Go to Google
                                        Meet</a>
                                @else
                                    <a href="#" class="btn btn-primary disabled"> Link ini akan aktif
                                        pada tanggal : {{ $skripsi->jadwal->tgl_seminar }}</a>
                                @endif

                            </div>
                        </div>


                    @else
                        <div class="card">
                            <h5 class="card-header">MAAF</h5>
                            <div class="card-body">
                                <h5 class="card-title">Maaf {{ $skripsi->topik->mahasiswa->user->name }}</h5>
                                <p class="card-text">Anda belum punya jadwal untuk skripsi anda</p>
                                <a href="/mahasiswa/dashboard" class="btn btn-primary">Kembali ke dashboard</a>
                            </div>
                        </div>
                    @endif
                @endif
            </div>
        </div>
    </div>

@endsection
