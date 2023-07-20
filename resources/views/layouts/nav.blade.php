<nav class="navbar navbar-expand-md navbar-dark bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/beranda') }}">
           <b style="font-size: 1.3em" >LobsterIndo</b>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">
                @auth
                @if (Auth::user()->role === 'customer')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('beranda') }}">{{ __('Beranda') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('partnership.index') }}">{{ __('Partnership') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ URL('/menubelanja') }}">{{ __('Belanja') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('riwayat.pembelian') }}">{{ __('Riwayat Pembelian') }}</a>
                        </li>
                        @elseif (Auth::user()->role === 'cabang')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('beranda') }}">{{ __('Beranda') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('partnership.index') }}">{{ __('Partnership') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('pemesanan.index') }}">{{ __('Pemesanan') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('stock.index') }}">{{ __('Update Stock') }}</a>
                        </li>
                        @elseif (Auth::user()->role === 'kurir')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('beranda') }}">{{ __('Beranda') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('partnership.index') }}">{{ __('Partnership') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('pengiriman.index') }}">{{ __('Pengiriman') }}</a>
                        </li>
                        @elseif (Auth::user()->role === 'owner')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('beranda') }}">{{ __('Beranda') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('partnership.index') }}">{{ __('Partnership') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('riwayat-penjualan.index') }}">{{ __('Penjualan') }}</a>
                        </li>
                    @endif
                @endauth
            </ul>

        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest
                    <!-- Menu items for guest -->
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login or Register') }}</a>
                        </li>
                    @endif

                @else
                    <!-- Menu items for authenticated users -->
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <a class="dropdown-item" href="{{ route('profile.index') }}">
                                {{ __('Profile') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>