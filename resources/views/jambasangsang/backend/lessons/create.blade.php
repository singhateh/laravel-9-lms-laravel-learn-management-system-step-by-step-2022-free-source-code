@extends('layouts.backend.master')
@section('content')
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12 m-auto py-2">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">@lang('Create Lesson for  ') ({{ $course->name }})</strong>
                    </div>
                    <div class="card-body">
                        <!-- Credit Card -->
                        <div id="pay-invoice">
                            <div class="card-body">
                                <form action="{{ route('lessons.store') }}" method="post" enctype="multipart/form-data"
                                    novalidate="novalidate">
                                    @csrf
                                    <input type="hidden" name="course_id" id="course_id" value="{{ $course->id }}">
                                    <input type="hidden" name="slug" id="slug" value="{{ $course->slug }}">
                                    <div class="row mb-3">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="title" class="control-label mb-1">@lang('Title') *</label>
                                                <input id="photo" name="title" type="title" class="form-control title"
                                                    value="" autocomplete="title">

                                            </div>
                                            @error('title')
                                                <div class="help-block field-validation-valid alert alert-danger">
                                                    {{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-12">
                                            <textarea class="ckeditor form-control" id="editor" name="content"></textarea>
                                            @error('content')
                                                <div class="help-block field-validation-valid alert alert-danger">
                                                    {{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-6 mt-3">
                                            <label for="x_card_code" class="control-label mb-1">@lang('Status')</label>
                                            <div class="input-group">
                                                <select name="status" id="status" class="form-control">
                                                    <option value="">@lang('Select Status')</option>
                                                    <option value="enabled">@lang('Enabled')</option>
                                                    <option value="disabled">@lang('Disabled')</option>
                                                </select>
                                            </div>
                                            @error('status')
                                                <div class="help-block field-validation-valid alert alert-danger">
                                                    {{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-6 mt-3">
                                            <label for="x_card_code" class="control-label mb-1">@lang('Media')</label>
                                            <div class="input-group">
                                                <input type="file" name="image" id="image" class="form-control">
                                            </div>
                                            @error('image')
                                                <div class="help-block field-validation-valid alert alert-danger">
                                                    {{ $message }}</div>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="mt-4">
                                        <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                            <i class="fa fa-save fa-lg"></i>&nbsp;
                                            <span id="payment-button-amount">@lang('Create Lesson')</span>
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
@endsection

@section('script')
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('content');
    </script>

    <script type="text/javascript">
        CKEDITOR.replace('content', {
            filebrowserUploadUrl: "{{ route('lessons.image-upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        });
    </script>
@endsection
