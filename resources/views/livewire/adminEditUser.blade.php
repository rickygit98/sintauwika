    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="editUser" tabindex="-1" aria-labelledby="editUserLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editUserLabel">Edit User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form>
                        @csrf

                        {{-- FULL NAME --}}
                        <input type="hidden" name='id_user' wire:model='id_user'>
                        <div class="input-group mb-3">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ old('name') }}" placeholder="Full Name" required
                                autocomplete="name" autofocus wire:model='name'>

                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                        </div>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        {{-- USERNAME --}}
                        <div class="input-group mb-3">
                            <input id="username" type="text"
                                class="form-control @error('username') is-invalid @enderror" name="username"
                                value="{{ old('username') }}" placeholder="Username" required autocomplete="username"
                                autofocus wire:model='username'>

                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                        </div>
                        @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        {{-- EMAIL --}}
                        <div class="input-group mb-3">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" placeholder="Enter Email" required
                                autocomplete="email" wire:model='email'>

                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        {{-- ROLES SELECTION --}}
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <select name="role_id" id="role_id" required class="form-control"
                                    wire:model='role_id'>
                                    <option value="">Choose Role</option>
                                    <option value="1">Admin</option>
                                    <option value="2">Dosen</option>
                                    <option value="3">Mahasiswa</option>
                                </select>
                            </div>
                        </div>

                        {{-- NRP , NIP , ID Admin --}}

                        <div class="input-group mb-3" id="an">

                            <input id="id_num" type="text" class="form-control" name="id_num"
                                value="{{ old('id_num') }}" placeholder="Enter User ID" maxlength="8"
                                wire:model='id_num'>

                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-id-card"></span>
                                </div>
                            </div>
                        </div>


                        {{-- Contact --}}
                        <div class="input-group mb-3">

                            <input id="contact" type="text" class="form-control" name="contact" value="+62" required
                                wire:model='contact'>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-phone"></span>
                                </div>
                            </div>
                            @error('contact')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        {{-- Password --}}
                        <div class="input-group mb-3">
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password"
                                placeholder="Enter Password" required autocomplete="new-password" minlength="5"
                                wire:model='password'>

                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" wire:click.prevent='updateUser()'>Update</button>
                </div>
            </div>
        </div>
    </div>
