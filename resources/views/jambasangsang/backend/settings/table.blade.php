<div class="animated fadeIn">
    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-body">


                    <form action="{{ route('settings.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @foreach ($settings as $setting)
                            @php
                                $field = json_decode($setting->field);
                            @endphp
                            <div class="col-md-6 mt-2">
                                <label for="">{{ $field->label }}</label>
                                <input class="form-control" type="{{ $field->type }}"
                                    name="settings[{{ $field->name }}]" id="{{ $field->name }}"
                                    value="{{ $setting->value }}">
                            </div>
                        @endforeach
                        <div class="col-md-12 form-group mt-3">
                            <button type="submit" class="btn btn-block btn-success">Update Settings</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>


    </div>
</div><!-- .animated -->
