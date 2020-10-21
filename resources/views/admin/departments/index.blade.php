@extends('admin.layouts.dashboard')

@section('dashboard_content')
    <div class="p-3 bg-form card-body-admin">
        <div class="row">
            <div class="col-sm-12 table-responsive">
                <table class="table table-striped table-hover" id="builds-table">
                    <thead class="bg-primary text-light">
                    <tr>
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
        $(document).ready(function() {
                let table = $('#builds-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('admin.central.datatable.data') !!}',
                columns: [
                    {data: 'name', name: 'name'},
                    {data: 'address', name: 'address'},
                    {data: 'type_id', name: 'type_id'},
                    {data: 'actions', name: 'actions', searchable: false, orderable: false},
                ],
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.18/i18n/Russian.json"
                },
            });
            $('.filter-select').change(function () {
                console.log($(this).data('column'));
                table.column($(this).data('column'))
                    .search($(this).val())
                    .draw();
            });
        });
    </script>
@endpush
