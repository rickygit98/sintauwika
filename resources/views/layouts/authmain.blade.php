<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SINTA UWIKA | LOG IN</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="adminlte/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="adminlte/dist/css/adminlte.min.css">
    <style type="text/css"></style>

    <style>
        .addremoved {
            display: none;
        }

    </style>

</head>

<body>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                SINTA UWIKA APP
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <!-- <li class="nav-item dropdown"> -->
                        <!-- <a>
                                                                                                                                                                                                {{ Auth::user()->name }}
                                                                                                                                                                                            </a> -->


                        <!-- </li> -->
                        <?php
                    if(Auth::user()->role_id == 1){
                        $ad = DB::table('admins')->where('user_id', Auth::id() )->first();
                        ?>
                        <h4>Admin role</h4>
                        <p style="color:red;margin-left: 5px;margin-right: 20px;">{{ $ad->id_num }}</p>
                        <?php 
                    }
                    else if(Auth::user()->role_id == 2){
                        $le = DB::table('lecturers')->where('user_id', Auth::id() )->first();
                        ?>
                        <h4>Dosen role</h4>
                        <p style="color:red;margin-left: 5px;margin-right: 20px;">{{ $le->nip }}</p>
                        <?php 
                     }
                    else if(Auth::user()->role_id == 3){
                        $st = DB::table('students')->where('user_id', Auth::id() )->first();
                        ?>
                        <h4>Mahasiswa role</h4>
                        <p style="color:red;margin-left: 5px;margin-right: 20px;">{{ $st->nrp }}</p>
                        <?php 
                    }
                    ?>
                        <div>
                            <a class="btn btn-primary" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                                                                                                                                                                                 document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>


    @yield('content')



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

    <!-- jQuery -->
    <script src="adminlte/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="adminlte/dist/js/adminlte.min.js"></script>
</body>

</html>
