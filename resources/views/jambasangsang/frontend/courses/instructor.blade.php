<div class="tab-pane fade" id="instructor" role="tabpanel"
aria-labelledby="instructor-tab">
<div class="instructor-cont">
    <div class="instructor-author">
        <div class="author-thum">
            <img src="{{ $course->teacher->image() }}" alt="Instructor">
        </div>
        <div class="author-name">
            <a href="#">
                <h5>{{ $course->teacher->name }}</h5>
            </a>
            <span>{{ $course->teacher->designation }}</span>
            <ul class="social">
                <li><a href="#"><i class="fa fa-facebook-f"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
            </ul>
        </div>
    </div>
    <div class="instructor-description pt-25">
        <p>{{ $course->teacher->about }}</p>
    </div>
</div> <!-- instructor cont -->
</div>
