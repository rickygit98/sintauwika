@extends('layouts.app')

@section('content')
    <style>
        .addremoved {
            display: none;
        }

    </style>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" value="{{ old('name') }}" placeholder="Enter Name" required
                                        autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Select Role</label>

                                <div class="col-md-6">
                                    <select name="roles" id="cars" onchange="changeRole(this.value)" required
                                        class="form-control">
                                        <option value="">Choose Role</option>
                                        <option value="1">Admin</option>
                                        <option value="2">Dosen</option>
                                        <option value="3">Mahasiswa</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" placeholder="Enter Email" required
                                        autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3 addremoved" id="sn">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Mahasiswa Number</label>

                                <div class="col-md-6">
                                    <input id="nrp" type="text" class="form-control" name="nrp"
                                        value="{{ old('nrp') }}" placeholder="Enter Number">
                                </div>
                            </div>

                            <div class="row mb-3 addremoved" id="ln">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Dosen Number</label>

                                <div class="col-md-6">
                                    <input id="nip" type="text" class="form-control" name="nip"
                                        value="{{ old('nip') }}" placeholder="Enter Number">
                                </div>
                            </div>

                            <div class="row mb-3 addremoved" id="an">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Admin Number</label>

                                <div class="col-md-6">
                                    <input id="id_num" type="text" class="form-control" name="id_num"
                                        value="{{ old('id_num') }}" placeholder="Enter Number">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Contact</label>

                                <div class="col-md-6">
                                    <input id="contact" type="text" class="form-control" name="contact" value="+62"
                                        required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        placeholder="Enter Password" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" placeholder="Enter Password Confirmation" required
                                        autocomplete="new-password">
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function changeRole(role) {
            if (role == 1) {
                document.getElementById("an").classList.remove("addremoved")
                document.getElementById("ln").classList.add("addremoved")
                document.getElementById("sn").classList.add("addremoved")
            } else if (role == 2) {
                document.getElementById("ln").classList.remove("addremoved")
                document.getElementById("an").classList.add("addremoved")
                document.getElementById("sn").classList.add("addremoved")

            } else if (role == 3) {
                document.getElementById("sn").classList.remove("addremoved")
                document.getElementById("an").classList.add("addremoved")
                document.getElementById("ln").classList.add("addremoved")
            } else {
                document.getElementById("sn").classList.add("addremoved")
                document.getElementById("an").classList.add("addremoved")
                document.getElementById("ln").classList.add("addremoved")
            }
        }
    </script>
@endsection
