<nav class="navbar navbar-expand-lg bg-light shadow-sm">
    <div class="container-fluid">
        <a href="/" class="navbar-brand">Masjid Baitul Amin</a>
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav">
                <a href="/jamaah/pemasukan" class="nav-item nav-link">Pemasukan</a>
                <a href="/jamaah/pengeluaran" class="nav-item nav-link">Pengeluaran</a>
                <div class="nav-item dropdown">
                    <a class="nav-item nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Laporan</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/jamaah/laporan">Laporan Tahunan</a></li>
                        <li><a class="dropdown-item" href="/jamaah/laporan/bulanan">Laporan Bulanan</a></li>
                    </ul>
                </div>
            </div>
            <div class="navbar-nav ms-auto">
                @if (Route::has('login'))
                @auth
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
                @else

                <li class="nav-item ms-auto">
                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                </li>
                @endauth
                @endif
            </div>
        </div>
    </div>
</nav>