<nav class="navbar navbar-expand-lg navbar-dark bg-primary position-relative shadow py-3" style="height: auto;">
    <div class="container-fluid">
        <a href="/" class="navbar-brand">Masjid Baitul Amin</a>
            {{-- <img src="img/logo.png">  --}}
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto">
                {{-- <a href="/jamaah/pemasukan"
                    class="nav-item nav-link {{ Request::path() ==  'jamaah/pemasukan' ? 'active' : ''  }}">Pemasukan</a>
                <a href="/jamaah/pengeluaran"
                    class="nav-item nav-link {{ Request::path() ==  'jamaah/pengeluaran' ? 'active' : ''  }}">Pengeluaran</a> --}}
                <div class="nav-item dropdown">
                    <a class="nav-item nav-link dropdown-toggle {{ Request::path() ==  'jamaah/laporan' ? 'active' : ''  }}"
                        data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Laporan</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/jamaah/laporan">Laporan Tahunan</a></li>
                        <li><a class="dropdown-item" href="/jamaah/laporan/bulanan">Laporan Bulanan</a></li>
                    </ul>
                </div>

                <div class="navbar-nav ms-auto">
                    @if (Route::has('login'))
                    @auth
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route('home') }}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Keluar</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                    @else

                    <li class="nav-item ms-auto">
                        <a class="nav-link" href="{{ route('login') }}">Masuk</a>
                    </li>
                    @endauth
                    @endif
                </div>
            </div>
        </div>
    </div>
</nav>