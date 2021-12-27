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

    @if ($topik->count() > 0)
        @foreach ($topik as $t)
            @if ($t->status == 'Submit Pertama')

                <div class="alert alert-info alert-dismissible">
                    {{-- <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> --}}
                    <h5><i class="icon fas fa-info-circle fa-lg"></i> WAITING RESPONSE!</h5>
                </div>
                <div class="callout callout-info">
                    <h5>TERIMA KASIH MAHASISWA!</h5>

                    <p>Anda baru saja submit topik berjudul <strong> "{{ $t->title }}" </strong> , silakan tunggu
                        konfirmasi dari Dosen
                        pembimbing pilihan anda
                    </p>

                    <a href="{{ url('/mahasiswa/topik/create') }}" class="btn btn-primary text-light"
                        style="text-decoration: none;">
                        Submit Topik lain</a>
                </div>

            @endif

            @if ($t->status == 'Ditolak')
                <div class="alert alert-danger alert-dismissible">
                    {{-- <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> --}}
                    <h5><i class="icon fas fa-times"></i> FAIL!</h5>
                </div>
                <div class="callout callout-danger">
                    <h5>MAAF MAHASISWA!</h5>

                    <p>Sayang sekali , judul skripsi anda "{{ $t->title }}" telah ditolak oleh dosen pembimbing anda
                        silakan submit topik baru
                        yang lebih berkualitas agar dapat disetujui oleh dosen pembimbing anda.</p>
                    {{-- <a href="/mahasiswa/topik/{{ $t->id }}/edit" class="btn btn-primary text-light"
                        style="text-decoration: none;">
                        Submit Topik Lain</a> --}}
                </div>
                <a href="{{ url('/mahasiswa/topik/create') }}" class="btn btn-primary text-light"
                    style="text-decoration: none;">
                    Submit Topik Lain</a>
            @endif

            @if ($t->status == 'Diterima')
                <div class="alert alert-success alert-dismissible">
                    {{-- <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> --}}
                    <h5><i class="icon fas fa-check"></i> SUCCESS!</h5>
                </div>
                <div class="callout callout-success">
                    <h5>SELAMAT MAHASISWA!</h5>

                    <p>Skripsi anda telah disetujui oleh dosen pembimbing anda , silakan masuk ke menu skripsi untuk
                        melanjutkna proses bimbingan</p>
                    <a href="{{ url('/mahasiswa/skripsi/') }}" class="btn btn-primary text-light"
                        style="text-decoration: none;"> Mulai
                        bimbingan </a>
                </div>
            @endif
        @endforeach

    @else

        <div class="alert alert-border-primary" role="alert">
            <h4 class="alert-heading">Anda Belum Punya Topik</h4>
            <p>Aduhh!! Kamu belum punya Topik nih! yuk pilih topik agar kamu bisa segera mulai bimbingan</p>
            <hr>
            <p class="mb-0">Tekan tombol 'Ajukan Topik' di bawah ini agar kamu bisa segera tambahkan Topik
            </p>
            <a class="btn btn-primary my-3" href="{{ url('/mahasiswa/topik/create') }}" style="text-decoration: none;">
                Ajukan Topik</a>
        </div>
    @endif



@endsection
