<section id="news-part" class="pt-115 pb-110">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="section-title pb-50">
                    <h5>@lang('Latest News')</h5>
                    <h2>@lang('From the news')</h2>
                </div> <!-- section title -->
            </div>
        </div> <!-- row -->
        <div class="row">
            <div class="col-lg-6">
                @foreach ($featured_new as $news)
                    <div class="singel-news mt-30">
                        <div class="news-thum pb-25">
                            <img src="{{ $news->image() }}" alt="{{ $news->title }}">
                        </div>
                        <div class="news-cont">
                            <ul>
                                <li><a href="#"><i
                                            class="fa fa-calendar"></i>{{ $news->date->format('d M Y') }}</a>
                                </li>
                                <li><a href="#"> <span>@lang('By')</span>
                                        {{ $news->created_by->name }}</a></li>
                            </ul>
                            <a href="{{ route('news.single', $news->slug) }}">
                                <h3>{{ $news->title }}</h3>
                            </a>
                            <p>{!! $news->content !!}</p>
                        </div>
                    </div> <!-- singel news -->
                @endforeach

            </div>
            <div class="col-lg-6">
                <div class="singel-news news-list">
                    <div class="row">
                        @foreach ($random_news as $ran_new)
                            <div class="col-sm-4">
                                <div class="news-thum mt-30">
                                    <img src="{{ $ran_new->image() }}" alt="News">
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="news-cont mt-30">
                                    <ul>
                                        <li><a href="#"><i
                                                    class="fa fa-calendar"></i>{{ $ran_new->date->format('d M Y') }}</a>
                                        </li>
                                        <li><a href="#"> <span>@lang('By')</span>
                                                {{ $ran_new->created_by->name }}</a></li>
                                    </ul>
                                    <a href="{{ route('news.single', $ran_new->slug) }}">
                                        <h3>{{ $ran_new->title }}</h3>
                                    </a>
                                    <p>{!! $ran_new->content !!}</p>
                                </div>
                            </div>
                        @endforeach
                    </div> <!-- row -->
                </div> <!-- singel news -->
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</section>
