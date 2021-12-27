@if ($topik->count() == 0)
    <div class="col-12">
        <div class="card">

            @if (session()->has('success'))
                <div class="mx-3">
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <i data-feather="check"></i>
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            @endif

            <div class="card-header">
                <h3 class="card-title">Belum ada Topik yang diajukan saat ini</h3>
            </div>
            <!-- ./card-header -->
            <div class="card-body">
                <img src="https://64.media.tumblr.com/f74633365530a38b62a3b30f3d41e8cf/2335c431e4074bd3-c2/s1280x1920/aaf32833587c816ffbf2921ce51d9f958e6a0160.jpg"
                    style="width:200px" alt="">
            </div>
        </div>
    </div>

@else
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">DAFTAR TOPIK</h3>
            </div>
            <!-- ./card-header -->
            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Judul Topik</th>
                            <th>Kategori Topik</th>
                            <th>Mahasiswa</th>
                            <th>Pembimbing</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($topik as $t)
                            <tr data-widget="expandable-table" aria-expanded="false">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $t->title }}</td>
                                <td>{{ $t->kategori->name }}</td>
                                <td>{{ $t->mahasiswa->user->name }}</td>
                                <td>{{ $t->dosen->user->name }}</td>
                                @if ($t->status == 'Diterima')
                                    <td><span class="badge badge-success p-2">{{ $t->status }}</span></td>
                                @else
                                    <td><span class="badge badge-danger p-2">{{ $t->status }}</span></td>
                                @endif
                                <td>
                                    <button class="badge bg-primary border-0 p-2" type="button" data-bs-toggle="modal"
                                        data-bs-target="#showTopik" wire:click.prevent='showTopik({{ $t->id }})'>
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    @include('admin.topik.showTopik')
                                </td>

                            </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>






@endif
