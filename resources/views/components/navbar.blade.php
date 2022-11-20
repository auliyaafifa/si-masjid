<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">Masjid Baitul Amin</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                @if (Route::has('login'))
                @auth
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
                @else

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                </li>
                @endauth
                @endif
                <li class="nav-item">
                    <a class="nav-link" href="/jamaah/laporan">Laporan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/jamaah/pemasukan">Pemasukan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/jamaah/pengeluaran">Pengeluaran</a>
                </li>
            </ul>
        </div>
    </div>
</nav>