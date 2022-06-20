@extends('layouts.frontend.master')

@section('content')
    <!--====== PAGE BANNER PART START ======-->

    <section id="page-banner" class="pt-105 pb-110 bg_cover" data-overlay="8"
        style="background-image: url('{{ asset('jambasangsang/frontend/images/page-banner-2.jpg') }}')">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-banner-cont">
                        <h2>{{ $course->name }}</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/') }}">@lang('Home')</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('Courses.index') }}">@lang('Courses')</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">{{ $course->name }}</li>
                            </ol>
                        </nav>
                    </div> <!-- page banner cont -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== PAGE BANNER PART ENDS ======-->

    <!--====== COURSES SINGEl PART START ======-->
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    @if (session()->has('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <section id="corses-singel" class="pt-90 pb-120 gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="corses-singel-left mt-30">
                        <div class="title">
                            <h3>{{ $course->name }}</h3>
                        </div> <!-- title -->
                        <div class="course-terms">
                            <ul>
                                <li>
                                    <div class="teacher-name">
                                        <div class="thum">
                                            <img src="{{ $course->teacher->image() }}"
                                                alt="{{ $course->teacher->name }}" width="50" height="50">
                                        </div>
                                        <div class="name">
                                            <span>@lang('Teacher')</span>
                                            <h6>{{ $course->teacher->name }}</h6>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="course-category">
                                        <span>@lang('Category')</span>
                                        <h6>{{ $course->category->name }} </h6>
                                    </div>
                                </li>
                                <li>
                                    <div class="review">
                                        <span>@lang('Review')</span>
                                        <ul>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li class="rating">(20 Reviws)</li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div> <!-- course terms -->

                        <div class="corses-singel-image pt-50">
                            <img src="{{ $course->image() }}" alt="Courses">
                        </div> <!-- corses singel image -->

                        <div class="corses-tab mt-30">
                            <ul class="nav nav-justified" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="active" id="overview-tab" data-toggle="tab" href="#overview"
                                        role="tab" aria-controls="overview" aria-selected="true">@lang('Overview')</a>
                                </li>
                                <li class="nav-item">
                                    <a id="curriculam-tab" data-toggle="tab" href="#curriculam" role="tab"
                                        aria-controls="curriculam" aria-selected="false">@lang('Curriculam')</a>
                                </li>
                                <li class="nav-item">
                                    <a id="instructor-tab" data-toggle="tab" href="#instructor" role="tab"
                                        aria-controls="instructor" aria-selected="false">@lang('Instructor')</a>
                                </li>
                                <li class="nav-item">
                                    <a id="reviews-tab" data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews"
                                        aria-selected="false">@lang('Reviews')</a>
                                </li>
                            </ul>

                            <div class="tab-content" id="myTabContent">

                                @include('jambasangsang.frontend.courses.description')
                                @include('jambasangsang.frontend.courses.curriculum')
                                @include('jambasangsang.frontend.courses.instructor')
                                @include('jambasangsang.frontend.courses.reviews')

                            </div> <!-- tab content -->
                        </div>
                    </div> <!-- corses singel left -->

                </div>
                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-lg-12 col-md-6">
                            <div class="course-features mt-30">
                                <h4>@lang('Course Features') </h4>
                                <ul>
                                    <li><i class="fa fa-clock-o"></i>@lang('Duaration') :
                                        <span>{{ $course->duration }}</span>
                                    </li>
                                    <li><i class="fa fa-clone"></i>@lang('Leactures') :
                                        <span>{{ count($course->lessons) }}</span>
                                    </li>
                                    <li><i class="fa fa-beer"></i>@lang('Quizzes') :
                                        <span>{{ count($course->quizzes) }}</span>
                                    </li>
                                    <li><i class="fa fa-user-o"></i>@lang('Students') :
                                        <span>{{ count($course->students) }}</span>
                                    </li>
                                </ul>
                                <div class="price-button pt-10">
                                    <span>@lang('Price') : <b>{{ $course->price() }}</b></span>
                                    <button value="{{ $course->id }}" name="course_id" data-toggle="modal"
                                        data-target="#enrolledModal"
                                        class="main-btn entrolledBtn">@lang('Enroll Now')</button>
                                </div>
                            </div> <!-- course features -->
                        </div>
                        <div class="col-lg-12 col-md-6">
                            <div class="You-makelike mt-30">
                                <h4>@lang('You make like') </h4>
                                @foreach ($courses_you_may_like as $you_may_like)
                                    <div class="singel-makelike mt-20">
                                        <div class="image">
                                            <img src="{{ $you_may_like->image() }}" alt="Image">
                                        </div>
                                        <div class="cont">
                                            <a href="{{ $you_may_like->link() }}">
                                                <h4>{{ $you_may_like->name }}</h4>
                                            </a>
                                            <ul>
                                                <li><a href="{{ $you_may_like->link() }}"><i
                                                            class="fa fa-user"></i>{{ count($you_may_like->students) }}</a>
                                                </li>
                                                <li>{{ $you_may_like->price() }}</li>
                                            </ul>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- row -->
            <div class="row">
                <div class="col-lg-8">
                    <div class="releted-courses pt-95">
                        <div class="title">
                            <h3>@lang('Releted Courses')</h3>
                        </div>
                        <div class="row">
                            @foreach ($related_courses as $course)
                                <div class="col-md-6">
                                    <div class="singel-course mt-30">
                                        <div class="thum">
                                            <div class="image">
                                                <img src="{{ $course->image() }}" alt="{{ $course->name }}">
                                            </div>
                                            <div class="price">
                                                <span>{{ $course->price() }}</span>
                                            </div>
                                        </div>
                                        <div class="cont">
                                            <ul>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                            </ul>
                                            <span>(20 Reviws)</span>
                                            <a href="{{ $course->link() }}">
                                                <h4>{{ $course->name }}</h4>
                                            </a>
                                            @include('jambasangsang.frontend.courses.teachers')
                                        </div>
                                    </div> <!-- singel course -->
                                </div>
                            @endforeach
                        </div> <!-- row -->
                    </div> <!-- releted courses -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    @livewire('payment')
    <!--====== COURSES SINGEl PART ENDS ======-->
@endsection
