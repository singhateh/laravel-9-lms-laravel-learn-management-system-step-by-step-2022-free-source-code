@section('css')
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css">
    <style>
        .stat-text a {
            word-wrap: break-word !important;
        }
    </style>
@endsection

@can('view_students')
    <div class="col-sm-6 col-lg-3">
        <div class="card text-white bg-flat-color-1">
            <div class="card-body pb-0">

                <h4 class="mb-0">
                    <span class="count">{{ $numberOfStudents }}</span>
                </h4>
                <p class="text-light">@lang('roles.student')</p>

                <div class="chart-wrapper px-0" style="height:70px;" height="70">
                    <i class="fa fa-graduation-cap fa-4x"></i>
                </div>

            </div>

        </div>
    </div>
@endcan

<!--/.col-->
@can('view_teachers')
    <div class="col-sm-6 col-lg-3">
        <div class="card text-white bg-flat-color-2">
            <div class="card-body pb-0">

                <h4 class="mb-0">
                    <span class="count">{{ $numberOfTeachers }}</span>
                </h4>
                <p class="text-light">@lang('roles.teacher')</p>

                <div class="chart-wrapper px-0" style="height:70px;" height="70">
                    <i class="fas fa-chalkboard-teacher fa-4x"></i>
                </div>

            </div>
        </div>
    </div>
@endcan
<!--/.col-->

@can('view_users')
    <div class="col-sm-6 col-lg-3">
        <div class="card text-white bg-flat-color-3">
            <div class="card-body pb-0">
                <h4 class="mb-0">
                    <span class="count">{{ $numberOfStaff }}</span>
                </h4>
                <p class="text-light">@lang('roles.staff')</p>
            </div>

            <div class="chart-wrapper px-0" style="height:70px;" height="70">
                <i class="fas fa-users fa-4x"></i>
            </div>
        </div>
    </div>
@endcan
<!--/.col-->

@can('view_admin')
    <div class="col-sm-6 col-lg-3">
        <div class="card text-white bg-flat-color-4">
            <div class="card-body pb-0">
                <h4 class="mb-0">
                    <span class="count">{{ $numberOfAdmins }}</span>
                </h4>
                <p class="text-light">@lang('roles.admin')</p>
                <div class="chart-wrapper px-3" style="height:70px;" height="70">
                    <i class="fa fa-user fa-4x"></i>
                </div>
            </div>
        </div>
    </div>
@endcan

<!--/.col-->

<div class="col-lg-3 col-md-6">
    <div class="social-box facebook">
        <i class="fa fa-book fa-4x"></i>
        <ul>
            <li>
                <span class="count">{{ $numberOfCourses }}</span>
                <span>@lang('Courses')</span>
            </li>
            <li>
                <span class="count">{{ $numberOfInactiveCourses }}</span>
                <span style=" color:red">@lang('Inactive')</span>
            </li>
        </ul>
    </div>
    <!--/social-box-->
</div>
<!--/.col-->


<div class="col-lg-3 col-md-6">
    <div class="social-box twitter">
        <i class="fa fa-graduation-cap fa-4x"></i>
        <ul>
            <li>
                <span class="count">{{ $numberOfActiveStudents }}</span>
                <span style="color:green">@lang('Active')</span>
            </li>
            <li>
                <span class="count">{{ $numberOfInactiveStudents }}</span>
                <span style=" color:red">@lang('Inactive')</span>
            </li>
        </ul>
    </div>
    <!--/social-box-->
</div>
<!--/.col-->


<div class="col-lg-3 col-md-6">
    <div class="social-box linkedin">
        <i class="fa fa-registered"></i>
        <ul>
            <li>
                <span class="count">40</span> +
                <span>contacts</span>
            </li>
            <li>
                <span class="count">250</span>
                <span>feeds</span>
            </li>
        </ul>
    </div>
    <!--/social-box-->
</div>
<!--/.col-->


<div class="col-lg-3 col-md-6">
    <div class="social-box google-plus">
        <i class="fa fa-google-plus"></i>
        <ul>
            <li>
                <span class="count">94</span> k
                <span>followers</span>
            </li>
            <li>
                <span class="count">92</span>
                <span>circles</span>
            </li>
        </ul>
    </div>
    <!--/social-box-->
</div>
<!--/.col-->

@foreach ($numberOfCoursesAndStudents as $studentCourse)
    <div class="col-xl-4 col-lg-6">
        <div class="card">
            <div class="card-body">
                <div class="stat-widget-one">
                    <div class="stat-icon dib"><img src="{{ $studentCourse->image() }}" alt="" height="60"></div>
                    <div class="stat-content dib">
                        <div class="stat-text"><a
                                href="{{ route('courses.show', $studentCourse->slug) }}">{{ $studentCourse->name }}</a>
                        </div>
                        <div class="stat-digit"> <i class="ti-user text-success border-success"></i>
                            {{ $studentCourse->students_count }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
