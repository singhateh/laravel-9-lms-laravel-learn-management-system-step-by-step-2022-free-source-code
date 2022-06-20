<section id="category-part">
    <div class="container">
        <div class="category pt-40 pb-80">
            <div class="row">
                <div class="col-lg-4">
                    <div class="category-text pt-40">
                        <h2>@lang('Best platform to learn everything')</h2>
                    </div>
                </div>
                <div class="col-lg-6 offset-lg-1 col-md-8 offset-md-2 col-sm-8 offset-sm-2 col-8 offset-2">
                    <div class="row category-slied mt-40">
                        @foreach ($categories as $category)
                            <div class="col-lg-4">
                                <a href="{{ $category->singleCategoryLink() }}">
                                    <span class="singel-category text-center color-1">
                                        <span class="icon">
                                            <img src="{{ $category->image() }}" alt="Icon">
                                        </span>
                                        <span class="cont">
                                            <span>{{ $category->name }}</span>
                                        </span>
                                    </span> <!-- singel category -->
                                </a>
                            </div>
                        @endforeach

                    </div> <!-- category slied -->
                </div>
            </div> <!-- row -->
        </div> <!-- category -->
    </div> <!-- container -->
</section>
