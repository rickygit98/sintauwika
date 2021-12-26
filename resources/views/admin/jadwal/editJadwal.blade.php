@extends('layouts.adminmain')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8">

                <form action="/admin/jadwal/{{ $jadwal->id }}" method="POST" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label"> Judul Topik</label>
                        <input type="text" class="form-control" id="title" name="title"
                            value='{{ $jadwal->skripsi->topik->title }}' readonly>
                    </div>

                    <div class="mb-3">
                        <label for="mahasiswa" class="form-label"> Mahasiswa </label>
                        <input type="text" class="form-control" id="mahasiswa" name="mahasiswa"
                            value='{{ $jadwal->skripsi->topik->mahasiswa->user->name }}' readonly>
                    </div>

                    <div class="mb-3">
                        <label for="dosen_id" class="form-label">Penguji</label>
                        <select class="form-select" aria-label="Default select example" id='dosen_id' name='dosen_id'
                            required value="{{ old('dosen_id', $jadwal->skripsi->topik->dosen->id) }}">
                            <option disabled selected>---Pilih Penguji---</option>
                            @foreach ($dosen as $dsn)
                                <option value="{{ $dsn->id }}">{{ $dsn->user->name }}</option>
                            @endforeach

                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="link_sidang" class="form-label">Link Meeting Sidang</label>

                        <input type="text" class="form-control" id="link_sidang" name='link_sidang'
                            value="{{ old('link_sidang', $jadwal->link_sidang) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="link_seminar" class="form-label">Link Meeting Seminar</label>
                        <input type="text" class="form-control" id="link_seminar" name='link_seminar'
                            value="{{ old('link_seminar', $jadwal->link_seminar) }}" required>
                    </div>




                    {{-- Tanggal --}}
                    <div class="mb-3">
                        <label for="tgl_sidang" class="form-label">Tanggal Sidang</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <button type="button" id="toggle_sidang" class="input-group-text">
                                    <i class="fas fa-calendar-alt"></i>
                                </button>
                            </div>
                            <input type="text" class="form-control" id="tgl_sidang" name='tgl_sidang'
                                value="{{ old('tgl_sidang', $jadwal->tgl_sidang) }}" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="tgl_seminar" class="form-label">Tanggal Seminar</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <button type="button" id="toggle_seminar" class="input-group-text">
                                    <i class="fas fa-calendar-alt"></i>
                                </button>
                            </div>
                            <input type="text" class="form-control" id="tgl_seminar" name='tgl_seminar'
                                value="{{ old('tgl_seminar', $jadwal->tgl_seminar) }}" required>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>

        </div>
    </div>


@endsection
