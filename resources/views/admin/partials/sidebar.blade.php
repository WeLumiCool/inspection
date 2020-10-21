<div class="sidebar-fixed position-fixed">
    <div class="list-group list-group-flush ">
        <a href="{{ route('main') }}" class="logo-wrapper waves-effect mb-3" style="text-align: center;padding-top: 10px;">
            <img src="{{ asset('image/admin_logo.svg') }}" class="img-fluid" alt="logo" >
        </a>

        <a href="{{ route('admin.builds.index') }}"
           class="list-group-item list-group-item-action waves-effect {{ request()->is('admin/builds*') ? 'active' : '' }}">
            <i class="fas fa-building mr-3"></i>{{ __('Объекты') }}</a>

        <a href="{{ route('admin.types.index') }}"
           class="list-group-item list-group-item-action waves-effect {{ request()->is('admin/type*') ? 'active' : '' }}">
            <i class="fas fa-vector-square mr-3"></i>{{ __('Типы') }}</a>
        <a href="{{ route('admin.users.index') }}"
           class="list-group-item list-group-item-action waves-effect {{ request()->is('admin/user*') ? 'active' : '' }}">
            <i class="fas fa-users mr-3"></i>{{ __('Пользовтели') }}</a>
        <a href="{{ route('admin.centrals.index') }}"
           class="list-group-item list-group-item-action waves-effect d-flex {{ request()->is('admin/central*') ? 'active' : '' }}">
            <i class="fas fa-landmark mr-3 mt-3"></i>{{ __('Центральный аппарат') }}</a>
        <a href="{{ route('admin.cities.index') }}"
           class="list-group-item list-group-item-action waves-effect d-flex {{ request()->is('admin/cit*') ? 'active' : '' }}">
            <i class="fas fa-building mr-3 mt-3"></i>{{ __('Межрегиональное управление') }}</a>

    </div>
</div>
