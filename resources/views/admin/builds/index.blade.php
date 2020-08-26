@extends('admin.layouts.dashboard')

@section('dashboard_content')
    <div class="p-3 bg-form card-body-admin">
        {{--        <div class="row justify-content-end mb-4">--}}
        {{--            <div class="col-auto">--}}
        {{--                <a href="{{ route('admin.builds.create') }}" class="btn btn-success">{{ __('Создать') }}</a>--}}
        {{--            </div>--}}
        {{--        </div>--}}
        <div class="row ">
            <div class="col-sm-12 table-responsive">
                <div class="row justify-content-between">
                    <div class="col-lg-9 col-sm-12 d-flex align-items-center">
                        <label for="type">Выберите тип объекта:</label>
                        <select id="type" data-column="3" class="form-control filter-select mb-2 w-50 mr-3">
                            <option value="">Все</option>
                            @foreach($types as $type)
                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-auto">
                        <a href="{{ route('admin.builds.create') }}" class="btn btn-success">{{ __('Создать') }}</a>
                    </div>
                </div>
                <table class="table table-striped  table-hover" id="builds-table">
                    <thead class="bg-primary text-light">
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">ФИО</th>
                        <th scope="col">Адрес</th>
                        <th scope="col">Тип объекта</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

@endsection

@push('styles')
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
@endpush

@push('scripts')
    <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
    <script>
        $(function () {
            let table = $('#builds-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('admin.build.datatable.data') !!}',
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'address', name: 'address'},
                    {data: 'type_id', name: 'type_id'},
                    {data: 'actions', name: 'actions', searchable: false, orderable: false},
                ]
            });
            $('.filter-select').change(function () {
                console.log($(this).data('column'));
                table.column($(this).data('column'))
                    .search($(this).val())
                    .draw();
            })
        });
    </script>
@endpush
