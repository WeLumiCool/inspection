@extends('admin.layouts.dashboard')
@section('dashboard_content')
    <div class="container bg-form card-body-admin py-4">
        <div class="row" id="show_articles">
            <div class="col-2">id</div>
            <div class="col-10">{{ $build->id }}</div>
            <div class="col-2">Заголовок:</div>
            <div class="col-10">{{ $build->name }}</div>
            <div class="col-2">Адрес:</div>
            <div class="col-10">{{ $build->address }}</div>
            <div class="col-2">Площадь:</div>
            <div class="col-10">{{ $build->area }}</div>
            <div class="col-2">Заявлениие:</div>
            <div class="col-10">
                <button class="show_doc btn btn-info" data-path="{{ $build->statement }}">Посмотреть</button>
            </div>
            <div class="col-2">АПУ/ИТУ:</div>
            <div class="col-10">
                <button class="show_doc btn btn-info" data-path="{{ $build->apu }}">Посмотреть</button>
            </div>
            <div class="col-2">Акт:</div>
            <div class="col-10">
                <button class="show_doc btn btn-info" data-path="{{ $build->act }}">Посмотреть</button>
            </div>
            <div class="col-2">Проект:</div>
            <div class="col-10">
                <button class="show_doc btn btn-info" data-path="{{ $build->project }}">Посмотреть</button>
            </div>
            <div class="col-2">Разрешение на строительство:</div>
            <div class="col-10">
                <button class="show_doc btn btn-info" data-path="{{ $build->solution }}">Посмотреть</button>
            </div>
            <div class="col-2">Сертификат:</div>
            <div class="col-10">
                <button class="show_doc btn btn-info" data-path="{{ $build->certificate }}">Посмотреть</button>
            </div>
            <div class="col-2">Тип:</div>
            <div class="col-10">{{ $build->type->name }}</div>
            <div class="col-2">Примечание:</div>
            <div class="col-10">{{ $build->note }}</div>
            <div class="col-2">Разрешение:</div>
            @if($build->legality)
                <div class="col-10">присутствует</div>
            @else
                <div class="col-10">отсутствует</div>
            @endif
        </div>
        <div class="row mt-4 border">
            <div class="col-12 text-center">
                <div class="accordion md-accordion accordion-blocks border-0" id="accordionStages" role="tablist"
                     aria-multiselectable="true">
                    @foreach($build->stages as $stage)
                        <div class="card border-0 py-4">
                            <div class="card-header d-flex justify-content-between border-0" style="background: white" role="tab" id="Stage-{{ $stage->id }}">
                                <a class="text-left" data-toggle="collapse" data-parent="#accordionStages"
                                       href="#build-{{ $stage->build_id }}Stage-{{ $stage->id }}"
                                       aria-expanded="true"
                                       aria-controls="build-{{ $stage->build_id }}Stage-{{ $stage->id }}">
                                    <h6 class="mt-1 mb-0">
                                        <span>Этап: <span>{{ $stage->stage }}</span></span>
                                        <i class="fas fa-angle-down rotate-icon" style="margin-top: 2px;"></i>
                                    </h6>
                                </a>
                                <div class="d-flex">
                                    <form id="form-1" name="delete-form" method="POST" action="http://inspection/admin/builds/1">
                                        <input type="hidden" name="_token" value="6Now7byxLQsYpyg2gnbEr1DZZHCuImnDb54C1N8R">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="button" onclick="/*твоя функция deleteStage(this)*/" data-id="1" title="Удалить" class="btn n btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                    <a class="btn btn-primary ml-1" href="http://inspection/admin/builds/1/edit">
                                        <i class="fas fa-pen"></i>
                                    </a>
                                </div>
                            </div>

                            <div id="build-{{ $stage->build_id }}Stage-{{ $stage->id }}" class="collapse"
                                 role="tabpanel" aria-labelledby="Stage-{{ $stage->id }}"
                                 data-parent="#accordionStages">
                                <div class="card-body p-0 border">
                                    <div class="table-ui  mb-3  mb-4">
                                        <div class="row col-lg-12 col-12 pt-0 justify-content-lg-end text-lg-right pt-3 text-center">
                                            <p class="font-weight-bold font-small ">{{ $stage->date }}</p>
                                        </div>
                                        <div class="row border pl-3">
                                            <div class="col-lg-3 col-12 text-lg-left py-2 text-center border-right">
                                                <p class="h6 font-weight-bold ">Этап:</p>
                                                <p class="text-muted">{{ $stage->stage }}</p>
                                            </div>
                                            <div class="col-lg-6 col-12 text-lg-left py-2 text-center border-right">
                                                <p class="h6 font-weight-bold ">Описание:</p>
                                                <p class="text-muted">{{ $stage->desc }}</p>
                                            </div>
                                            <div class="col-lg-3 col-12 text-lg-left py-2 text-center border-right">
                                                <p class="h6 font-weight-bold">Документы:</p>
                                                <a href="" class="mx-auto" download>
                                                    <i class="fas pt-3 fa-file-pdf fa-4x"
                                                       style="color: red;"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="row border border-top-0 pl-3 ">
                                            <div class="col-lg-6 border-right pt-3 col-12 text-lg-left text-center">
                                                <p class="h6 font-weight-bold ">Фото объекта:</p>
                                                <div class="row">
                                                    @foreach(json_decode($stage->images) as $media)
                                                        <div class="col-3 position-relative">
                                                            <a href="{{ asset('storage/files/'.$media) }}" data-fancybox="media{{$stage->build_id}}" class="img-fluid">
                                                                <img src="{{ asset('storage/files/'.$media) }}"
                                                                     class="mediafile img-fluid m-2" alt=""></a>

                                                            <i class="far fa-times-circle img position-absolute ml-5 delete"
                                                               data-name="media"
                                                               id="delete_media"
                                                               data-media="{{ $loop->index }}"></i>

                                                            <a href="{{ asset('storage/files/'.$media) }}" download>
                                                                <i class="fas fa-arrow-alt-circle-down img position-absolute"></i>
                                                            </a>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-12 pt-3 text-lg-left text-center">
                                                <p class="h6 font-weight-bold ">Примечание:</p>
                                                <p class=" text-muted">
                                                    {{ $stage->note }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>

    <button type="button" class="btn btn-success mt-3" data-toggle="modal"
            data-target="#exampleModalCenter">
        Добавить этап
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {{--form create stage--}}
                <form action="{{ route('admin.stages.store') }}" method="post" id="save_form"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="stage_field"> Этап:<span class="text-danger">*</span></label>
                            <input id="stage_field" type="text" class="form-control" name="stage" required>
                        </div>
                        <div class="form-group">
                            <label for="stage_field">Описание:<span class="text-danger">*</span></label>
                            <textarea id="stage_field" class="form-control" name="desc" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="stage_field">Дата проверки:<span
                                    class="text-danger">*</span></label>
                            <input id="stage_field" type="date" class="form-control" name="date" required>
                        </div>
                        <div class="form-group">
                            <label for="stage_field">Наименование докуметов:<span
                                    class="text-danger">*</span></label>
                            <input id="stage_field" type="text" class="form-control" name="document"
                                   required>
                        </div>
                        <div class="form-group">
                            <label for="stage_field">Докуметы:<span class="text-danger">*</span></label>
                            <input id="stage_field" type="file" class="form-control" name="document_scan[]"
                                   required multiple>
                        </div>
                        <div class="form-group">
                            <label for="stage_field">Изображения:<span class="text-danger">*</span></label>
                            <input id="stage_field" type="file" class="form-control" name="images[]"
                                   required
                                   multiple>
                        </div>
                        <div class="form-group">
                            <label for="stage_field">Примечание:<span class="text-danger">*</span></label>
                            <input id="stage_field" type="text" class="form-control" name="note" required>
                        </div>
                        <input id="build_id" type="hidden" name="build_id" value="{{ $build->id }}">
                    </div>
                    <div class="modal-footer">
                        <button id="save_button" type="submit" class="btn btn-primary">Сохранить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="info" tabindex="-1" aria-labelledby="docModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="docModalLabel">Техническое задание</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <iframe id="frame" src="" height="500" width="750"></iframe>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">Закрыть</button>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script>
            $('.show_doc').click(function (e) {
                part_scr = e.currentTarget.dataset.path;
                $('#frame').attr("src", window.location.origin + "/storage/files/" + part_scr);
                $('#info').modal('show');
            })
        </script>
        <script>
            function deleteConfirm(me) {
                if (confirm('Вы дествительно хотите удалить ?')) {
                    let model_id = me.dataset.id;
                    $('form#form-' + model_id).submit();
                }
            }
        </script>
    @endpush
@endsection
@push('styles')
    <style>
        #show_articles div {
            padding-top: 2rem;
            padding-bottom: 2rem;
            border: 1px solid #dcdcdd;
        }
    </style>
@endpush
