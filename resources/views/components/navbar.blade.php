<!-- ***** Header Area Start ***** -->
<header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="{{route('welcome')}}" class="logo">
                        {{-- <img src="{{ assets/images/logo.png" alt=""> --}}
                        Aksawiyata
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li><a href="{{ route('welcome') }}" class="active">Beranda</a></li>
                        <li><a href="{{ route('jobs') }}">Posisi</a></li>
                        <li><a href="{{ route('contact') }}">Kontak</a></li>
                        @auth
                            <li><a href="{{  route('dashboard') }}">Hi, {{Auth::user()->username }}</a></li>
                            <li>
                                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit()">Keluar</a>
                                <form id="logout-form" action="{{route('logout')}}" method="post" style="display:none">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                </form>
                            </li>
                        @else
                            <li><a href="{{ route('user.logina')}}">Masuk ke Akun</a></li>
                        @endauth
                    </ul>   
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- ***** Header Area End ***** -->