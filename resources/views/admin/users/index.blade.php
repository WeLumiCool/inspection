@extends('admin.layouts.dashboard')

@section('dashboard_content')
    <div class="p-3 bg-form card-body-admin">
        <div class="row">
            <div class="col-sm-12 table-responsive">
                <div class="row justify-content-between">
                    <div class="col-lg-9 col-sm-12 d-flex align-items-center">
                        <label for="type">Выберите тип объекта:</label>
                        <select id="type" data-column="3" class="form-control filter-select mb-2 w-50 mr-3">
                            <option value="">Все</option>
                            @foreach(['Межрегиональное управление', 'Центральный аппарат'] as $type)
                                <option value="{{ $type }}">{{ $type }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-auto">
                        <a href="{{ route('admin.users.create') }}" class="btn btn-success">{{ __('Создать') }}</a>
                    </div>
                </div>
                <table class="table table-striped  table-hover" id="users-table">
                    <thead class="bg-primary text-light">
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">ФИО</th>
                        <th scope="col">Отдел</th>
                        <th scope="col">Роль</th>
                        <th scope="col">actions</th>
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
            let table = $('#users-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('admin.user.datatable.data') !!}',
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'email', name: 'email'},
                    {data: 'role_id', name: 'role_id'},
                    {data: 'actions', name: 'actions', searchable: false, orderable: false},
                ],
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.18/i18n/Russian.json"
                },
            });
            $('.filter-select').change(function() {
                console.log($(this).data('column'));
                table.column($(this).data('column'))
                    .search($(this).val())
                    .draw();
            })

        });
    </script>
@endpush
