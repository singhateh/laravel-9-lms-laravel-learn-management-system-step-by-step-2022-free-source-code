@foreach ($numberOfCoursesAndStudents as $studentCourse)
    <div class="col-xl-4 col-lg-6">
        <div class="card">
            <div class="card-body">
                <div class="stat-widget-one">
                    <div class="stat-icon dib"><img src="{{ $studentCourse->course->image() }}" alt="" height="60">
                    </div>
                    <div class="stat-content dib">
                        <div class="stat-text"><a
                                href="{{ route('courses.show', $studentCourse->course->slug) }}">{{ $studentCourse->course->name }}</a>
                        </div>
                        <div class="stat-digit"> <i class="ti-user text-success border-success"></i>
                            {{ $studentCourse->student_count }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
