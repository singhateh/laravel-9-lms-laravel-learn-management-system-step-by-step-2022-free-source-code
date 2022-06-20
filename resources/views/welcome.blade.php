@extends('layouts.frontend.master')

@section('content')
    <!--====== SEARCH BOX PART ENDS ======-->

    <!--====== SLIDER PART START ======-->
    @include('jambasangsang.frontend.home.slider')



    <!--====== SLIDER PART ENDS ======-->

    <!--====== CATEGORY PART START ======-->
    @include('jambasangsang.frontend.home.category')


    <!--====== CATEGORY PART ENDS ======-->

    <!--====== ABOUT PART START ======-->
    @include('jambasangsang.frontend.home.about')



    <!--====== ABOUT PART ENDS ======-->

    <!--====== APPLY PART START ======-->

    @include('jambasangsang.frontend.home.apply')


    <!--====== APPLY PART ENDS ======-->

    <!--====== COURSE PART START ======-->
    @include('jambasangsang.frontend.home.course_part')



    <!--====== COURSE PART ENDS ======-->

    <!--====== VIDEO FEATURE PART START ======-->

    @include('jambasangsang.frontend.home.video_features')


    <!--====== VIDEO FEATURE PART ENDS ======-->

    <!--====== TEACHERS PART START ======-->
    @include('jambasangsang.frontend.home.teachers')



    <!--====== TEACHERS PART ENDS ======-->

    <!--====== PUBLICATION PART START ======-->

    @include('jambasangsang.frontend.home.publication')


    <!--====== PUBLICATION PART ENDS ======-->

    <!--====== TEASTIMONIAL PART START ======-->
    @include('jambasangsang.frontend.home.testimonial')


    <!--====== TEASTIMONIAL PART ENDS ======-->

    <!--====== NEWS PART START ======-->

    @include('jambasangsang.frontend.home.news')


    <!--====== NEWS PART ENDS ======-->

    <!--====== PATNAR LOGO PART START ======-->

    @include('jambasangsang.frontend.home.partners')

    <!--====== PATNAR LOGO PART ENDS ======-->
@endsection
