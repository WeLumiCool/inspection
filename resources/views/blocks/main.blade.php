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
                        <thead>
                        <tr>
                            <th scope="col">id</th>
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
        $(function () {
            $('#builds-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('build2.datatable.data') !!}',
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'address', name: 'address'},
                    {data: 'type_id', name: 'type_id'},
                    {data: 'area', name: 'area'},
                ]
            });
        });
    </script>
@endpush
