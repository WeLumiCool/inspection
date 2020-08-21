<div class="sidebar-fixed position-fixed">
    <div class="list-group list-group-flush">
        <a class="navbar-brand pt-3 " href="{{ route('main') }}"><img src="{{ asset('image/logo.svg') }}" alt=""></a>

        <a href="{{ route('admin.dashboard') }}"
           class="list-group-item list-group-item-action waves-effect {{ request()->is('admin/dashboard*') ? 'active' : '' }}">
            <i class="fas fa-tachometer-alt mr-3"></i>{{ __('Dashboard') }}</a>

        <a href="{{ route('admin.types.index') }}"
           class="list-group-item list-group-item-action waves-effect {{ request()->is('admin/type*') ? 'active' : '' }}">
            <i class="fa fa-user mr-3"></i>{{ __('Типы') }}</a>
        <a href="{{ route('admin.users.index') }}"
           class="list-group-item list-group-item-action waves-effect {{ request()->is('admin/user*') ? 'active' : '' }}">
            <i class="fa fa-user mr-3"></i>{{ __('Пользовтели') }}</a>

        <a href="{{ route('admin.builds.index') }}"
           class="list-group-item list-group-item-action waves-effect {{ request()->is('admin/builds*') ? 'active' : '' }}">
            <i class="fa fa-user mr-3"></i>{{ __('Объекты') }}</a>

    </div>
</div>
