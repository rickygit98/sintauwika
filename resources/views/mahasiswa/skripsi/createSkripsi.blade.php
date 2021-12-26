@extends('layouts.mhsmain')
@section('content')
    <!-- Page Content  -->
    <section id="">
        <div class="col-lg-8">

            <form action="/mahasiswa/skripsi" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <input type="hidden" class="form-control" id="mahasiswa_id" name="mahasiswa_id" value="2">
                </div>
                <div class="mb-3">
                    <input type="hidden" class="form-control" id="skripsi_id" name="skripsi_id" value="">
                </div>

                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                        required value="{{ old('title') }}">
                    @error('title')
                        <div class="invalid-feedback">
                            {{ message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="slug" class="form-label">Slug</label>
                    <input type="text" class="form-control @error('slug') is-invalid @enderror " id="slug" name="slug"
                        required value="{{ old('slug') }}">
                    @error('slug')
                        <div class="invalid-feedback">
                            {{ message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="dosen1_id" class="form-label">Dosen Pembimbing 1</label>
                    <select class="form-select" aria-label="Default select example" id='dosen1_id' name='dosen1_id'
                        required value="{{ old('dosen1_id') }}">
                        <option disabled selected>---Pilih Pembimbing 1---</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="dosen2_id" class="form-label">Dosen Pembimbing 2</label>
                    <select class="form-select" aria-label="Default select example" id='dosen2_id' name='dosen2_id'
                        required value="{{ old('dosen2_id') }}">
                        <option disabled selected>---Pilih Pembimbing 2---</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>


                <div class="mb-3">
                    <label for="link" class="form-label">Input Link Docs</label>
                    <input class="form-control" type="text" id="link" name="link">
                </div>

                <div class="mb-3">
                    <label for="file" class="form-label">Input File</label>
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
