<main class="pt-5 my-5">
    <div class="container pt-5">
        <div class="p-3 bg-show">
            <div class="col-12 ">
                <p class="h2 font-weight-bold text-center text-caral">Список объектов</p>
            </div>
            <div class="row">
                <div class="col-sm-12 table-responsive">
                    <div class="row">
                        <div class="col-lg-3 col-sm-12 d-flex align-items-center">
                            <div class="form-group">
                                <label for="type">Выберите вид объекта:</label>
                                <select id="type" data-column="4" class="form-control filter-select mb-2    ">
                                    <option value="">Все</option>
                                    @foreach($types as $type)
                                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 d-flex align-items-center">
                            <div class="form-group">
                                <label for="type">Выберите тип объекта:</label>
                                <select id="category" data-column="3" class="form-control category-select mb-2    ">
                                    <option value="">Все</option>
                                    @foreach(['Строящийся','Завершенный', 'Незаконный'] as $type)
                                        <option value="{{ $type }}">{{ $type }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div
                                class="d-flex col-lg-3 justify-content-lg-end my-2 pr-lg-2 col-12 d-flex justify-content-center align-items-center ">
                            <a href="{{ route('isp.create.build') }}" type="button"
                               class="btn btn-blue  waves-effect text-right " style="padding: 8px 26px;">
                                Добавить объект
                            </a>
                        </div>
                    </div>
                    <table class="table table-bordered w-100 hover" id="builds-table">
                        <thead class="bg-primary text-light">
                        <tr>
                            <th scope="col">№</th>
                            <th scope="col">ФИО</th>
                            <th scope="col">Адрес</th>
                            <th scope="col">Категория</th>
                            <th scope="col">Тип объекта</th>
                            <th scope="col">Площадь</th>
                            <th scope="col">Разрешение</th>
                        </tr>

                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>

@push('styles')
    {{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">--}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
    <style>
        #builds-table tr:hover {
            cursor: pointer;
        }
    </style>
@endpush

@push('scripts')
{{--    <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>--}}
{{--    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>--}}
{{--    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>--}}
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/fixedcolumns/3.3.1/js/dataTables.fixedColumns.min.js"></script>
    <script>
        $(document).ready(function () {
            let table;
            if (window.innerWidth < 768) {
                table = $('#builds-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '{!! route('build2.datatable.data') !!}',
                    columns: [
                        {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                        {data: 'name', name: 'name'},
                        {data: 'address', name: 'address'},
                        {data: 'category', name: 'category'},
                        {data: 'type_id', name: 'type_id'},
                        {data: 'area', name: 'area'},
                        {data: 'legality', name: 'legality'},

                    ],

                    columnDefs: [
                        {
                            targets: [2, 5, 6],
                            visible: false,
                            searchable: false,
                            orderable: false,
                            exportable: false,
                            class:"index"
                        }
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
                $('.category-select').change(function () {
                    console.log($(this).data('column'));
                    table.column($(this).data('column'))
                        .search($(this).val())
                        .draw();
                })
            $('#builds-table').addClass("compact");
            } else {
                table = $('#builds-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '{!! route('build2.datatable.data') !!}',
                    columns: [
                        {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                        {data: 'name', name: 'name'},
                        {data: 'address', name: 'address'},
                        {data: 'category', name: 'category'},
                        {data: 'type_id', name: 'type_id'},
                        {data: 'area', name: 'area'},
                        {data: 'legality', name: 'legality'},

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
                })
                $('.category-select').change(function () {
                    console.log($(this).data('column'));
                    table.column($(this).data('column'))
                        .search($(this).val())
                        .draw();
                })


            }

            $('#builds-table tbody').on('click', 'tr', function () {
                let data = table.row(this).data();
                window.location.href = window.location.origin + '/show/' + data.id;
            });
        });
    </script>
    <script>

    </script>
@endpush
