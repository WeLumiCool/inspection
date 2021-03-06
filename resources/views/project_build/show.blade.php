@extends('layouts.app')
@section('content')
    <section class="pt-5 mt-5">

        <div class="container pt-3">
            <div class="row px-1 bg-show">
                <div class="col-12 text-lg-left text-center ">
                    <h3 class="py-3 font-weight-bold mb-0">Название объекта</h3>
                </div>
                <div class="col-12   p-3">
                    <div class="row ">
                        <div class="col-lg col-12 text-lg-left text-center">
                            <p class="h6 font-weight-bold ">ФИО:</p>
                            <p class="text-muted">{{ $build->name }}</p>
                        </div>
                        <div class="col-lg col-12 text-lg-left text-center">
                            <p class="h6 font-weight-bold ">ИНН:</p>
                            <p class="text-muted">{{ $build->inn }}</p>
                        </div>
                        <div class="col-lg col-12 text-lg-left text-center">
                            <p class="h6 font-weight-bold ">Вид объекта:</p>
                            <p class="text-muted">{{ $build->type->name }}</p>
                        </div>
                        <div class="col-lg col-12 text-lg-left text-center">
                            <p class="h6 font-weight-bold">Адрес объекта:</p>
                            <p class="text-muted">{{ $build->address }}</p>
                        </div>
                        <div class="col-lg col-12 text-lg-left text-center">
                            <p class="h6 font-weight-bold">Площадь (кв.м):</p>
                            <p class="text-muted">{{ $build->area }}</p>
                        </div>

                    </div>
                    <div class="row ">
                        <div class="col-lg col-12 text-lg-left text-center">
                            <p class="h6 font-weight-bold">Примечание:</p>
                            <p class="text-muted">{{ $build->note }}</p>
                        </div>
                        <div class="col-lg col-12 text-lg-left text-center">
                            <p class="h6 font-weight-bold">Инспектор:</p>
                            <p class="text-muted">{{ $user }}</p>
                        </div>
                        <div class="col-lg col-12 text-lg-left text-center">
                            <p class="h6 font-weight-bold">Район:</p>
                            <p class="text-muted">{{ $build->district }}</p>
                        </div>
                    </div>
                    <div class="row border-top mx-3">
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-12 text-lg-left text-center pt-4">
                            <p class="h6 font-weight-bold">Заявление:</p>
                            @if(!is_null($build->statement))
                                @foreach(json_decode($build->statement) as $key=>$doc_path)
                                    <div class="row my-2">
                                        <div class="col-lg-8 col-12 text-muted font-small">
                                            {{ $key }}
                                        </div>
                                        <div class="col-lg-2 col-12 icon-top">
                                            <a href="{{ asset('storage/files/'.$doc_path) }}" target="_blank"
                                               {{-- data-path="{{ $build->statement }}"--}} class="  font-weight-bold ">

                                                <i class="fas pt-3 fa-file-pdf fa-3x"
                                                   style="color: #658FA4;"></i>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <div class="col-lg-3 col-12 text-lg-left text-center pt-4">
                            <p class="h6 font-weight-bold">АПУ/ИТУ:</p>
                            @if(!is_null($build->apu))
                                @foreach(json_decode($build->apu) as $key=>$doc_path)
                                    <div class="row my-2">
                                        <div class="col-lg-8 col-12 text-muted font-small">
                                            {{ $key }}
                                        </div>
                                        <div class="col-lg-2 col-12 icon-top">
                                            <a href="{{ asset('storage/files/'.$doc_path) }}" target="_blank"
                                               {{-- data-path="{{ $build->statement }}"--}} class="  font-weight-bold ">

                                                <i class="fas pt-3 fa-file-pdf fa-3x"
                                                   style="color: #658FA4;"></i>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <div class="col-lg-3 col-12 text-lg-left text-center pt-4">
                            <p class="h6 font-weight-bold">Гос.акт:</p>
                            @if(!is_null($build->act))
                                @foreach(json_decode($build->act) as $key=>$doc_path)
                                    <div class="row my-2">
                                        <div class="col-lg-8 col-12 text-muted font-small">
                                            {{ $key }}
                                        </div>
                                        <div class="col-lg-2 col-12 icon-top">
                                            <a href="{{ asset('storage/files/'.$doc_path) }}" target="_blank"
                                               {{-- data-path="{{ $build->statement }}"--}} class="  font-weight-bold ">

                                                <i class="fas pt-3 fa-file-pdf fa-3x"
                                                   style="color: #658FA4;"></i>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <div class="col-lg-3 col-12 text-lg-left text-center pt-4">
                            <p class="h6 font-weight-bold">Проект</p>
                            @if(!is_null($build->project))
                                @foreach(json_decode($build->project) as $key=>$doc_path)
                                    <div class="row my-2">
                                        <div class="col-lg-8 col-12 text-muted font-small">
                                            {{ $key }}
                                        </div>
                                        <div class="col-lg-2 col-12 icon-top">
                                            <a href="{{ asset('storage/files/'.$doc_path) }}" target="_blank"
                                               {{-- data-path="{{ $build->statement }}"--}} class="  font-weight-bold ">

                                                <i class="fas pt-3 fa-file-pdf fa-3x"
                                                   style="color: #658FA4;"></i>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <div class="col-lg-6 col-12 text-lg-left text-center pt-4">
                            <p class="h6 font-weight-bold"> Разрешение на
                                строительство:</p>
                            @if(!is_null($build->solution))
                                @foreach(json_decode($build->solution) as $key=>$doc_path)
                                    <div class="row my-2">
                                        <div class="col-lg-8 col-12 text-muted font-small">
                                            {{ $key }}
                                        </div>
                                        <div class="col-lg-2 col-12 icon-top">
                                            <a href="{{ asset('storage/files/'.$doc_path) }}" target="_blank"
                                               {{-- data-path="{{ $build->statement }}"--}} class="  font-weight-bold ">

                                                <i class="fas pt-3 fa-file-pdf fa-3x"
                                                   style="color: #658FA4;"></i>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <div class="col-lg-6 col-12 text-lg-left text-center pt-4">
                            <p class="h6 font-weight-bold"> Акт ввода:</p>
                                @if(!is_null($build->certificate))
                                    @foreach(json_decode($build->certificate) as $key=>$doc_path)
                                        <div class="row my-2">
                                            <div class="col-lg-8 col-12 text-muted font-small">
                                                {{ $key }}
                                            </div>
                                            <div class="col-lg-2 col-12 icon-top">
                                                <a href="{{ asset('storage/files/'.$doc_path) }}" target="_blank"
                                                   {{-- data-path="{{ $build->statement }}"--}} class="  font-weight-bold ">

                                                    <i class="fas pt-3 fa-file-pdf fa-3x"
                                                       style="color: #658FA4;"></i>
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                    </div>
                </div>

            <div class="row mt-3">
                <div class="col-12 p-3 bg-show">
                    <div id="map" class="border-0" style="width: 100%; height: 400px;"></div>
                </div>
            </div>
            <div class="row px-1 mt-3 bg-show ">
                <div class="col-12  py-4 ">
                    <div class="row mx-5">
                        <div class="col-lg-6 col-12 text-lg-left text-center">
                            <h3 class="py-3 font-weight-bold mb-0">Поэтапная приемка</h3>
                        </div>
                        <div class="col-lg-6 col-12 text-lg-right text-center py-2">
                            <button data-toggle="modal" data-target="#addStages" type="button" class="btn-green-stage "
                                    style="padding: 11px 19px;margin-top: 15px;">Добавить этап
                            </button>
                        </div>
                    </div>
                    <div class="row mx-lg-5">
                        <div class="col-12 ">
                            <div class="accordion md-accordion accordion-blocks border-0  " id="accordionStages"
                                 role="tablist"
                                 aria-multiselectable="true">
                                @foreach($build->stages as $stage)
                                    <div class="card">
                                        <div class="card-header border-bottom" role="tab" id="Stage-{{ $stage->id }}">
                                            <a data-toggle="collapse" data-parent="#accordionStages"
                                               href="#build-{{ $stage->build_id }}Stage-{{ $stage->id }}"
                                               aria-expanded="true"
                                               aria-controls="build-{{ $stage->build_id }}Stage-{{ $stage->id }}">
                                                <h6 class="mt-1 mb-0  ">
                                                    <span>Этап: <span>{{ $stage->stage }}</span></span>
                                                    <i class="fas fa-angle-down rotate-icon"
                                                       style="margin-top: 2px;"></i>
                                                </h6>
                                            </a>
                                        </div>
                                        <div id="build-{{ $stage->build_id }}Stage-{{ $stage->id }}" class="collapse"
                                             role="tabpanel" aria-labelledby="Stage-{{ $stage->id }}"
                                             data-parent="#accordionStages">
                                            <div class="card-body p-0">
                                                <div class="table-ui  mb-3  mb-4">
                                                    <div
                                                            class="d-flex col-lg-12 col-12 pt-3 justify-content-lg-end text-center">
                                                        <p class="font-weight-bold font-small ">{{ date('d.m.Y',strtotime($stage->date)) }}</p>
                                                    </div>
                                                    <div class="row  mx-2">
                                                        <div
                                                                class="col-lg-3 col-12 text-lg-left py-2 text-center ">
                                                            <p class="h6 font-weight-bold ">Этап:</p>
                                                            <p class="text-muted">{{ $stage->stage }}</p>
                                                        </div>
                                                        <div
                                                                class="col-lg-6 col-12 text-lg-left py-2 text-center ">
                                                            <p class="h6 font-weight-bold ">Описание:</p>
                                                            <p class="text-muted">{{ $stage->desc }}</p>
                                                        </div>
                                                        <div
                                                                class="col-lg-3 col-12 text-lg-left py-2 text-center ">
                                                            <p class="h6 font-weight-bold">
                                                                Документы: {{ $stage->document }}</p>
                                                            @if(!is_null($stage->document_scan))
                                                                @foreach(json_decode($stage->document_scan) as $doc_path)
                                                                    <a href="{{ asset('storage/files/' . $doc_path) }}"
                                                                       target="_blank"
                                                                       {{--data-path="{{ $doc_path }}"--}} class="mx-auto show_doc btn_stage_docs">
                                                                        <i class="fas pt-3 fa-file-pdf fa-4x"
                                                                           style="color: red;"></i>
                                                                    </a>
                                                                @endforeach
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="row  mx-2">
                                                        <div
                                                            class="col-lg-5 pt-3 col-12 text-lg-left text-center">
                                                            <p class="h6 font-weight-bold ">Фото объекта:</p>
                                                            <div class="row">
                                                                @if(!is_null($stage->images))
                                                                    @foreach(json_decode($stage->images) as $media)
                                                                        <div class="col-12 col-lg-3 position-relative">
                                                                            <a href="{{ asset('storage/files/'.$media) }}"
                                                                               data-fancybox="media-{{$stage->id}}"
                                                                               class="img-fluid">
                                                                                <img
                                                                                        src="{{ asset('storage/files/'.$media) }}"
                                                                                        class="mediafile img-fluid m-2"
                                                                                        alt=""></a>
                                                                            <a href="{{ asset('storage/files/'.$media) }}"
                                                                               download>
                                                                                <i class="fas fa-arrow-alt-circle-down stage position-absolute"></i>
                                                                            </a>
                                                                        </div>
                                                                    @endforeach
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-5 col-12 pt-3 text-lg-left text-center">
                                                            <p class="h6 font-weight-bold ">Примечание:</p>
                                                            <p class=" text-muted">
                                                                {{ $stage->note }}
                                                            </p>
                                                        </div>

                                                        <div class="col-lg-2 col-12 pt-3 text-lg-left text-center">
                                                            <p class="h6 font-weight-bold ">Инспектор:</p>
                                                            <p class=" text-muted">
                                                                {{ $histories->where('stage_id', $stage->id)->where('action', 'Добавил')->first()->user->name}}
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
            </div>
        </div>


        <div class="modal fade" id="addStages" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Добавление этапа</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('isp.store.stage') }}" method="post" id="save_form"
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
                                       accept="application/pdf" required
                                       multiple>
                            </div>
                            <div class="form-group">
                                <label for="stage_field">Изображения:<span class="text-danger">*</span></label>
                                <input id="stage_field" type="file" class="form-control" name="images[]"
                                       accept="image/*" required
                                       multiple>
                            </div>
                            <div class="form-group">
                                <label for="note_field">Примечание:<span class="text-danger">*</span></label>
                                <textarea id="note_field" class="form-control" name="note" required></textarea>
                            </div>
                            <div class="form-group">
                                <label class="mutable-req" for="project_field">
                                    Акт ввода:</label>
                                <input id="project_field" type="file" class="form-control files-input"
                                       name="certificate[]"
                                       accept="application/pdf" multiple>
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

        {{--<div class="modal fade" id="info" tabindex="-1" aria-labelledby="docModalLabel" aria-hidden="true">--}}
        {{--<div class="modal-dialog modal-lg">--}}
        {{--<div class="modal-content">--}}
        {{--<div class="modal-header">--}}
        {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
        {{--<span aria-hidden="true">&times;</span>--}}
        {{--</button>--}}
        {{--</div>--}}
        {{--<div class="modal-body">--}}
        {{--<iframe id="frame" src="" height="500" width="750"></iframe>--}}
        {{--</div>--}}
        {{--<div class="modal-footer">--}}
        {{--<button type="button" class="btn btn-success" data-dismiss="modal">Закрыть</button>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}

    </section>
@endsection
@push('scripts')
    <script>
        $('.show_doc').click(function (e) {
            part_scr = e.currentTarget.dataset.path;
            $('#frame').attr("src", window.location.origin + "/storage/files/" + part_scr);
            $('#info').modal('show');
        })
    </script>
    <script type="text/javascript">
        // Функция ymaps.ready() будет вызвана, когда
        // загрузятся все компоненты API, а также когда будет готово DOM-дерево.
        ymaps.ready(init);

        function init() {
            // Создание карты.
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
