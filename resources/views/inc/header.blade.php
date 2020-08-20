<nav class="navbar navbar-expand-lg navbar-dark scrolling-navbar bg-light" id="header">
    <div class="container">
        <a class="navbar-brand" href="{{ route('main') }}"><img src="{{ asset('image/logo.svg') }}" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item pt-2">
                    <button class="btn btn-outline-white btn-md my-0 ml-sm-2">Админ панель</button>
                </li>
                 @if(Auth::user())
                <li class="nav-item pt-2">
                    <a href="{{ route('login') }}" class="btn btn-outline-white btn-md my-0 ml-sm-2">Войти</a>
                </li>
                 @endif
            </ul>
        </div>
    </div>
</nav>
@push('scripts')
    <script>
        let header = $('#header'),
            window = $(window);
        window.scroll(function() {
            if(window.screenTop > 100) header.addClass('fixed-top');
            if(window.screenTop == 0 && window.screenTop <= 100) header.removeClass('fixed-top');
        })
    </script>
@endpush
