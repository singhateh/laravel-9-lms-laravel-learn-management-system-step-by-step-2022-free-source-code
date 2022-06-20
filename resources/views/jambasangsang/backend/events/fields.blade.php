<div class="animated fadeIn">
    <div class="row">
        <div class="col-lg-12 m-auto py-2">
            <div class="card">
                <div class="card-body">
                    <!-- Credit Card -->
                    <div id="pay-invoice">
                        <div class="card-body">
                            <form
                                action="{{ isset($event) ? route('events.update', $event->id) : route('events.store') }}"
                                method="post" novalidate="novalidate" enctype="multipart/form-data">
                                @csrf
                                @isset($event)
                                @method('put')
                                @endisset
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group has-success">
                                            <label for="title" class="control-label mb-1">@lang('Title')</label>
                                            <input id="title" name="title" type="text" class="form-control title valid"
                                                value="{{ isset($event) ? $event->title : old('title') }}">
                                        </div>
                                        @error('title')
                                            <div class="help-block field-validation-valid alert alert-danger">
                                                {{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <textarea class="ckeditor form-control" id="editor" name="content">{{ isset($event) ? $event->content : old('content') }}</textarea>
                                        @error('content')
                                            <div class="help-block field-validation-valid alert alert-danger">
                                                {{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-3 mt-3">
                                        <label for="date" class="control-label mb-1">@lang('Date')</label>
                                        <div class="form-group">
                                            <input type="date" name="date" id="date" class="form-control"
                                                value="{{ isset($event) ? $event->date : old('date') }}">
                                        </div>
                                        @error('date')
                                            <div class="help-block field-validation-valid alert alert-danger">
                                                {{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-3 mt-3">
                                        <label for="x_card_code" class="control-label mb-1">@lang('Status')</label>
                                        <div class="form-group">
                                            <select name="status" id="status" class="form-control">
                                                <option value="">@lang('Select Status')</option>
                                                <option value="enabled"
                                                    @isset($event) {{ is_selected('Enabled', $event->status) }} @endisset>
                                                    @lang('Enabled')</option>
                                                <option value="disabled"
                                                    @isset($event) {{ is_selected('Disabled', $event->status) }} @endisset>
                                                    @lang('Disabled')</option>
                                            </select>
                                        </div>
                                        @error('status')
                                            <div class="help-block field-validation-valid alert alert-danger">
                                                {{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="{{ isset($event) ? 'col-4' : 'col-6' }} mt-3 mb-3">
                                        <label for="x_card_code" class="control-label mb-1">@lang('Image')</label>
                                        <div class="form-group">
                                            <input type="file" name="image" id="image" class="form-control"
                                                value="{{ isset($event) ? $event->image : old('image') }}">
                                        </div>
                                        @error('image')
                                            <div class="help-block field-validation-valid alert alert-danger">
                                                {{ $message }}</div>
                                        @enderror
                                    </div>
                                    @isset($event)
                                        <div class="col-2 mt-3 mb-3">
                                            <label for="x_card_code" class="control-label mb-1">@lang('Preview Image')</label>
                                            <div class="form-group">
                                                <img src="{{ $event->image() }}" alt="">
                                            </div>
                                        </div>
                                    @endisset
                                </div>
                                <div>
                                    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                        <i class="fa fa-save fa-lg"></i>&nbsp;
                                        <span id="payment-button-amount">@lang('Create Event')</span>
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
