@extends('layouts.authmain')

@section('content')

    <div class="register-page" style="max-height: 90%;">
        <div class="register-box">
            <div class="register-logo">
                <a href="/home/"><b>SINTA</b> UWIKA</a>
            </div>

            <div class="card">
                <div class="card-body register-card-body">
                    <p class="login-box-msg">Register a new account</p>

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        {{-- FULL NAME --}}
                        <div class="input-group mb-3">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                value="{{ old('name') }}" placeholder="Full Name" required autocomplete="name" autofocus>

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
                            <input id="username" type="text" class="form-control @error('username') is-invalid @enderror"
                                name="username" value="{{ old('username') }}" placeholder="Username" required
                                autocomplete="username" autofocus>

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


                        {{-- ROLES SELECTION --}}
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <select name="role_id" id="role_id" onchange="changeRole(this.value)" required
                                    class="form-control">
                                    <option value="">Choose Role</option>
                                    <option value="1">Admin</option>
                                    <option value="2">Dosen</option>
                                    <option value="3">Mahasiswa</option>
                                </select>
                            </div>
                        </div>

                        {{-- EMAIL --}}
                        <div class="input-group mb-3">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" placeholder="Enter Email" required
                                autocomplete="email">

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


                        {{-- NRP , NIP , ID Admin --}}
                        <div class="input-group mb-3 addremoved" id="sn">

                            <input id="nrp" type="text" class="form-control" name="nrp" value="{{ old('nrp') }}"
                                placeholder="Enter NRP" maxlength="8">

                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-id-card"></span>
                                </div>
                            </div>
                        </div>

                        <div class="input-group mb-3 addremoved" id="ln">

                            <input id="nip" type="text" class="form-control" name="nip" value="{{ old('nip') }}"
                                placeholder="Enter NIP" maxlength="8">

                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-id-card"></span>
                                </div>
                            </div>
                        </div>

                        <div class="input-group mb-3 addremoved" id="an">


                            <input id="id_num" type="text" class="form-control" name="id_num"
                                value="{{ old('id_num') }}" placeholder="Enter Admin ID" maxlength="8">

                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-id-card"></span>
                                </div>
                            </div>
                        </div>


                        {{-- Contact --}}
                        <div class="input-group mb-3">

                            <input id="contact" type="text" class="form-control" name="contact" value="+62" required>
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
                                placeholder="Enter Password" required autocomplete="new-password" minlength="5">

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

                        {{-- Retype Password --}}
                        <div class="input-group mb-3">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                                placeholder="Enter Password Confirmation" required autocomplete="new-password"
                                minlength="5">

                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>



                        {{-- Button Submit --}}
                        <div class="row">
                            <!-- /.col -->
                            <div class="col-4">
                                <button type="submit" class="btn btn-primary btn-block"> {{ __('Register') }}</button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>


                    <a class="nav-link" href="{{ route('login') }}">Already has an Account</a>

                </div>
                <!-- /.form-box -->
            </div><!-- /.card -->
        </div>
        <!-- /.register-box -->




    </div>

@endsection
