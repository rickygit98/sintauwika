@extends('layouts.authmain')
@section('content')
    <div class="login-page" style="height: 90%;">
        <div class="login-box">
            <div class="login-logo">
                <a href="adminlte/index2.html"><b>SINTA</b> UWIKA</a>
            </div>
            <!-- /.login-logo -->
            <div class="card">
                <div class="card-body login-card-body">
                    <p class="login-box-msg">Log In untuk memulai bimbingan Anda !</p>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="input-group mb-3">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" placeholder="Enter Email" required
                                autocomplete="email" autofocus>
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


                        <div class="input-group mb-3">
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password"
                                placeholder="Enter Password" required autocomplete="current-password">
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
                        <div class="row">

                            <!-- /.col -->
                            <div class="col-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>

                    <p class="mb-0">
                        <a class="nav-link text-center" href="{{ route('register') }}">Register new
                            Account</a>
                    </p>
                </div>
                <!-- /.login-card-body -->
            </div>
        </div>
        <!-- /.login-box -->


    </div>
@endsection
