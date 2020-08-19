<div class="sidebar-fixed position-fixed">
    <a href="{{ route('main') }}" class="logo-wrapper waves-effect">
        <img src="{{ asset('logo/logo.png') }}" class="img-fluid" alt="logo">
    </a>
    <div class="list-group list-group-flush">
        <a href="{{ route('admin.dashboard') }}"
           class="list-group-item list-group-item-action waves-effect {{ request()->is('admin/dashboard*') ? 'active' : '' }}">
            <i class="fas fa-tachometer-alt mr-3"></i>{{ __('Dashboard') }}</a>

        <a href="{{ route('admin.users.index') }}"
           class="list-group-item list-group-item-action waves-effect {{ request()->is('admin/user*') ? 'active' : '' }}">
            <i class="fa fa-user mr-3"></i>{{ __('Пользователи') }}</a>

        <a href="{{ route('admin.roles.index') }}"
           class="list-group-item list-group-item-action waves-effect {{ request()->is('admin/role*') ? 'active' : '' }}">
            <i class="fas fa-users mr-3 "></i>{{ __('Роли') }}</a>

        <a href="{{ route('admin.projects.index') }}"
           class="list-group-item list-group-item-action waves-effect {{ request()->is('admin/project*') ? 'active' : '' }}">
            <i class="fas fa-project-diagram mr-3"></i>{{ __('Проекты') }}</a>

        <a href="{{ route('admin.files.index') }}"
           class="list-group-item list-group-item-action waves-effect {{ request()->is('admin/file*') ? 'active' : '' }}">
            <i class="fas fa-file-upload mr-3"></i>{{ __('Файлы проекта') }}</a>

        <a href="{{ route('admin.articles.index') }}"
           class="list-group-item list-group-item-action waves-effect {{ request()->is('admin/article*') ? 'active' : '' }}">
            <i class="fas fa-book-reader mr-3"></i>{{ __('База знаний') }}</a>

        <a href="{{ route('admin.tags.index') }}"
           class="list-group-item list-group-item-action waves-effect {{ request()->is('admin/tag*') ? 'active' : '' }}">
            <i class="fas fa-tags mr-3"></i>{{ __('Тэг') }}</a>

        <a href="{{ route('admin.tasks.index') }}"
           class="list-group-item list-group-item-action waves-effect {{ request()->is('admin/task*') ? 'active' : '' }}">
            <i class="fa fa-tasks mr-3"></i>{{ __('Задачи') }}</a>
    </div>
</div>
