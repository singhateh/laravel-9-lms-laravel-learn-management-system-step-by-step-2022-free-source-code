@extends('layouts.frontend.master')

@section('content')
    <!--====== PAGE BANNER PART START ======-->

    <section id="page-banner" class="pt-105 pb-130 bg_cover" data-overlay="8"
        style="background-image: url(images/page-banner-3.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-banner-cont">
                        <h2>Teachers</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Teachers</li>
                            </ol>
                        </nav>
                    </div> <!-- page banner cont -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== PAGE BANNER PART ENDS ======-->

    <!--====== TEACHERS PART START ======-->

    <section id="teachers-singel" class="pt-70 pb-120 gray-bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-8">
                    <div class="teachers-left mt-50">
                        <div class="hero">
                            <img src="images/teachers/t-1.jpg" alt="Teachers">
                        </div>
                        <div class="name">
                            <h6>Mark alen</h6>
                            <span>Vice chencelor</span>
                        </div>
                        <div class="social">
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter-square"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus-square"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>
                            </ul>
                        </div>
                        <div class="description">
                            <p>Gravida nibh vel velit auctor aliquetn sollicitudirem quibibendum auci elit cons equat
                                ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate..</p>
                        </div>
                    </div> <!-- teachers left -->
                </div>
                <div class="col-lg-8">
                    <div class="teachers-right mt-50">
                        <ul class="nav nav-justified" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="active" id="dashboard-tab" data-toggle="tab" href="#dashboard" role="tab"
                                    aria-controls="dashboard" aria-selected="true">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a id="courses-tab" data-toggle="tab" href="#courses" role="tab" aria-controls="courses"
                                    aria-selected="false">Courses</a>
                            </li>
                            <li class="nav-item">
                                <a id="reviews-tab" data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews"
                                    aria-selected="false">Reviews</a>
                            </li>
                        </ul> <!-- nav -->
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="dashboard" role="tabpanel"
                                aria-labelledby="dashboard-tab">
                                <div class="dashboard-cont">
                                    <div class="singel-dashboard pt-40">
                                        <h5>About</h5>
                                        <p>Lorem ipsum gravida nibh vel velit auctor aliquetn sollicitudirem quibibendum
                                            auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh
                                            vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus .
                                        </p>
                                    </div> <!-- singel dashboard -->
                                    <div class="singel-dashboard pt-40">
                                        <h5>Acchivments</h5>
                                        <p>Lorem ipsum gravida nibh vel velit auctor aliquetn sollicitudirem quibibendum
                                            auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh
                                            vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus .
                                        </p>
                                    </div> <!-- singel dashboard -->
                                    <div class="singel-dashboard pt-40">
                                        <h5>My Objective</h5>
                                        <p>Lorem ipsum gravida nibh vel velit auctor aliquetn sollicitudirem quibibendum
                                            auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh
                                            vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus .
                                        </p>
                                    </div> <!-- singel dashboard -->
                                </div> <!-- dashboard cont -->
                            </div>
                            <div class="tab-pane fade" id="courses" role="tabpanel" aria-labelledby="courses-tab">
                                <div class="courses-cont pt-20">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="singel-course mt-30">
                                                <div class="thum">
                                                    <div class="image">
                                                        <img src="images/course/cu-2.jpg" alt="Course">
                                                    </div>
                                                    <div class="price">
                                                        <span>$10</span>
                                                    </div>
                                                </div>
                                                <div class="cont border">
                                                    <ul>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                    </ul>
                                                    <span>(20 Reviws)</span>
                                                    <a href="#">
                                                        <h4>Learn basis javascirpt from start for beginner</h4>
                                                    </a>
                                                    <div class="course-teacher">
                                                        <div class="thum">
                                                            <a href="#"><img src="images/course/teacher/t-2.jpg"
                                                                    alt="teacher"></a>
                                                        </div>
                                                        <div class="name">
                                                            <a href="#">
                                                                <h6>Mark anthem</h6>
                                                            </a>
                                                        </div>
                                                        <div class="admin">
                                                            <ul>
                                                                <li><a href="#"><i
                                                                            class="fa fa-user"></i><span>31</span></a>
                                                                </li>
                                                                <li><a href="#"><i
                                                                            class="fa fa-heart"></i><span>10</span></a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> <!-- singel course -->
                                        </div>
                                        <div class="col-md-6">
                                            <div class="singel-course mt-30">
                                                <div class="thum">
                                                    <div class="image">
                                                        <img src="images/course/cu-3.jpg" alt="Course">
                                                    </div>
                                                    <div class="price">
                                                        <span>$30</span>
                                                    </div>
                                                </div>
                                                <div class="cont border">
                                                    <ul>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                    </ul>
                                                    <span>(20 Reviws)</span>
                                                    <a href="#">
                                                        <h4>Learn basis javascirpt from start for beginner</h4>
                                                    </a>
                                                    <div class="course-teacher">
                                                        <div class="thum">
                                                            <a href="#"><img src="images/course/teacher/t-2.jpg"
                                                                    alt="teacher"></a>
                                                        </div>
                                                        <div class="name">
                                                            <a href="#">
                                                                <h6>Mark anthem</h6>
                                                            </a>
                                                        </div>
                                                        <div class="admin">
                                                            <ul>
                                                                <li><a href="#"><i
                                                                            class="fa fa-user"></i><span>31</span></a>
                                                                </li>
                                                                <li><a href="#"><i
                                                                            class="fa fa-heart"></i><span>10</span></a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> <!-- singel course -->
                                        </div>
                                    </div> <!-- row -->
                                </div> <!-- courses cont -->
                            </div>
                            <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                                <div class="reviews-cont">
                                    <div class="title">
                                        <h6>Student Reviews</h6>
                                    </div>
                                    <ul>
                                        <li>
                                            <div class="singel-reviews">
                                                <div class="reviews-author">
                                                    <div class="author-thum">
                                                        <img src="images/review/r-1.jpg" alt="Reviews">
                                                    </div>
                                                    <div class="author-name">
                                                        <h6>Bobby Aktar</h6>
                                                        <span>April 03, 2019</span>
                                                    </div>
                                                </div>
                                                <div class="reviews-description pt-20">
                                                    <p>There are many variations of passages of Lorem Ipsum available, but
                                                        the majority have suffered alteration in some form, by injected
                                                        humour, or randomised words which.</p>
                                                    <div class="rating">
                                                        <ul>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star"></i></li>
                                                        </ul>
                                                        <span>/ 5 Star</span>
                                                    </div>
                                                </div>
                                            </div> <!-- singel reviews -->
                                        </li>
                                        <li>
                                            <div class="singel-reviews">
                                                <div class="reviews-author">
                                                    <div class="author-thum">
                                                        <img src="images/review/r-2.jpg" alt="Reviews">
                                                    </div>
                                                    <div class="author-name">
                                                        <h6>Humayun Ahmed</h6>
                                                        <span>April 13, 2019</span>
                                                    </div>
                                                </div>
                                                <div class="reviews-description pt-20">
                                                    <p>There are many variations of passages of Lorem Ipsum available, but
                                                        the majority have suffered alteration in some form, by injected
                                                        humour, or randomised words which.</p>
                                                    <div class="rating">
                                                        <ul>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star"></i></li>
                                                        </ul>
                                                        <span>/ 5 Star</span>
                                                    </div>
                                                </div>
                                            </div> <!-- singel reviews -->
                                        </li>
                                        <li>
                                            <div class="singel-reviews">
                                                <div class="reviews-author">
                                                    <div class="author-thum">
                                                        <img src="images/review/r-3.jpg" alt="Reviews">
                                                    </div>
                                                    <div class="author-name">
                                                        <h6>Tania Aktar</h6>
                                                        <span>April 20, 2019</span>
                                                    </div>
                                                </div>
                                                <div class="reviews-description pt-20">
                                                    <p>There are many variations of passages of Lorem Ipsum available, but
                                                        the majority have suffered alteration in some form, by injected
                                                        humour, or randomised words which.</p>
                                                    <div class="rating">
                                                        <ul>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star"></i></li>
                                                            <li><i class="fa fa-star"></i></li>
                                                        </ul>
                                                        <span>/ 5 Star</span>
                                                    </div>
                                                </div>
                                            </div> <!-- singel reviews -->
                                        </li>
                                    </ul>
                                    <div class="title pt-15">
                                        <h6>Leave A Comment</h6>
                                    </div>
                                    <div class="reviews-form">
                                        <form action="#">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-singel">
                                                        <input type="text" placeholder="Fast name">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-singel">
                                                        <input type="text" placeholder="Last Name">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-singel">
                                                        <div class="rate-wrapper">
                                                            <div class="rate-label">Your Rating:</div>
                                                            <div class="rate">
                                                                <div class="rate-item"><i class="fa fa-star"
                                                                        aria-hidden="true"></i></div>
                                                                <div class="rate-item"><i class="fa fa-star"
                                                                        aria-hidden="true"></i></div>
                                                                <div class="rate-item"><i class="fa fa-star"
                                                                        aria-hidden="true"></i></div>
                                                                <div class="rate-item"><i class="fa fa-star"
                                                                        aria-hidden="true"></i></div>
                                                                <div class="rate-item"><i class="fa fa-star"
                                                                        aria-hidden="true"></i></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-singel">
                                                        <textarea placeholder="Comment"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-singel">
                                                        <button type="button" class="main-btn">Post Comment</button>
                                                    </div>
                                                </div>
                                            </div> <!-- row -->
                                        </form>
                                    </div>
                                </div> <!-- reviews cont -->
                            </div>
                        </div> <!-- tab content -->
                    </div> <!-- teachers right -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== EVENTS PART ENDS ======-->
@endsection
