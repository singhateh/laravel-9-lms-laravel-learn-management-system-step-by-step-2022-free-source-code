<div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
    <div class="reviews-cont">
        <div class="title">
            <h6>@lang('Only Student Reviews')</h6>
        </div>
        <ul>
            @forelse ($course->reviews as $review)
                <li>
                    <div class="singel-reviews">
                        <div class="reviews-author">
                            <div class="author-thum">
                                <img src="{{ $review->student->image() }}" alt="Reviews">
                            </div>
                            <div class="author-name">
                                <h6>{{ $review->student->name }}</h6>
                                <span>{{ $review->date->format('M d Y') }}</span>
                            </div>
                        </div>
                        <div class="reviews-description pt-20">
                            <p>{{ $review->content }}</p>
                            @if ($review->rate)
                                <div class="rating">
                                    <ul>
                                        @for ($i = 0; $i < $review->rate; $i++)
                                            <li><i class="fa fa-star"></i></li>
                                        @endfor
                                    </ul>
                                    <span>/{{ $review->rate }} @lang('Star')</span>
                                </div>
                            @endif

                        </div>
                    </div> <!-- singel reviews -->
                </li>
            @empty
                <li class="mt-5"><strong>0 @lang('review')</strong></li>
            @endforelse
        </ul>
        <div class="title pt-15">
            <h6>@lang('Leave A Comment')</h6>
        </div>
        <div class="reviews-form">
            <form action="{{ route('reviews.store') }}" method="post">
                @csrf
                <input type="hidden" name="course_id" id="" value="{{ $course->id }}">
                <div class="row">
                    @guest
                        <div class="col-md-6">
                            <div class="form-singel">
                                <input type="text" name="first_name" placeholder="Fast name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-singel">
                                <input type="text" name="last_name" placeholder="Last Name">
                            </div>
                        </div>
                    @endguest
                    <div class="col-lg-12">
                        <div class="form-singel">
                            <div class="rate-wrapper">
                                <div class="rate-label">Your Rating:</div>
                                <div class="rate">
                                    <div class="rate-item"><i class="fa fa-star" aria-hidden="true"></i></div>
                                    <div class="rate-item"><i class="fa fa-star" aria-hidden="true"></i></div>
                                    <div class="rate-item"><i class="fa fa-star" aria-hidden="true"></i></div>
                                    <div class="rate-item"><i class="fa fa-star" aria-hidden="true"></i></div>
                                    <div class="rate-item"><i class="fa fa-star" aria-hidden="true"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-singel">
                            <textarea placeholder="Comment" name="content"></textarea>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-singel">
                            <button type="submit" class="main-btn">Post
                                Review</button>
                        </div>
                    </div>
                </div> <!-- row -->
            </form>
        </div>
    </div> <!-- reviews cont -->
</div>
