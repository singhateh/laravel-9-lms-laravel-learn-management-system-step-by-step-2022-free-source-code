<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">

        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu"
                aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="{{ route('home') }}"><img src="{{ Config::get('settings.logo') }}"
                    alt="Logo"></a>
            <a class="navbar-brand hidden" href="{{ route('home') }}"><img src="{{ Config::get('settings.logo') }}"
                    alt="Logo"></a>
        </div>

        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                @can('view_dashboard')
                    <li class="{{ is_active('home') }}">
                        <a href="{{ route('home') }}"> <i class="menu-icon fa fa-home"></i>@lang('Dashboard') </a>
                    </li>
                @endcan


                @if ((!auth()->user()->hasRole('User') &&
                    auth()->user()->can('view_courses')) ||
                    auth()->user()->can('view_lessons') ||
                    auth()->user()->can('view_categories'))
                    <h3 class="menu-title">@lang('manage courses')</h3><!-- /.menu-title -->
                    @can('view_courses')
                        <li class="{{ is_active('courses.*') }}">
                            <a href="{{ route('courses.index') }}"> <i class="menu-icon fa fa-book"></i>@lang('Courses')
                            </a>
                        </li>
                    @endcan

                    @can('view_lessons')
                        <li class="{{ is_active('lessons.*') }}">
                            <a href="{{ route('lessons.index') }}"> <i class="menu-icon fa fa-table"></i>@lang('Lessons')
                            </a>
                        </li>
                    @endcan
                    @can('view_categories')
                        <li class="{{ is_active('categories.*') }}">
                            <a href="{{ route('categories.index') }}"> <i
                                    class="menu-icon fa fa-bars"></i>@lang('Categories')
                            </a>
                        </li>
                    @endcan
                @endif

                @if (auth()->user()->can('view_students') ||
                    auth()->user()->can('view_teachers') ||
                    auth()->user()->can('view_users'))
                    <h3 class="menu-title">@lang('Manage Users')</h3><!-- /.menu-title -->
                    @can('view_users')
                        <li class="{{ is_active('users.*') }}">
                            <a href="{{ route('users.index') }}"> <i class="menu-icon fa fa-users"></i>@lang('Users')
                            </a>
                        </li>
                    @endcan

                    @can('view_students')
                        <li class="{{ is_active('students.*') }}">
                            <a href="{{ route('students.index') }}"> <i
                                    class="menu-icon fa fa-graduation-cap"></i>@lang('Students') </a>
                        </li>
                    @endcan
                    @can('add_teachers')
                        <li class="{{ is_active('instructors.*') }}">
                            <a href="{{ route('instructors.index') }}"> <i
                                    class="menu-icon fa fa-users"></i>@lang('Instructors') </a>
                        </li>
                    @endcan
                    @can('add_role')
                        <li class="{{ is_active('roles.*') }}">
                            <a href="{{ route('roles.index') }}"> <i class="menu-icon fa fa-lock"></i>@lang('roles.roles')
                            </a>
                        </li>
                    @endcan
                @endif

                @if (auth()->user()->can('view_students') ||
                    auth()->user()->can('view_teachers') ||
                    auth()->user()->can('view_users'))
                    <h3 class="menu-title">@lang('Manage Activities')</h3><!-- /.menu-title -->
                    @can('view_events')
                        <li class="{{ is_active('events.*') }}">
                            <a href="{{ route('events.index') }}"> <i
                                    class="menu-icon fa fa-calendar"></i>@lang('Events')
                                <span class="count bg-danger">{{ count($notificationEvents) }}</span>
                            </a>
                        </li>
                    @endcan

                    @can('view_news')
                        <li class="{{ is_active('newses.*') }}">
                            <a href="{{ route('newses.index') }}"> <i
                                    class="menu-icon fa fa-newspaper-o"></i>@lang('News')
                                <span class="count bg-danger">{{ count($notificationNews) }}</span></a>
                        </li>
                    @endcan
                @endif

                @if (auth()->user()->can('view_settings'))
                    <h3 class="menu-title">@lang('Settings')</h3><!-- /.menu-title -->
                    @can('view_settings')
                        <li class="{{ is_active('settings.*') }}">
                            <a href="{{ route('settings.index') }}"> <i
                                    class="menu-icon fa fa-cog"></i>@lang('Settings')
                            </a>
                        </li>
                    @endcan
                @endif

                @if (auth()->user()->hasRole('Teacher'))
                    <li class="{{ is_active('home') }}">
                        <a href="{{ route('home') }}"> <i class="menu-icon fa fa-envelope"></i>@lang('Messages')
                        </a>
                    </li>
                    <li class="{{ is_active('home') }}">
                        <a href="{{ route('home') }}"> <i class="menu-icon fa fa-home"></i>@lang('Events') </a>
                    </li>
                    <li class="{{ is_active('home') }}">
                        <a href="{{ route('home') }}"> <i class="menu-icon fa fa-home"></i>@lang('Home') </a>
                    </li>
                @endif

                @if (auth()->user()->hasRole('User'))
                    <li class="{{ is_active('home') }}">
                        <a href="{{ route('home') }}"> <i class="menu-icon fa fa-home"></i>@lang('Home') </a>
                    </li>
                    <li class="{{ is_active('home') }}">
                        <a href="{{ route('home') }}"> <i class="menu-icon fa fa-book"></i>@lang('Courses') </a>
                    </li>
                    <li class="{{ is_active('home') }}">
                        <a href="{{ route('home') }}"> <i class="menu-icon fa fa-envelope"></i>@lang('Messages')
                        </a>
                    </li>
                    <li class="{{ is_active('home') }}">
                        <a href="{{ route('home') }}"> <i class="menu-icon fa fa-home"></i>@lang('Events') </a>
                    </li>
                    <li class="{{ is_active('home') }}">
                        <a href="{{ route('home') }}"> <i class="menu-icon fa fa-home"></i>@lang('Home') </a>
                    </li>
                @endif

            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside><!-- /#left-panel -->
