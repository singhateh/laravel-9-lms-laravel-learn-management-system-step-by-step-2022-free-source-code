<section id="about-part" class="pt-65">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="section-title mt-50">
                    <h5>@lang('About us')</h5>
                    <h2>@lang('Welcome to') {{ Config::get('settings.name') }} </h2>
                </div> <!-- section title -->
                <div class="about-cont">
                    <p>{{ Config::get('settings.about') }}</p>
                    <a href="#" class="main-btn mt-55">@lang('Learn More')</a>
                </div>
            </div> <!-- about cont -->
            <div class="col-lg-6 offset-lg-1">
                <div class="about-event mt-50">
                    <div class="event-title">
                        <h3>@lang('Upcoming events')</h3>
                    </div> <!-- event title -->
                    <ul>
                        @foreach ($events as $event)
                            <li>
                                <div class="singel-event">
                                    <span><i class="fa fa-calendar"></i> {{ $event->date->format('d M Y') }}</span>
                                    <a href="events-singel.html">
                                        <h4>{{ $event->title }}</h4>
                                    </a>
                                    <span><i class="fa fa-clock-o"></i> {{ $event->time }}</span>
                                    <span><i class="fa fa-map-marker"></i> {{ $event->place }}</span>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div> <!-- about event -->
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
    <div class="about-bg">
        <img src="{{ asset('jambasangsang/frontend/images/about/bg-1.png') }}" alt="About">
    </div>
</section>
