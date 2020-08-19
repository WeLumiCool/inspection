<div class="sidebar-fixed position-fixed">
    <div class="list-group list-group-flush">
        <a href="{{ route('admin.dashboard') }}"
           class="list-group-item list-group-item-action waves-effect {{ request()->is('admin/dashboard*') ? 'active' : '' }}">
            <i class="fas fa-tachometer-alt mr-3"></i>{{ __('Dashboard') }}</a>

        <a href="{{ route('admin.types.index') }}"
           class="list-group-item list-group-item-action waves-effect {{ request()->is('admin/type*') ? 'active' : '' }}">
            <i class="fa fa-user mr-3"></i>{{ __('Типы') }}</a>

    </div>
</div>
