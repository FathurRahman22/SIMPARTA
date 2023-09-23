<link rel="stylesheet" type="text/css" href="{{ asset('css/menublade.css') }}">
<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show">
    {{-- 
    <div class="c-sidebar-brand d-md-down-none">
        <a class="c-sidebar-brand-full h4" href="#">
            <img src="/images/logo_disparta.png" alt="Logo" style="max-width: 100px; max-height: 50px;"> <!-- Ganti URL_GAMBAR dengan URL gambar logo Anda -->
            {{ trans('panel.site_title') }}
        </a>
    </div> --}}


    <ul class="c-sidebar-nav">
        <a class="c-sidebar-brand-full" href="#">
            <img src="/images/logo_disparta.png" alt="Logo">
            <!-- Ganti URL_GAMBAR dengan URL gambar logo Anda -->
            @if (Auth::check())
                <p>Peran: {{ Auth::user()->roles[0]->title }}</p>
            @endif
            @if (Auth::check())
                <p>Nama: {{ Auth::user()->name }}</p>
            @endif
        </a>
        <li class="c-sidebar-nav-item">
            <a href="{{ route('admin.home') }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt">

                </i>
                {{ trans('global.dashboard') }}
            </a>
        </li>
        @can('user_management_access')
            <li
                class="c-sidebar-nav-dropdown {{ request()->is('admin/permissions*') ? 'c-show' : '' }} {{ request()->is('admin/roles*') ? 'c-show' : '' }} {{ request()->is('admin/users*') ? 'c-show' : '' }} {{ request()->is('admin/audit-logs*') ? 'c-show' : '' }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('permission_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route('admin.permissions.index') }}"
                                class="c-sidebar-nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'c-active' : '' }}">
                                <i class="fa-fw fas fa-unlock-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.permission.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('role_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route('admin.roles.index') }}"
                                class="c-sidebar-nav-link {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'c-active' : '' }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.role.title') }}
                            </a>
                        </li>
                        @can('user_access')
                            <li class="c-sidebar-nav-item">
                                <a href="{{ route('admin.users.index') }}"
                                    class="c-sidebar-nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'c-active' : '' }}">
                                    <i class="fa-fw fas fa-user c-sidebar-nav-icon">

                                    </i>
                                    {{ trans('cruds.user.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('audit_log_access')
                            <li class="c-sidebar-nav-item">
                                <a href="{{ route('admin.audit-logs.index') }}"
                                    class="c-sidebar-nav-link {{ request()->is('admin/audit-logs') || request()->is('admin/audit-logs/*') ? 'c-active' : '' }}">
                                    <i class="fa-fw fas fa-file-alt c-sidebar-nav-icon">

                                    </i>
                                    {{ trans('cruds.auditLog.title') }}
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('content_access')
                <li class="c-sidebar-nav-dropdown  {{ request()->is('admin/reviews*') ? 'c-show' : '' }} ">
                    {{-- <a class="c-sidebar-nav-dropdown-toggle" href="#">
                        <i class="fa-fw fas fa-address-book c-sidebar-nav-icon">

                        </i>
                        {{ trans('cruds.content.title') }}
                    </a> --}}
                    <ul class="c-sidebar-nav-dropdown-items">
                </li>
            @endcan
            @can('review_access')
                <li class="c-sidebar-nav-item">
                    {{-- <a href="{{ route('admin.reviews.index') }}"
                        class="c-sidebar-nav-link {{ request()->is('admin/reviews') || request()->is('admin/reviews/*') ? 'c-active' : '' }}">
                        <i class="fa-fw fas fa-mobile c-sidebar-nav-icon">

                        </i>
                        {{ trans('cruds.review.title') }}
                    </a> --}}
                </li>
            @endcan
        </ul>
    @endcan
    @can('tag_access')
        <li class="c-sidebar-nav-item">
            <a href="{{ route('admin.tags.index') }}"
                class="c-sidebar-nav-link {{ request()->is('admin/tags') || request()->is('admin/tags/*') ? 'c-show' : '' }}">
                <i class="fa-fw fas fa-globe c-sidebar-nav-icon">

                </i>
                Jasa Usaha Pariwisata
            </a>
        </li>
    @endcan
    @can('data_access')
        <li
            class="c-sidebar-nav-dropdown {{ request()->is('admin/dataprofils*') ? 'c-show' : '' }}  {{ request()->is('admin/data-lains*') ? 'c-show' : '' }} {{ request()->is('admin/fasilitasWisatas*') ? 'c-show' : '' }} {{ request()->is('admin/pakets*') ? 'c-show' : '' }} {{ request()->is('admin/agendas*') ? 'c-show' : '' }}{{ request()->is('admin/data-kunjungans*') ? 'c-show' : '' }}">
            <a class="c-sidebar-nav-dropdown-toggle" href="#">
                <i class="fa-fw fas fa-database c-sidebar-nav-icon"></i>

                </i>
                {{ trans('cruds.data.title') }}
            </a>
            <ul class="c-sidebar-nav-dropdown-items">

                @can('dataprofil_access')
                    <li class="c-sidebar-nav-item">
                        <a href="{{ route('admin.dataprofils.index') }}"
                            class="c-sidebar-nav-link {{ request()->is('admin/dataprofils') || request()->is('admin/dataprofils/*') ? 'c-active' : '' }}">
                            <i class="fa-fw fas fa-user c-sidebar-nav-icon"></i>
                            {{ trans('cruds.dataprofil.title') }}
                        </a>
                    </li>
                @endcan
                @can('data_lain_access')
                    <li class="c-sidebar-nav-item">
                        <a href="{{ route('admin.data-lains.index') }}"
                            class="c-sidebar-nav-link {{ request()->is('admin/data-lains') || request()->is('admin/data-lains/*') ? 'c-active' : '' }}">
                            <i class="fa-fw fas fa-pencil-alt c-sidebar-nav-icon"></i>
                            {{ trans('cruds.dataLain.title') }}
                        </a>
                    </li>
                @endcan
                @can('paket_access')
                    <li class="c-sidebar-nav-item">
                        <a href="{{ route('admin.pakets.index') }}"
                            class="c-sidebar-nav-link {{ request()->is('admin/pakets') || request()->is('admin/pakets/*') ? 'c-active' : '' }}">
                            <i class="fa-fw fas fa-umbrella-beach c-sidebar-nav-icon"></i>

                            {{ trans('cruds.paket.title') }}
                        </a>
                    </li>
                @endcan
                @can('fasilitasWisata_access')
                    <li class="c-sidebar-nav-item">
                        <a href="{{ route('admin.fasilitasWisatas.index') }}"
                            class="c-sidebar-nav-link {{ request()->is('admin/fasilitasWisatas') || request()->is('admin/fasilitasWisatas/*') ? 'c-active' : '' }}">
                            <i class="fa-fw fas fa-book c-sidebar-nav-icon"></i>
                            {{ trans('cruds.fasilitasWisata.title') }}
                        </a>
                    </li>
                @endcan
                @can('agenda_access')
                    <li class="c-sidebar-nav-item">
                        <a href="{{ route('admin.agendas.index') }}"
                            class="c-sidebar-nav-link {{ request()->is('admin/agendas') || request()->is('admin/agendas/*') ? 'c-active' : '' }}">
                            <i class="fa-fw fas fa-calendar-alt c-sidebar-nav-icon"></i>
                            {{ trans('cruds.agenda.title') }}
                        </a>
                    </li>
                @endcan
                @can('data_kunjungan_access')
                    <li class="c-sidebar-nav-item">
                        <a href="{{ route('admin.data-kunjungans.index') }}"
                            class="c-sidebar-nav-link {{ request()->is('admin/data-kunjungans') || request()->is('admin/data-kunjungans/*') ? 'c-active' : '' }}">
                            <i class="fa-fw fas fa-chart-line c-sidebar-nav-icon">

                            </i>
                            {{ trans('cruds.dataKunjungan.title') }}
                        </a>
                    </li>
                @endcan
            </ul>
        </li>
    @endcan
    @if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
        @can('profile_password_edit')
            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'c-active' : '' }}"
                    href="{{ route('profile.password.edit') }}">
                    <i class="fa-fw fas fa-key c-sidebar-nav-icon">
                    </i>
                    {{ trans('global.change_password') }}
                </a>
            </li>
        @endcan
    @endif
    <li class="c-sidebar-nav-item">
        <a href="#" class="c-sidebar-nav-link"
            onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
            <i class="c-sidebar-nav-icon fas fa-fw fa-sign-out-alt">

            </i>
            {{ trans('global.logout') }}
        </a>
    </li>
    </ul>
</div>
{{-- <style>
    /* Default styles for the sidebar */
    .c-sidebar {
        font-family: Verdana, sans-serif;
        background-color: #022170;
        /* Change to your preferred background color */
        color: #fff;
        /* Change to your preferred text color */
        display: none;
        /* Sidebar hidden by default */
    }

    .c-sidebar-brand-full {
        text-align: center;
        /* Align content to center */
        padding: 20px;
        color: #ff6b6b;
        font-size: 18px;
        text-decoration: none;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .c-sidebar-brand-full img {
        max-width: 100px;
        max-height: 50px;
        margin-bottom: 10px;
        /* Add some spacing between the logo and user info */
    }

    .c-sidebar-brand-full p {
        margin: 0;
        font-size: 20px;
        color: #fff;
        font-weight: bold;
        font-style: italic;
    }

    .c-sidebar a {
        color: #fff;
        /* Change to your preferred link color */
        text-decoration: none;
        /* Remove underlines from links */
    }

    /* Show the sidebar when the menu button is clicked */
    #sidebar-toggle:checked+.c-sidebar {
        display: block;
        transform: translateX(-250px);
        /* Initial position off the screen */
        transition: transform 0.3s;
    }

    /* Styles for the sidebar when it's visible on larger screens */
    @media (min-width: 768px) {
        .c-sidebar {
            width: 250px;
            /* Adjust the width as needed */
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            overflow-y: auto;
            transition: width 0.3s;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.2);
            /* Add shadow for depth */
            display: block;
            /* Always visible on larger screens */
        }

        .c-sidebar-brand {
            padding: 20px;
            text-align: center;
            /* Center the brand text */
            font-size: 24px;
            /* Increase font size for brand */
            font-weight: bold;
            /* Make brand text bold */
            color: #ff6b6b;
            /* Brand text color */
        }
    }

    /* Show the sidebar on smaller screens (e.g., mobile and tablet) */
    @media (max-width: 767px) {
        .c-sidebar {
            display: block;
            /* Always visible on smaller screens */
        }
    }
</style> --}}
