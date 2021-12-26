@extends('layouts.dsnmain')

@section('content')
    <section id="">
        <div class="col-lg-8">

            <form action="/dosen/skripsi/{{ $skripsi->id }}" method="POST" enctype="multipart/form-data">
                @method('put')
                @csrf

                <div class="mb-3">
                    <input type="hidden" class="form-control" id="topik_id" name="topik_id"
                        value="{{ $skripsi->topik->id }}">
                </div>

                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                        required value="{{ old('title', $skripsi->topik->title) }}" disabled>
                    @error('title')
                        <div class="invalid-feedback">
                            {{ message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="kategori_id" class="form-label">Kategori Skripsi</label>
                    <select class="form-select" aria-label="Default select example" id='kategori_id' name='kategori_id'
                        required disabled>
                        @foreach ($kategori as $kt)
                            @if (old('kategori_id', $skripsi->topik->kategori->id) == $kt->id)
                                <option value="{{ $kt->id }}" selected>{{ $kt->name }}</option>
                            @else
                                <option value="{{ $kt->id }}">{{ $kt->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="dosen_id" class="form-label">Dosen Pembimbing</label>
                    <input type="text" class="form-control @error('dosen_id') is-invalid @enderror" id="dosen_id"
                        name="dosen_id" required value="{{ old('dosen_id', $skripsi->topik->dosen->user->name) }}"
                        disabled>
                </div>
                <br>

                Bisa pilih salah satu atau keduannya
                <hr>

                <div class="mb-3">
                    <label for="link" class="form-label">Input Link Docs</label>
                    <input class="form-control" type="text" id="link" name="link"
                        value="{{ old('link', $skripsi->link) }}">
                </div>

                <div class="mb-3">
                    <label for="file" class="form-label">Input File</label>
                    <input type="hidden" value="{{ $skripsi->file }}" id="old_file" name="old_file">
                    <input class="form-control" type="file" id="file" name="file">
                </div>

                <div class="mb-3">
                    <label for="subject" class="form-label">Subject</label>
                    <input type="text" class="form-control @error('subject') is-invalid @enderror " id="subject"
                        name="subject" required value="{{ old('subject') }}">
                    @error('subject')
                        <div class="invalid-feedback">
                            {{ message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="comment" class="form-label">Comment</label>
                    @error('comment')
                        <div class="invalid-feedback">
                            {{ message }}
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
