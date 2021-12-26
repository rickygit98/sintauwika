@extends('layouts.mhsmain')
@section('content')

    @if ($bimbingan)
        {{-- tampilkan progress Skripsi dan datanya --}}

        <h3>History Skripsi Saya</h3>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Sender</th>
                    <th scope="col">Subject</th>
                    <th scope="col">Comment</th>
                    <th scope="col">Link</th>
                    <th scope="col">File</th>
                    <th scope="col">Last update</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bimbingan as $bmb)

                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <th scope="row">{{ $bmb->sender }}</th>
                        <th scope="row">{{ $bmb->subject }}</th>
                        <td>{!! $bmb->comment !!}</td>

                        @if ($bmb->link)

                            <td><a href="{{ $bmb->link }}" target="blank"><i class="fas fa-globe me-2"></i>Link File</a>
                            </td>
                        @else
                            <td>None </td>
                        @endif

                        @if ($bmb->file)
                            <td><a href="/download/?file={{ $bmb->file }}"><i class="fas fa-file-alt me-2"></i>Download
                                    File</a>
                            </td>

                        @else
                            <td>None </td>

                        @endif
                        <td scope="row">{{ $bmb->created_at->diffForHumans() }}</td>

                    </tr>
                @endforeach
            </tbody>
        </table>

    @else
        {{-- Jika jumlah skripsinya nol / belum punya skripsi , tampilkan div di bawah --}}
        {{-- Tampilkan permintaan pilih judul skripsi dan pilih dosen --}}

        <h3>History Skripsi Saya</h3>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">comment</th>
                    <th scope="col">Dosen Pembimbing</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
        <div class="alert">
            <p>
                <strong>Belum Ada history</strong> untuk skripsi anda , pastikan topik anda sudah disetujui dan minimal
                melakukan bimbingan 1 kali dengan
                dosen pembimbing kamu
            </p>
        </div>
    @endif




@endsection
