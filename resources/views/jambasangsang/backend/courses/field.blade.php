    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12 m-auto py-2">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">@lang(Str::ucfirst(Request::segment(3)) . ' ' . Str::ucfirst(Request::segment(1)))</strong>

                    </div>
                    <div class="card-body">
                        <!-- Credit Card -->
                        <div id="pay-invoice">
                            <div class="card-body">
                                <form
                                    action="{{ isset($course) ? route('courses.update', [$course->id]) : route('courses.store') }}"
                                    method="post" enctype="multipart/form-data">
                                    @method('put')
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="category_id"
                                                    class="control-label mb-1">@lang('Category')</label>
                                                <select name="category_id" id="category_id"
                                                    class="form-control @error('category_id') is-invalid @enderror">
                                                    <option>@lang('Select Category')</option>
                                                    @foreach ($categories as $category)
                                                        <optgroup label="{{ $category->name }}"></optgroup>
                                                        @foreach ($category->parents as $subcategory)
                                                            <option value="{{ $subcategory->id }}"
                                                                @isset($course) {{ is_selected($subcategory->id, $course->category_id) }} @endisset>
                                                                {{ $subcategory->name }}
                                                            </option>
                                                        @endforeach
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('category_id')
                                                <div class="help-block field-validation-valid alert alert-danger">
                                                    {{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group has-success">
                                                <label for="name" class="control-label mb-1">@lang('Course Name')</label>
                                                <input id="name" name="name" type="text"
                                                    class="form-control name @error('name') is-invalid @enderror"
                                                    value="{{ isset($course) ? $course->name : old('name') }}"
                                                    autocomplete="name">
                                            </div>
                                            @error('name')
                                                <div class="help-block field-validation-valid alert alert-danger"
                                                    data-valmsg-for="name" data-valmsg-replace="true">{{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="price" class="control-label mb-1">@lang('Course Price')</label>
                                                <input id="price" name="price" type="number" min="0"
                                                    value="{{ isset($course) ? $course->price : old('price') }}"
                                                    class="form-control price @error('price') is-invalid @enderror"
                                                    autocomplete="price">
                                            </div>
                                            @error('price')
                                                <div class="help-block field-validation-valid alert alert-danger">
                                                    {{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label for="duration"
                                                    class="control-label mb-1">@lang('Duration')</label>
                                                <input id="duration" name="duration" type="text"
                                                    value="{{ isset($course) ? $course->duration : old('duration') }}"
                                                    class="form-control duration @error('duration') is-invalid @enderror"
                                                    autocomplete="duration">
                                            </div>
                                            @error('duration')
                                                <div class="help-block field-validation-valid alert alert-danger">
                                                    {{ $message }}</div>
                                            @enderror

                                        </div>
                                        <div class="{{ isset($course) ? 'col-3' : 'col-5' }}">
                                            <div class="form-group">
                                                <label for="image" class="control-label mb-1">@lang('Feature Image')</label>
                                                <input id="image" name="image" type="file"
                                                    value="{{ isset($course) ? $course->image : old('image') }}"
                                                    class="form-control image @error('image') is-invalid @enderror"
                                                    autocomplete="image">
                                            </div>
                                            @error('image')
                                                <div class="help-block field-validation-valid alert alert-danger">
                                                    {{ $message }}</div>
                                            @enderror

                                        </div>
                                        @isset($course)
                                            <div class="col-md-2 form-group">
                                                <label for="image" class="control-label mb-1">@lang('Preview Image')</label>
                                                <img src="{{ $course->image() }}" alt="">
                                            </div>
                                        @endisset
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="summary"
                                                    class="control-label mb-1">@lang('Course Summary')</label>
                                                <textarea name="summary" id="summary" cols="5" rows="2" class="form-control @error('summary') is-invalid @enderror">{{ isset($course) ? $course->summary : old('summary') }}</textarea>
                                            </div>
                                            @error('summary')
                                                <div class="help-block field-validation-valid alert alert-danger">
                                                    {{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="description"
                                                    class="control-label mb-1">@lang('Course Description')</label>
                                                <textarea name="description" id="description" cols="5" rows="2"
                                                    class="form-control @error('description') is-invalid @enderror">{{ isset($course) ? $course->description : old('description') }}</textarea>
                                            </div>
                                            @error('description')
                                                <div class="help-block field-validation-valid alert alert-danger">
                                                    {{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="started_at"
                                                    class="control-label mb-1">@lang('Course Start')</label>
                                                <input id="started_at" name="started_at" type="date"
                                                    value="{{ isset($course) ? $course->started_at : old('started_at') }}"
                                                    class="form-control started_at @error('started_at') is-invalid @enderror"
                                                    autocomplete="start">
                                            </div>
                                            @error('started_at')
                                                <div class="help-block field-validation-valid alert alert-danger">
                                                    {{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="finished_at"
                                                    class="control-label mb-1">@lang('Course Finished')</label>
                                                <input id="finished_at" name="finished_at" type="date"
                                                    value="{{ isset($course) ? $course->finished_at : old('finished_at') }}"
                                                    class="form-control finished_at @error('finished_at') is-invalid @enderror"
                                                    autocomplete="finished_at">
                                            </div>
                                            @error('finished_at')
                                                <div class="help-block field-validation-valid alert alert-danger">
                                                    {{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-6">
                                            <label for="x_card_code"
                                                class="control-label mb-1">@lang('Instructor')</label>
                                            <div class="input-group">
                                                <select name="teacher_id" id="teacher_id" class="form-control">
                                                    <option value="">@lang('Select Instructor')</option>
                                                    @foreach ($teachers as $teacher)
                                                        <option value="{{ $teacher->id }}"
                                                            @isset($course) {{ is_selected($teacher->id, $course->teacher_id) }} @endisset>
                                                            {{ $teacher->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('teacher_id')
                                                <div class="help-block field-validation-valid alert alert-danger">
                                                    {{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-6">
                                            <label for="x_card_code"
                                                class="control-label mb-1">@lang('Status')</label>
                                            <div class="input-group">
                                                <select name="status" id="status" class="form-control">
                                                    <option value="">@lang('Select Status')</option>
                                                    <option value="enabled"
                                                        @isset($course) {{ is_selected('Enabled', $course->status) }} @endisset>
                                                        @lang('Enabled')</option>
                                                    <option value="disabled"
                                                        @isset($course) {{ is_selected('Disabled', $course->status) }} @endisset>
                                                        @lang('Disabled')</option>
                                                </select>
                                            </div>
                                            @error('status')
                                                <div class="help-block field-validation-valid alert alert-danger">
                                                    {{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div>
                                        <button id="payment-button" type="submit"
                                            class="btn btn-lg btn-info btn-block mt-3">
                                            <i class="fa fa-save fa-lg"></i>&nbsp;
                                            <span id="payment-button-amount">@lang('Create Course')</span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div> <!-- .card -->

            </div>
            <!--/.col-->
        </div>
    </div><!-- .animated -->
