@extends('admin.layouts.dashboard')

@section('dashboard_content')

    <div class="p-3 bg-form card-body-admin">
        <div class="row justify-content-end mb-4">
            <div class="col-auto">
                <a href="{{ route('admin.articles.create') }}" class="btn btn-success">{{ __('Создать') }}</a>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 table-responsive">
                <table class="table table-striped  table-hover" id="articles-table">
                    <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Заголовок</th>
                        <th scope="col">Тип</th>
                        <th scope="col">Автор</th>
                        <th scope="col">Actions</th>
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
            $('#articles-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('admin.article.datatable.data') !!}',
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'title', name: 'title'},
                    {data: 'type', name: 'type'},
                    {data: 'user_id', name: 'user_id'},
                    {data: 'actions', name: 'actions', searchable:false, orderable: false },
                ]
            });
        });
    </script>
@endpush

