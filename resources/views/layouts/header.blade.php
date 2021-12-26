<nav class="main-header navbar navbar-expand navbar-black navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="/home" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="/about" class="nav-link">About</a>
        </li>
    </ul>

    <!-- Right navbar links -->
    {{-- <ul class="navbar-nav ml-auto">

        <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                <i class="fas fa-th-large"></i>
            </a>
        </li>
    </ul> --}}

    <ul class="navbar-nav ml-auto">

        <li class="nav-item">
            <a class="nav-link nav-icon" href="{{ route('logout') }}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
                <i class="nav-icon fas fa-sign-out-alt"></i>
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>

        </li>
    </ul>
</nav>
