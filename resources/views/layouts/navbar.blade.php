<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <!-- Logo atau Nama Website -->
        <a class="navbar-brand" href="#">Tes Al Irsyad</a>

        <!-- Button hamburger untuk layar kecil -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu"
            aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menu navigasi -->
        <div class="collapse navbar-collapse justify-content-end" id="navbarMenu">
            @if (Auth::check())
                <ul class="navbar-nav mb-2 mb-lg-0 ">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('pengiriman.index') }}">Pengiriman</a>
                    </li>
                    @if (Auth::user()->role == 'admin')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('pegawai.index') }}">Pegawai</a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('siswa.index') }}">Siswa</a>
                    </li>
                </ul>
                <button class="btn btn-sm btn-outline-dark mx-3" type="button" disabled
                    title="{{ Auth::user()->name }}">{{ Auth::user()->name }} ({{ Auth::user()->role }})
                </button>
                <form action="{{ route('logout') }}" method="POST"
                    onsubmit="return confirm('Apakah Anda yakin ingin logout?')">
                    @csrf
                    <button class="btn btn-sm btn-outline-dark" type="submit" title="Logout">
                        <i class="fa-solid fa-arrow-right-from-bracket"></i> </button>
                </form>
            @else
                <ul class="navbar-nav mb-2 mb-lg-0 mx-4">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login.show') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register.show') }}">Register</a>
                    </li>
                </ul>
            @endif
        </div>
    </div>
</nav>
