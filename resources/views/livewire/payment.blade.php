<div>
    <div class="modal fade" id="enrolledModal" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel"
        aria-hidden="true" data-backdrop="static" wire:ignore.self>
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticModalLabel">@lang('Enroll Now')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="#" method="post">
                        <div class="row">
                            @if (!empty($course_id))
                                <div class="col-md-5">
                                    <img src="{{ $course->teacher->image() }}" alt=""
                                        class="user-avatar custom-avatar rounded-circle mr-3">
                                    <label for="" class="mt-3 mb-3"> {{ $course->teacher->name }}</label>
                                    <br><br>
                                    <i class="fa fa-envelope-o" aria-hidden="true"></i> <label for="">
                                        {{ $course->teacher->email }}</label> <br>
                                    <i class="fa fa-code-fork" aria-hidden="true"></i> <label for="">
                                        {{ $course->teacher->code }}</label> <br>
                                    <label for=""> {{ $course->teacher->designation }}</label> <br>
                                </div>
                                <div class="col-md-5">
                                    <h2>{{ $course->name }}</h2>
                                    <ul class="enrolment">
                                        <li> @lang('Price'): {{ $course->price() }}</li>
                                        <li> @lang('Duration'): {{ $course->duration }}</li>
                                        <li> @lang('Start Date'): {{ $course->started_at->format('d M Y') }}</li>
                                        <li> @lang('Finished Date'): {{ $course->finished_at->format('d M Y') }}</li>
                                        <li> @lang('Enrolled Students'): {{ $course->students_count }}</li>
                                        <li> @lang('Lessons'): {{ $course->lessons_count }}</li>
                                    </ul>

                                </div>
                                <div class="col-md-2">
                                    <img src="{{ $course->image() }}"
                                        class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}"
                                        alt="">
                                </div>
                            @else
                                <div class="text-center"><i class="fa fa-spinner fa-spin fa-4x"
                                        aria-hidden="true"></i>
                                </div>
                            @endif
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">@lang('Cancel')</button>
                    <button type="button" wire:click.prevent="storeEnrollment()"
                        class="btn btn-primary main-btn">@lang('Proceed Enrollment')</button>
                </div>
            </div>
        </div>
    </div>

</div>
@livewire('login', ['course_id' => $course_id])
<style>
    .enrolment li {
        padding: 0.5em;
        background-color: rgb(255, 255, 255);
    }
</style>

@push('script')
    <script>
        $('.entrolledBtn').click(function(e) {
            @this.enrollNow(e.target.value)
            let elementName = $(this).attr('name');
            @this.set(elementName, e.target.value);
        });

        window.addEventListener('loginModal', event => {
            event.stopPropagation();
            $('#loginModal').modal('show');
        });

        window.addEventListener('closeModal', event => {
            event.stopPropagation();
            $('#enrolledModal').modal('hide');
            $('#loginModel').modal('hide');
        });

        document.addEventListener('livewire:load', function(event) {
            window.livewire.hook('afterDomUpdate', () => {
                // @this.enrollNow()
            });
        });
    </script>
@endpush
