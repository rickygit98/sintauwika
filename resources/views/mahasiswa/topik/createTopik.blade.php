@extends('layouts.mhsmain')
@section('content')
    <!-- Page Content  -->
    <section id="">
        <div class="col-lg-8">

            <form action="/mahasiswa/topik/" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- Untuk mendapat mahasiswa ID seharusnya pakai method auth()->user()->id --}}
                <div class="mb-3">
                    <input type="hidden" class="form-control" id="mahasiswa_id" name="mahasiswa_id"
                        value="{{ $mahasiswa->id }}">
                </div>

                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                        required value="{{ old('title') }}">
                    @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>


                <div class="mb-3">
                    <label for="kategori_id" class="form-label">Kategori Skripsi</label>
                    <select class="form-select" aria-label="Default select example" id='kategori_id' name='kategori_id'
                        required>
                        @foreach ($kategori as $kt)
                            @if (old('kategori_id') == $kt->id)
                                <option value="{{ $kt->id }}" selected>{{ $kt->name }}</option>
                            @else
                                <option value="{{ $kt->id }}">{{ $kt->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="dosen_id" class="form-label">Dosen Pembimbing</label>
                    <select class="form-select" aria-label="Default select example" id='dosen_id' name='dosen_id'
                        required value="{{ old('dosen_id') }}">
                        <option disabled selected>---Pilih dosen pembimbing---</option>
                        @foreach ($dosen as $dsn)
                            <option value="{{ $dsn->id }}">{{ $dsn->user->name }}</option>
                        @endforeach

                    </select>
                </div>


                <div class="mb-3">
                    <label for="comment" class="form-label">Comment</label>
                    @error('comment')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    <input id="comment" type="hidden" name="comment" class="@error(' comment') is-invalid @enderror"
                        required value="{{ old('comment') }}">
                    <trix-editor input="comment"></trix-editor>

                </div>


                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </section>

@endsection
