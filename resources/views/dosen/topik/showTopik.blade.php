<!-- Main content -->
@extends('layouts.dsnmain')
@section('content')
    <a class="btn btn-primary ms-4" href="/dosen/topik/"> <i class="fas fa-arrow-alt-circle-left"></i> Back To List</a>
    <div class="container d-flex justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-dark">
                    <h3 class="card-title">
                        <i class="fas fa-info-circle"></i>
                        Detail
                    </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <dl class="row">
                        <dt class="col-sm-4">Title</dt>
                        <dd class="col-sm-8">{{ $topik->title }}</dd>

                        <dt class="col-sm-4">Kategori</dt>
                        <dd class="col-sm-8">{{ $topik->kategori->name }}</dd>

                        <dt class="col-sm-4">Diajukan Oleh</dt>
                        <dd class="col-sm-8">{{ $topik->mahasiswa->user->name }}</dd>

                        <dt class="col-sm-4">Comment</dt>
                        <dd class="col-sm-8">{!! $topik->comment !!}</dd>
                    </dl>
                </div>
                <div class="">
                    <form action="/dosen/topik/{{ $topik->id }}" method="post" class="d-inline">
                        @method('put')
                        @csrf
                        <input type="hidden" id="status" name="status">
                        <input type="hidden" id="contact" name="contact" value="{{ $topik->mahasiswa->user->contact }}">
                        <input type="hidden" id="email" name="email" value="{{ $topik->mahasiswa->user->email }}">

                        <button class="btn bg-danger border-0 col-sm-5" id="btnTolak" type="submit"
                            onclick="return confirm('Apakah anda yakin ingin menolak Topik?')">
                            <i class="fas fa-minus-circle fa-lg"></i> Tolak Topik
                        </button>

                        <button class="btn bg-warning border-0 col-sm-5" id="btnTerima" type="submit"
                            onclick="return confirm('Apakah anda yakin ingin menerima Topik?')">
                            <i class="fas fa-check fa-lg"></i> Terima Topik
                        </button>

                    </form>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection
