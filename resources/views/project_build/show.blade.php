@extends('layouts.app')
@section('content')
    <section class="pt-5 mt-5">
        <div class="container pt-3">
            <div class="row mx-1 bg-show">
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
                            <p class="h6 font-weight-bold ">Вид объекта:</p>
                            <p class="text-muted">{{ $build->type->name }}</p>
                        </div>
                        <div class="col-lg col-12 text-lg-left text-center">
                            <p class="h6 font-weight-bold">Адрес объекта:</p>
                            <p class="text-muted">{{ $build->address }}</p>
                        </div>
                        <div class="col-lg col-12 text-lg-left text-center">
                            <p class="h6 font-weight-bold">Площадь объекта:</p>
                            <p class="text-muted">{{ $build->area }}</p>
                        </div>

                    </div>
                    <div class="row border-bottom">
                        <div class="col-lg col-12 text-lg-left text-center">
                            <p class="h6 font-weight-bold">Примечание:</p>
                            <p class="text-muted">{{ $build->note }}</p>
                        </div>
                    </div>
                    <div class=" row ">
                        <div class="col-lg-3 col-12 text-lg-left text-center pt-4">
                            <button data-path="{{ $build->statement }}" class="show_doc   btn-show  font-weight-bold ">Заявление
                            </button>
                        </div>
                        <div class="col-lg-3 col-12 text-lg-left text-center pt-4">
                            <button data-path="{{ $build->apu }}" class="show_doc   btn-show  font-weight-bold ">АПУ/ИТУ</button>
                        </div>
                        <div class="col-lg-3 col-12 text-lg-left text-center pt-4">
                            <button data-path="{{ $build->act }}" class="show_doc   btn-show  font-weight-bold ">Гос.акт</button>
                        </div>
                        <div class="col-lg-3 col-12 text-lg-left text-center pt-4">
                            <button data-path="{{ $build->project }}" class="show_doc    btn-show font-weight-bold ">Проект</button>
                        </div>
                        <div class="col-lg-6 col-12 text-lg-left text-center pt-4">
                            <button data-path="{{ $build->solution }}" class="show_doc   btn-show  font-weight-bold ">Разрешение на
                                строительство (положительное разрешение
                                гос.экспертизы)
                            </button>
                        </div>
                        <div class="col-lg-6 col-12 text-lg-left text-center pt-4">
                            <button data-path="{{ $build->certificate }}" class="show_doc  btn-show font-weight-bold ">АКТ оценки
                                соотвествия вводимого в эксплуатацию
                                завершенного строительства объекта
                            </button>
                        </div>

                    </div>
                </div>
            </div>
            <div class="bg-show mt-5 px-lg-5 mx-1 py-2">
                <div class="col-12  row justify-content-lg-between justify-content-center py-2 mx-0">
                    <h3 class="text-center  py-3 font-weight-bold mb-0">Поэтапная приемка</h3>
                    <button data-toggle="modal" data-target="#addStages" type="button" class="btn-green-stage "
                            style="padding: 11px 19px;margin-top: 15px;">Добавить этап
                    </button>
                </div>
                <div class="row ">
                    <div class="col-12 ">
                        <div class="accordion md-accordion accordion-blocks border-0  " id="accordionStages" role="tablist"
                             aria-multiselectable="true">
                            @foreach($build->stages as $stage)
                                <div class="card">
                                    <div class="card-header border-bottom" role="tab" id="Stage-{{ $stage->id }}">
                                        <a data-toggle="collapse" data-parent="#accordionStages"
                                           href="#build-{{ $stage->build_id }}Stage-{{ $stage->id }}"
                                           aria-expanded="true"
                                           aria-controls="build-{{ $stage->build_id }}Stage-{{ $stage->id }}">
                                            <h6 class="mt-1 mb-0  ">
                                                <span>Этап: <span>Котлован</span></span>
                                                <i class="fas fa-angle-down rotate-icon" style="margin-top: 2px;"></i>
                                            </h6>
                                        </a>
                                    </div>
                                    <div id="build-{{ $stage->build_id }}Stage-{{ $stage->id }}" class="collapse"
                                         role="tabpanel" aria-labelledby="Stage-{{ $stage->id }}"
                                         data-parent="#accordionStages">
                                        <div class="card-body p-0">
                                            <div class="table-ui  mb-3  mb-4">
                                                <div class="row col-lg-12 col-12 pt-0 justify-content-lg-end text-lg-right text-center">
                                                    <p class="font-weight-bold font-small ">{{ date('d.m.Y',strtotime($stage->date)) }}</p>
                                                </div>
                                                <div class="row border mx-2">
                                                    <div class="col-lg-3 col-12 text-lg-left py-2 text-center border-right">
                                                        <p class="h6 font-weight-bold ">Этап:</p>
                                                        <p class="text-muted">{{ $stage->stage }}</p>
                                                    </div>
                                                    <div class="col-lg-6 col-12 text-lg-left py-2 text-center border-right">
                                                        <p class="h6 font-weight-bold ">Описание:</p>
                                                        <p class="text-muted">{{ $stage->desc }}</p>
                                                    </div>
                                                    <div class="col-lg-3 col-12 text-lg-left py-2 text-center border-right">
                                                        <p class="h6 font-weight-bold">Документы: {{ $stage->document }}</p>
                                                        @if(!is_null($stage->document_scan))
                                                            @foreach(json_decode($stage->document_scan) as $doc_path)
                                                                <a href="{{ asset('storage/files/' . $doc_path) }}"
                                                                   class="mx-auto" download>
                                                                    <i class="fas pt-3 fa-file-pdf fa-4x"
                                                                       style="color: red;"></i>
                                                                </a>
                                                            @endforeach
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="row border border-top-0 mx-2">
                                                    <div class="col-lg-6 border-right pt-3 col-12 text-lg-left text-center">
                                                        <p class="h6 font-weight-bold ">Фото объекта:</p>
                                                        <div class="row">
                                                            @if(!is_null($stage->images))
                                                                @foreach(json_decode($stage->images) as $media)
                                                                    <div class="col-12 col-lg-3 position-relative">
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
            </div>

        </div>


        <!--/.Accordion wrapper-->


        <div class="modal fade" id="addStages" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Добавление этапа</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('isp_store') }}" method="post" id="save_form"
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
@endpush
