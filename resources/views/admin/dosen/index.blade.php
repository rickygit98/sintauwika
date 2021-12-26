<div class="card">
    <div class="card-header">
        <h3 class="card-title">DAFTAR Dosen</h3>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i data-feather="check"></i>
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @include('admin.dosen.createDosen')
    @include('admin.dosen.editDosen')

    <!-- /.card-header -->
    <div class="card-body">

        <!-- Button trigger modal -->

        <div class="row mb-1">
            <!-- Button trigger modal -->
            <div class="col">

                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addDsn">
                    Create New Dosen
                </button>
            </div>



            <div class="input-group col-md-6"">

                <input type=" text" class="form-control" placeholder="Search ..." aria-label="searchKeyword"
                aria-describedby="button-addon2" name="keyword" wire:model='keyword'>
            </div>
        </div>




        <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
            <div class="row">
                <div class="col-sm-12 col-md-6"></div>
                <div class="col-sm-12 col-md-6"></div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <table id="example2" class="table table-bordered table-hover dataTable dtr-inline collapsed"
                        role="grid" aria-describedby="example2_info">
                        <thead>
                            <tr role="row">
                                <th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1"
                                    colspan="1" aria-sort="ascending"
                                    aria-label="Rendering engine: activate to sort column descending">Name
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending">NIP</th>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending">Email</th>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-label="Platform(s): activate to sort column ascending">Contact</th>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-label="CSS grade: activate to sort column ascending">
                                    Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                @foreach ($user->dosen as $ds)

                                    <tr class="odd">
                                        <td class="dtr-control sorting_1" tabindex="0">{{ $user->name }}</td>
                                        <td class="dtr-control sorting_1" tabindex="0">{{ $ds->nip }}</td>
                                        <td class="dtr-control sorting_1" tabindex="0">{{ $user->email }}</td>
                                        <td class="dtr-control sorting_1" tabindex="0">{{ $user->contact }}</td>
                                        <td class="dtr-control sorting_1" tabindex="0">


                                            <button wire:click.prevent='showDosen({{ $user->id }})'
                                                class="badge bg-warning border-0 p-2" type="button"
                                                data-bs-toggle="modal" data-bs-target="#editDsn">
                                                <i class="fas fa-user-edit"></i>
                                            </button>

                                            <button wire:click.prevent='deleteDosenConfirm({{ $user->id }})'
                                                class="badge bg-danger border-0 p-2" type="button">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>


                                        </td>
                                    </tr>
                                @endforeach

                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
            <div class="d-flex justify-content-end">

                {{ $users->links() }}

            </div>
        </div>
    </div>
    <!-- /.card-body -->
</div>
