<nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar bg-light ">
    <div class="container">

        <a class="navbar-brand" href="#"><img src="{{ asset('image/logo.svg') }}" alt=""></a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            @if(Auth::user())
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item pt-2">
                        <button onclick="document.getElementById('logout-form-auth').submit();"
                                class="btn btn-outline-white btn-md my-0 ml-sm-2">Выйти
                        </button>
                        <form id="logout-form-auth" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            @endif
        </div>
    </div>
</nav>

