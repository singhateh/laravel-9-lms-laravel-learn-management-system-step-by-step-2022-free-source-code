@section('css')
    <link rel="stylesheet"
        href="{{ asset('jambasangsang/backend/vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('jambasangsang/backend/vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}">
@endsection

<div class="animated fadeIn">
    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">@lang('Courses List')</strong>
                    @can('add_courses')
                        <a href="{{ route('courses.create') }}"
                            class="pull-right btn btn-sm btn-success">@lang('New Course')</a>
                    @endcan
                </div>
                <div class="card-body">
                    <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>@lang('Code')</th>
                                <th>@lang('Name')</th>
                                <th>@lang('Price')</th>
                                <th>@lang('Duration')</th>
                                <th>@lang('Instructor')</th>
                                <th>@lang('Status')</th>
                                @can('delete_courses' || 'edit_courses' || 'add_lessons')
                                    <th>@lang('Action')</th>
                                @endcan
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($courses as $course)
                                <tr>
                                    <td><img src="{{ $course->image() }}" alt="" width="60"
                                            height="60"><a
                                            href="{{ route('courses.show', [$course->slug]) }}">{{ $course->code }}</a>
                                    </td>
                                    <td>{{ $course->name }}</td>
                                    <td>{{ $course->price() }}</td>
                                    <td>{{ $course->duration }}</td>
                                    <td>{{ $course->teacher->name }}</td>
                                    <td>{{ $course->status }}</td>
                                    @can('delete_courses' || 'edit_courses' || 'add_lessons')
                                        <td>
                                            <div class="btn-group">
                                                @can('add_lessons')
                                                    <a href="{{ route('lessons.create', [$course->slug]) }}"
                                                        class="btn btn-sm btn-info"><i class="fa fa-book"></i></a>
                                                @endcan
                                                @can('edit_courses')
                                                    <a href="{{ route('courses.edit', [$course->id]) }}"
                                                        class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a>
                                                @endcan
                                                @can('delete_courses')
                                                    <a href="" class="btn btn-sm btn-danger"><i
                                                            class="fa fa-trash"></i></a>
                                                @endcan
                                            </div>
                                        </td>
                                    @endcan
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    </div>
</div><!-- .animated -->

@section('script')
    <script src="{{ asset('jambasangsang/backend/vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('jambasangsang/backend/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}">
    </script>
    <script src="{{ asset('jambasangsang/backend/vendors/datatables.net-buttons/js/dataTables.buttons.min.js') }}">
    </script>
    <script src="{{ asset('jambasangsang/backend/vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}">
    </script>
    <script src="{{ asset('jambasangsang/backend/vendors/jszip/dist/jszip.min.js') }}"></script>
    <script src="{{ asset('jambasangsang/backend/vendors/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{ asset('jambasangsang/backend/vendors/pdfmake/build/vfs_fonts.js') }}"></script>
    <script src="{{ asset('jambasangsang/backend/vendors/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('jambasangsang/backend/vendors/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('jambasangsang/backend/vendors/datatables.net-buttons/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('jambasangsang/backend/assets/js/init-scripts/data-table/datatables-init.js') }}"></script>
@endsection
