<?php
$notifications = optional(auth()->user())->unreadNotifications;
$notifications_count = optional($notifications)->count();
$notifications_latest = optional($notifications)->take(5);
?>

<div class="sidebar sidebar-dark sidebar-fixed border-end" id="sidebar">
    <div class="sidebar-header border-bottom">
      
       
        <div class="sidebar-brand" style="margin: auto; display: flex; align-items: center; justify-content: center; height: 80px;">
            <img class="sidebar-brand-img" src="assets/img/logo1111 (1).png"  style="height: 100%; width: auto;">
        </div>
        
        
        
        
        <button class="btn-close d-lg-none" data-coreui-dismiss="offcanvas" data-coreui-theme="dark" type="button"
            aria-label="Close"
            onclick="coreui.Sidebar.getInstance(document.querySelector(&quot;#sidebar&quot;)).toggle()"></button>
    </div>
    <ul class="sidebar-nav" data-coreui="navigation" data-simplebar>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('backend.dashboard') }}">
                <i class="nav-icon fa-solid fa-cubes"></i>&nbsp;@lang('Dashboard')
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('backend.notifications.index') }}">
                <i class="nav-icon fa-regular fa-bell"></i>&nbsp;@lang('Notifications')
                @if ($notifications_count)
                    &nbsp;<span class="badge badge-sm bg-info ms-auto">{{ $notifications_count }}</span>
                @endif
            </a>
        </li>
        
        @can('view_posts')
            <li class="nav-item">
                <a class="nav-link" href="{{ route('backend.posts.index') }}">
                    <i class="nav-icon fa-regular fa-file-lines"></i>&nbsp;@lang('Posts')
                </a>
            </li>
        @endcan
        @can('view_categories')
            <li class="nav-item">
                <a class="nav-link" href="{{ route('backend.categories.index') }}">
                    <i class="nav-icon fa-solid fa-diagram-project"></i>&nbsp;@lang('Categories')
                </a>
            </li>
        @endcan
        @can('view_services')
        <li class="nav-group" aria-expanded="true">
            <a class="nav-link nav-group-toggle" href="#">
                <i class="nav-icon fa-solid fa-list-ul"></i>&nbsp;@lang('Services')
            </a>
            <ul class="nav-group-items compact" style="height: auto;">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.services.create') }}">
                        <span class="nav-icon"><span class="nav-icon-bullet"></span></span> Add Services
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.services') }}">
                        <span class="nav-icon"><span class="nav-icon-bullet"></span></span> All Services
                    </a>
                </li>
            </ul>
        </li>
    @endcan
    
    
    @can('view_services_providers')
    <li class="nav-group" aria-expanded="true">
        <a class="nav-link nav-group-toggle" href="#">
            <i class="nav-icon fa-solid fa-list-ul"></i>&nbsp;@lang('Service Providers')
        </a>
        <ul class="nav-group-items compact" style="height: auto;">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.providers.create') }}">
                    <span class="nav-icon"><span class="nav-icon-bullet"></span></span> Add Providers
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.providers.index') }}">
                    <span class="nav-icon"><span class="nav-icon-bullet"></span></span> All Providers
                </a>
            </li>
        </ul>
    </li>
@endcan

    
       

        @can('edit_settings')
            <li class="nav-item">
                <a class="nav-link" href="{{ route('backend.settings') }}">
                    <i class="nav-icon fa-solid fa-gears"></i>&nbsp;@lang('Settings')
                </a>
            </li>
        @endcan

        @can('view_backups')
            <li class="nav-item">
                <a class="nav-link" href="{{ route('backend.backups.index') }}">
                    <i class="nav-icon fa-solid fa-box-archive"></i>&nbsp;@lang('Backups')
                </a>
            </li>
        @endcan

        @can('view_users')
            <li class="nav-item">
                <a class="nav-link" href="{{ route('backend.users.index') }}">
                    <i class="nav-icon fa-solid fa-user-group"></i>&nbsp;@lang('Users')
                </a>
            </li>
        @endcan

        @can('view_roles')
            <li class="nav-item">
                <a class="nav-link" href="{{ route('backend.roles.index') }}">
                    <i class="nav-icon fa-solid fa-user-shield"></i>&nbsp;@lang('Roles')
                </a>
            </li>
        @endcan

        @can('view_logs')
            <li class="nav-group" aria-expanded="true">
                <a class="nav-link nav-group-toggle" href="#">
                    <i class="nav-icon fa-solid fa-list-ul"></i>&nbsp;@lang('Logs')
                </a>
                <ul class="nav-group-items compact" style="height: auto;">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('log-viewer::dashboard') }}">
                            <span class="nav-icon"><span class="nav-icon-bullet"></span></span> Log Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('log-viewer::logs.list') }}">
                            <span class="nav-icon"><span class="nav-icon-bullet"></span></span> Daily Log
                        </a>
                    </li>
                </ul>
            </li>
        @endcan
 </ul>
    <div class="sidebar-footer border-top d-none d-md-flex">
        <button class="sidebar-toggler" data-coreui-toggle="unfoldable" type="button"></button>
    </div>
</div>


