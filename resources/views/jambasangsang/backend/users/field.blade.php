@extends('layouts.backend.master')

@section('breadcrumbs')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Dashboard</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="#">Dashboard</a></li>
                        <li><a href="#">Forms</a></li>
                        <li class="active">Basic</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-10 m-auto py-2">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Credit Card</strong>
                    </div>
                    <div class="card-body">
                        <!-- Credit Card -->
                        <div id="pay-invoice">
                            <div class="card-body">
                                <form action="{{ route('users.update', [$user]) }}" method="post" novalidate="novalidate"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="role" class="control-label mb-1">@lang('Role')</label>
                                                <select name="role" id="role" class="form-control">
                                                    <option value="">@lang('Select Role')</option>
                                                    @foreach ($roles as $role)
                                                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('role')
                                                <div class="help-block field-validation-valid alert alert-danger">
                                                    {{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group has-success">
                                                <label for="name" class="control-label mb-1">@lang('Full Name')</label>
                                                <input id="name" name="name" type="text"
                                                    class="form-control name valid" data-val="true"
                                                    data-val-required="{{ __('Please enter user name') }}"
                                                    autocomplete="name" aria-required="true" aria-invalid="false"
                                                    aria-describedby="name-error">
                                                <span class="help-block field-validation-valid" data-valmsg-for="name"
                                                    data-valmsg-replace="true"></span>
                                            </div>
                                            @error('name')
                                                <div class="help-block field-validation-valid alert alert-danger">
                                                    {{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group has-success">
                                                <label for="username" class="control-label mb-1">@lang('UserName')</label>
                                                <input id="username" name="username" type="text"
                                                    class="form-control username valid" data-val="true"
                                                    data-val-required="{{ __('Please enter username') }}"
                                                    autocomplete="username" aria-required="true" aria-invalid="false"
                                                    aria-describedby="username-error">
                                                <span class="help-block field-validation-valid" data-valmsg-for="username"
                                                    data-valmsg-replace="true"></span>
                                            </div>
                                            @error('username')
                                                <div class="help-block field-validation-valid alert alert-danger">
                                                    {{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label for="email" class="control-label mb-1">@lang('User Email')</label>
                                                <input id="email" name="email" type="email"
                                                    class="form-control email identified visa" value=""
                                                    data-val="true" data-val-required="Please enter the email"
                                                    data-val-email="{{ __('Please enter email') }}" autocomplete="email">
                                                <span class="help-block" data-valmsg-for="email"
                                                    data-valmsg-replace="true"></span>
                                            </div>
                                            @error('email')
                                                <div class="help-block field-validation-valid alert alert-danger">
                                                    {{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label for="password" class="control-label mb-1">@lang('User Password')</label>
                                                <input id="password" name="password" type="password"
                                                    class="form-control password" value="" data-val="true"
                                                    data-val-required="Please enter password" data-val-password="password"
                                                    autocomplete="password">
                                                <span class="help-block" data-valmsg-for="password"
                                                    data-valmsg-replace="true"></span>
                                            </div>
                                            @error('password')
                                                <div class="help-block field-validation-valid alert alert-danger">
                                                    {{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="image" class="control-label mb-1">@lang('image')</label>
                                                <input id="image" name="image" type="file"
                                                    class="form-control image" value="" autocomplete="image">

                                            </div>
                                            @error('image')
                                                <div class="help-block field-validation-valid alert alert-danger">
                                                    {{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-6">
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
                                    </div>
                                    <div>
                                        <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                            <i class="fa fa-save fa-lg"></i>&nbsp;
                                            <span id="payment-button-amount">@lang('Create User')</span>
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
