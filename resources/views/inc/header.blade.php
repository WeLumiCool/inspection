<nav class="navbar navbar-expand-lg navbar-dark scrolling-navbar bg-light" id="header">
    <div class="container">
        <a class="navbar-brand" href="{{ route('main') }}"><img src="{{ asset('image/logo.svg') }}" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">

                @if(Auth::user())
                    @if(Auth::user()->role->is_admin)
                        <li class="nav-item pt-2">
                            <a href="{{ route('admin.admin') }}" class="btn btn-outline-white btn-md my-0 ml-sm-2">Админ панель</a>
                        </li>
                    @endif
                @endif
                @if(Auth::user())
                    <li class="nav-item pt-2">
                        <button onclick="document.getElementById('logout-form-auth').submit();"
                                class="btn btn-outline-white btn-md my-0 ml-sm-2">Выйти
                        </button>
                        <form id="logout-form-auth" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
@push('scripts')
    <script>
        let header = $('#header');
        $(window).scroll(function () {
            if (window.pageYOffset > 100) header.addClass('fixed-top');
            if (window.pageYOffset == 0 && window.pageYOffset <= 100) header.removeClass('fixed-top');
        })
    </script>
@endpush
