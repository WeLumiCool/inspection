@extends('admin.layouts.dashboard')
@section('dashboard_content')
    <div class="container bg-form card-body-admin my-3 py-3">
        <div class="text-right pr-2">
            <a class="btn btn-info" href="{{ route('admin.history.index', $build) }}">
                Посмотреть историю
            </a>
        </div>
        <div class="row p-4" id="show_articles">
            <div class="col-2 py-3"><span class="font-weight-bold">id</span></div>
            <div class="col-10 py-3">{{ $build->id }}</div>
            <div class="col-2 py-3"><span class="font-weight-bold">Заголовок:</span></div>
            <div class="col-10 py-3">{{ $build->name }}</div>
            <div class="col-2  py-3"><span class="font-weight-bold">Адрес:</span></div>
            <div class="col-10 py-3">{{ $build->address }}</div>
            <div class="col-2 py-3 "><span class="font-weight-bold">Площадь:</span></div>
            <div class="col-10 py-3">{{ $build->area }}</div>
            <div class="col-2 py-3 "><span class="font-weight-bold">Район:</span></div>
            <div class="col-10 py-3">{{ $build->district }}</div>
            <div class="col-2 py-3 "><span class="font-weight-bold">Категория:</span></div>
            <div class="col-10 py-3">{{ $build->category }}</div>
                @if(!is_null($build->statement))
            <div class="col-2 py-3"><span class="font-weight-bold">Заявлениие:</span></div>
            <div class="col-10 py-3">
                    @foreach(json_decode($build->statement) as $key=>$doc_path)
                        <a href="{{ asset('storage/files/' . $doc_path) }}" title="{{ $key }}" target="_blank" class="mx-auto show_doc btn">
                            <i class="fas pt-3 fa-file-pdf fa-4x"
                               style="color: red;"></i>
                        </a>
                    @endforeach
            </div>
                @endif
            @if(!is_null($build->apu))
            <div class="col-2 py-3"><span class="font-weight-bold">АПУ/ИТУ:</span></div>
            <div class="col-10 py-3">
                @foreach(json_decode($build->apu) as $key=>$doc_path)
                    <a href="{{ asset('storage/files/' . $doc_path) }}" title="{{ $key }}" target="_blank" class="mx-auto show_doc btn">
                        <i class="fas pt-3 fa-file-pdf fa-4x"
                           style="color: red;"></i>
                    </a>
                @endforeach
            </div>
            @endif
            @if(!is_null($build->act))
            <div class="col-2 py-3"><span class="font-weight-bold">Гос. акт:</span></div>
            <div class="col-10 py-3">
                  @foreach(json_decode($build->act) as $key=>$doc_path)
                    <a href="{{ asset('storage/files/' . $doc_path) }}" title="{{ $key }}" target="_blank" class="mx-auto show_doc btn">
                        <i class="fas pt-3 fa-file-pdf fa-4x"
                           style="color: red;"></i>
                    </a>
                @endforeach
            </div>
            @endif
            @if(!is_null($build->project))
            <div class="col-2 py-3"><span class="font-weight-bold">Проект</span>:</div>
            <div class="col-10 py-3">
                  @foreach(json_decode($build->project) as $key=>$doc_path)
                    <a href="{{ asset('storage/files/' . $doc_path) }}" title="{{ $key }}" target="_blank" class="mx-auto show_doc btn">
                        <i class="fas pt-3 fa-file-pdf fa-4x"
                           style="color: red;"></i>
                    </a>
                @endforeach
            </div>
            @endif
            @if(!is_null($build->solution))
            <div class="col-2 py-3"><span class="font-weight-bold">Разрешение на строительство:</span></div>
            <div class="col-10 py-3">
                  @foreach(json_decode($build->solution) as $key=>$doc_path)
                    <a href="{{ asset('storage/files/' . $doc_path) }}" title="{{ $key }}" target="_blank" class="mx-auto show_doc btn">
                        <i class="fas pt-3 fa-file-pdf fa-4x"
                           style="color: red;"></i>
                    </a>
                @endforeach
            </div>
            @endif
            @if(!is_null($build->certificate))
            <div class="col-2 py-3"><span class="font-weight-bold">Акт ввода:</span></div>
            <div class="col-10 py-3">
                  @foreach(json_decode($build->certificate) as $key=>$doc_path)
                    <a href="{{ asset('storage/files/' . $doc_path) }}" title="{{ $key }}" target="_blank" class="mx-auto show_doc btn">
                        <i class="fas pt-3 fa-file-pdf fa-4x"
                           style="color: red;"></i>
                    </a>
                @endforeach
            </div>
            @endif
            <div class="col-2 py-3"><span class="font-weight-bold">Тип:</span></div>
            <div class="col-10 py-3">{{ $build->type->name }}</div>
            <div class="col-2 py-3"><span class="font-weight-bold">Примечание:</span></div>
            <div class="col-10 py-3">{{ $build->note }}</div>
            <div class="col-2 py-3"><span class="font-weight-bold">Разрешение:</span></div>
            @if($build->legality)
                <div class="col-10">Разрешение имеется</div>
            @else
                <div class="col-10">Разрешение не имеется</div>
            @endif
            @if($build->latitude && $build->longitude)
                <div class="col-12 mt-4 border-0 p-0">
                    <div id="map"  class="border-0" style="width: 100%; height: 400px;"></div>
                </div>
            @endif
        </div>

        <div class="row mt-4 ">
            <div class="col-12 text-center ">
                <div class="accordion md-accordion accordion-blocks border-0" id="accordionStages" role="tablist"
                     aria-multiselectable="true">
                    @foreach($build->stages as $stage)
                        <div class="card  " style="margin-bottom: 0.4rem;
    -webkit-box-shadow: 0 2px 5px 0 rgba(0,0,0,0.16), 0 2px 10px 0 rgba(0,0,0,0.12);
    box-shadow: 0 2px 5px 0 rgba(0,0,0,0.16), 0 2px 10px 0 rgba(0,0,0,0.12);
    border-bottom: 1px solid #dee2e6!important;
    border-bottom: 0;
    border-bottom-right-radius: 5px;
    border-bottom-left-radius: 5px;">
                            <div class="card-header d-flex justify-content-between border-0" style="background: white"
                                 role="tab" id="Stage-{{ $stage->id }}">
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
                                    <form id="form-{{ $stage->id }}" name="delete-form" method="POST"
                                          action="{{ route('admin.stages.destroy', $stage) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" onclick="deleteConfirm(this)" data-id="{{ $stage->id }}"
                                                title="{{ __('Удалить') }}"
                                                class="btn n btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                    <a class="btn btn-primary ml-1" href="{{ route('admin.stages.edit', $stage) }}">
                                        <i class="fas fa-pen"></i>
                                    </a>
                                </div>
                            </div>

                            <div id="build-{{ $stage->build_id }}Stage-{{ $stage->id }}" class="collapse"
                                 role="tabpanel" aria-labelledby="Stage-{{ $stage->id }}"
                                 data-parent="#accordionStages">
                                <div class="card-body p-0  ">
                                    <div class="table-ui  mb-3  mb-4">
                                        <div
                                            class="row col-lg-12 col-12 pt-0 justify-content-lg-end text-lg-right pt-3 text-center">
                                            <p class="font-weight-bold font-small ">{{ date('d.m.Y',strtotime($stage->date)) }}</p>
                                        </div>
                                        <div class="row  pl-3">
                                            <div class="col-lg-3 col-12 text-lg-left py-2 text-center">
                                                <p class="h6 font-weight-bold ">Этап:</p>
                                                <p class="text-muted">{{ $stage->stage }}</p>
                                            </div>
                                            <div class="col-lg-6 col-12 text-lg-left py-2 text-center ">
                                                <p class="h6 font-weight-bold ">Описание:</p>
                                                <p class="text-muted">{{ $stage->desc }}</p>
                                            </div>
                                            <div class="col-lg-3 col-12 text-lg-left py-2 text-center ">
                                                <p class="h6 font-weight-bold">Документы: {{ $stage->document }}</p>
                                                @if(!is_null($stage->document_scan))
                                                    @foreach(json_decode($stage->document_scan) as $doc_path)
                                                        <a href="{{ asset('storage/files/' . $doc_path) }}" {{--data-path="{{ $doc_path }}"--}} target="_blank" class="mx-auto show_doc btn">
                                                            <i class="fas pt-3 fa-file-pdf fa-4x"
                                                               style="color: red;"></i>
                                                        </a>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row  pl-3 ">
                                            <div class="col-lg-6 pt-3 col-12 text-lg-left text-center">
                                                <p class="h6 font-weight-bold ">Фото объекта:</p>
                                                <div class="row">
                                                    @if(!is_null($stage->images))
                                                        @foreach(json_decode($stage->images) as $media)
                                                            <div class="col-3 position-relative">
                                                                <a href="{{ asset('storage/files/'.$media) }}"
                                                                   data-fancybox="media{{$stage->build_id}}"
                                                                   class="img-fluid">
                                                                    <img src="{{ asset('storage/files/'.$media) }}"
                                                                         class="mediafile img-fluid m-2" alt=""></a>
                                                                <a href="{{ asset('storage/files/'.$media) }}" download>
                                                                    <i class="fas fa-arrow-alt-circle-down stage position-absolute"></i>
                                                                </a>
                                                            </div>
                                                        @endforeach
                                                    @endif
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
        <div class="row">
            <div class="col-12 text-center">
                <button type="button" class="btn btn-success mt-3 mb-5 " style="padding: 15px;" data-toggle="modal"
                        data-target="#exampleModalCenter">
                    Добавить этап
                </button>
            </div>
        </div>
    </div>



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
                                   accept="application/pdf" required multiple>
                        </div>
                        <div class="form-group">
                            <label for="stage_field">Изображения:<span class="text-danger">*</span></label>
                            <input id="stage_field" type="file" class="form-control" name="images[]"
                                   accept="image/*" required multiple>
                        </div>
                        <div class="form-group">
                            <label for="note_field">Примечание:<span class="text-danger">*</span></label>
                            <textarea id="note_field" class="form-control" name="note" required></textarea>
                        </div>
                        <div class="form-group">
                            <label class="mutable-req" for="project_field">
                                Акт ввода:</label>
                            <input id="project_field" type="file" class="form-control files-input" name="certificate[]"
                                   accept="application/pdf"  multiple>
                        </div>
                        <input id="build_id" type="hidden" name="build_id" value="{{ $build->id }}">
                    </div>
                    <div class="modal-footer ">
                        <button id="save_button" type="submit" class="btn btn-primary">Сохранить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
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
@push('scripts')
    <script>
        function deleteConfirm(me) {
            if (confirm('Вы дествительно хотите удалить ?')) {
                let model_id = me.dataset.id;
                $('form#form-' + model_id).submit();
            }
        }
    </script>
    <script type="text/javascript">
        // Функция ymaps.ready() будет вызвана, когда
        // загрузятся все компоненты API, а также когда будет готово DOM-дерево.
        ymaps.ready(init);

        function init() {
            var getPointOptions = function (category) {
                if (category === "Незаконный") {

                    return {
                        preset: 'islands#violetDotIcon',
                    }
                }
                else if (category === "Строящийся") {
                    return {
                        preset: 'islands#darkGreenDotIcon',
                    }
                }
                else if (category === "Завершенный") {
                    return {
                        preset: 'islands#nightDotIcon',
                    }
                }
            };
            // Создание карты.
            var myMap = new ymaps.Map("map", {
                center: [{{ $build->latitude ?? 42.865388923088396 }}, {{ $build->longitude ?? 74.60104350048829 }}],
                zoom: 19
            });
            myMap.geoObjects.add(new ymaps.Placemark([{{ $build->latitude ?? 42.865388923088396 }}, {{ $build->longitude ?? 74.60104350048829 }}], {
                balloonContentHeader: '{{ $build->name }}',
                balloonContentBody: '{{ $build->address }}'
            },
                getPointOptions("{{ $build->category }}"),
            ))
        }


    </script>
@endpush
