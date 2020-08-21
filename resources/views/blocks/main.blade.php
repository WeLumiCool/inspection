<main class="my-5">
    <div class="container">
        <div class="col-12 ">
            <p class="h3 font-weight-bold text-center text-caral">Список объектов</p>
        </div>
        <div class="row col-12 justify-content-around pr-0 mx-0">
            <p class="font-small  text-left text-caral pt-3">в списке: <span class="font-weight-bold">120</span>
                объектов</p>
            <form class="form-inline my-2 my-lg-0 ml-auto">
                <input class="form-control" type="search" placeholder="Поиск" aria-label="Search">
            </form>
            <button type="button" class="btn btn-outline-default  waves-effect text-right " style="padding: 8px 26px;">
                Добавить объект
            </button>
        </div>
        <div class="p-3 bg-form card-body-admin">

            <div class="row">
                <div class="col-sm-12 table-responsive">
                    <table class="table table-striped  table-hover" id="builds-table">
                        <div class="row">
                            <div class="col-lg-12 col-sm-12 d-flex align-items-center">
                                <label for="type">Выберите тип объекта:</label>
                                <select id="type" data-column="2" class="form-control filter-select mb-2 w-50 mr-4" >
                                    <option value="">Все</option>
                                    @foreach($types as $type)
                                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <thead>
                        <tr>
                            <th scope="col">ФИО</th>
                            <th scope="col">Адрес</th>
                            <th scope="col">Тип объекта</th>
                            <th scope="col">Площадь</th>
                        </tr>

                        </thead>
                    </table>
                </div>
            </div>
        </div>


    </div>

</main>

@push('scripts')
    <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
                console.log(window.innerWidth);
                if(window.innerWidth < 768)
                {
                    let table = $('#builds-table').DataTable({
                        processing: true,
                        serverSide: true,
                        ajax: '{!! route('build2.datatable.data') !!}',
                        columns: [
                            {data: 'name', name: 'name'},
                            {data: 'address', name: 'address'},
                            {data: 'type_id', name: 'type_id'},
                            {data: 'area', name: 'area'},
                        ],
                        columnDefs: [
                            {
                                targets: [ 3 ],
                                visible: false,
                                searchable: false,
                            }
                        ]

                    });
                    $('.filter-select').change(function() {
                        console.log($(this).data('column'));
                        table.column( $(this).data('column') )
                            .search( $(this).val())
                            .draw();
                    })
                }
                else {
                    var table = $('#builds-table').DataTable({
                        processing: true,
                        serverSide: true,
                        ajax: '{!! route('build2.datatable.data') !!}',
                        columns: [
                            // {data: 'id', name: 'id'},
                            {data: 'name', name: 'name'},
                            {data: 'address', name: 'address'},
                            {data: 'type_id', name: 'type_id'},
                            {data: 'area', name: 'area'},
                        ],
                    });
                    $('.filter-select').change(function() {
                        console.log($(this).data('column'));
                        table.column( $(this).data('column') )
                            .search( $(this).val())
                            .draw();
                    })
                }




        });

    </script>
@endpush
