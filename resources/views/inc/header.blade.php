<nav class="navbar navbar-expand-lg navbar-dark scrolling-navbar bg-light fixed-top" id="header">
    <div class="container">
        <a class="navbar-brand" href="{{ route('main') }}"><img src="{{ asset('image/logo.svg') }}" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item pt-2 ">
                    <p class="h6 text-white font-weight-bold text-center" style="line-height: 1.6rem"> Межрегональное управление Государственной инспекции по экологической
                         и технической безопаности по г. Бишкек  </p>
                </li>
                <li class="nav-item pt-2 text-center">
                    <button class="btn btn-outline-white btn-md my-0 ml-sm-2">Карта объекта</button>
                </li>
                <li class="nav-item pt-2 text-center">
                    <button class="btn btn-outline-white btn-md my-0 ml-sm-2">Админ панель</button>
                </li>
                 @if(Auth::user())
                <li class="nav-item pt-2 text-center">
                    <a href="{{ route('login') }}" class="btn btn-outline-white btn-md my-0 ml-sm-2">Войти</a>
                </li>
                 @endif
            </ul>
        </div>
    </div>
</nav>

