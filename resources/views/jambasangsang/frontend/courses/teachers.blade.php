<div class="course-teacher">
    <div class="thum">
        <a href="{{ $course->teacher->link() }}"><img src="{{ $course->teacher->image() }}" alt="teacher"></a>
    </div>
    <div class="name">
        <a href="{{ $course->teacher->link() }}">
            <h6>{{ $course->teacher->name }}</h6>
        </a>
    </div>
    <div class="admin">
        <ul>
            <li><a href="#"><i class="fa fa-user"></i><span>{{ count($course->students) }}</span></a>
            </li>
            <li><a href="#"><i class="fa fa-heart"></i><span>10</span></a></li>
        </ul>
    </div>
</div>
