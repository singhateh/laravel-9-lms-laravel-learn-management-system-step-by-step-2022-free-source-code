@section('css')
    <style>
        select optgroup {
            text-indent: 0.5em;
            margin: 0;
            padding: 0;
            border: 2px solid red;
        }
    </style>
@show

<div class="animated fadeIn">
    <div class="row">
        <div class="col-lg-10 m-auto py-2">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">@lang(Str::ucfirst(Request::segment(3)) . ' ' . Str::ucfirst(Request::segment(1)))</strong>
                </div>
                <div class="card-body">
                    <!-- Credit Card -->
                    <div id="pay-invoice">
                        <div class="card-body">
                            <form
                                action="{{ isset($singleCategory) ? route('categories.update', [$singleCategory->id]) : route('categories.store') }}"
                                method="post" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="parent" class="control-label mb-1">@lang('Parent Category')</label>
                                            <select name="parent_id" id="parent_id" class="form-control">
                                                <option value="">@lang('Default')</option>
                                                @foreach ($categories as $parentCategory)
                                                    <option value="{{ $parentCategory->id }}"
                                                        @isset($singleCategory) {{ is_selected($singleCategory->parent ? $singleCategory->parent->id : $singleCategory->id, $parentCategory->id) }} @endisset>
                                                        {{ $parentCategory->name }} 2345</option>

                                                    @foreach ($parentCategory->parents as $subcategory)
                                                        <optgroup class="ml-4" label="SubCategory">
                                                            <option value="{{ $subcategory->id }}"
                                                                {{ $singleCategory->parent ? 'disabled' : 'disabled' }}
                                                                @isset($singleCategory) {{ is_selected($singleCategory->parent ? $singleCategory->parent->id : $singleCategory->id, $subcategory->id) }} @endisset>
                                                                {{ $subcategory->name }}
                                                            </option>
                                                        </optgroup>
                                                    @endforeach
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group has-success">
                                            <label for="name" class="control-label mb-1">@lang('Name')</label>
                                            <input id="name" name="name" type="text" class="form-control name valid"
                                                autocomplete="name"
                                                value="{{ isset($singleCategory) ? $singleCategory->name : '' }}">
                                            <span class="help-block field-validation-valid" data-valmsg-for="name"
                                                data-valmsg-replace="true"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="status" class="control-label mb-1">@lang('Status')</label>
                                            <select name="status" id="status" class="form-control">
                                                <option value="">@lang('Select Status')</option>
                                                <option value="enabled"
                                                    @isset($singleCategory) {{ is_selected('Enabled', $singleCategory->status) }} @endisset>
                                                    @lang('Enabled')</option>
                                                <option value="disabled"
                                                    @isset($singleCategory) {{ is_selected('Disabled', $singleCategory->status) }} @endisset>
                                                    @lang('Disabled')</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="{{ isset($singleCategory) ? 'col-md-4' : 'col-md-6' }}">
                                        <div class="form-group has-success">
                                            <label for="status" class="control-label mb-1">@lang('Featured Image')</label>
                                            <input type="file" name="image" id="image" class="form-control"
                                                value="{{ isset($singleCategory) ? $singleCategory->image() ?? '' : old('image') }}">
                                        </div>
                                    </div>
                                    @isset($singleCategory)
                                        <div class="col-md-2 form-group">
                                            <label for="image" class="control-label mb-1">@lang('Preview Image')</label>
                                            <img src="{{ $singleCategory->image() }} " alt="">
                                        </div>
                                        {{-- {{ $singleCategory->image() }} --}}
                                    @endisset
                                </div>
                                <div>
                                    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                        <i class="fa fa-lock fa-lg"></i>&nbsp;
                                        <span id="payment-button-sending">@lang('Create Category')</span>
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
