@extends('layouts.app')
@section('content')
    <section class="pt-5 mt-5">
        <div class="container pt-3">
            <div class="row mx-1">
                <div class="col-12 text-lg-left text-center px-lg-0">
                    <h3 class="py-3 font-weight-bold mb-0">Название объекта</h3>
                </div>
                <div class="col-12 bg-form card-body-admin p-3">
                    <div class="row ">
                        <div class="col-lg col-12 text-lg-left text-center">
                            <p class="h6 font-weight-bold ">ФИО:</p>
                            <p class="text-muted">Николай А.Н</p>
                        </div>
                        <div class="col-lg col-12 text-lg-left text-center">
                            <p class="h6 font-weight-bold ">Вид объекта:</p>
                            <p class="text-muted">Lorem ipsum dolor sit</p>
                        </div>
                        <div class="col-lg col-12 text-lg-left text-center">
                            <p class="h6 font-weight-bold">Адрес объекта:</p>
                            <p class="text-muted">Фрунзе 123</p>
                        </div>
                        <div class="col-lg col-12 text-lg-left text-center">
                            <p class="h6 font-weight-bold">Площадь объекта:</p>
                            <p class="text-muted">123 кв</p>
                        </div>

                    </div>
                    <div class="row border-bottom">
                        <div class="col-lg col-12 text-lg-left text-center">
                            <p class="h6 font-weight-bold">Примечание:</p>
                            <p class="text-muted">что-то</p>
                        </div>
                    </div>
                    <div class=" row ">
                        <div class="col-lg-3 col-12 text-lg-left text-center pt-4">
                            <a href="" class=" font-weight-bold ">Заявление</a>
                        </div>
                        <div class="col-lg-3 col-12 text-lg-left text-center pt-4">
                            <a href="" class=" font-weight-bold ">АПУ/ИТУ</a>
                        </div>
                        <div class="col-lg-3 col-12 text-lg-left text-center pt-4">
                            <a href="" class=" font-weight-bold  ">Гос.акт</a>
                        </div>
                        <div class="col-lg-3 col-12 text-lg-left text-center pt-4">
                            <a href="" class=" font-weight-bold ">Проект</a>
                        </div>
                        <div class="col-lg-4 col-12 text-lg-left text-center pt-4">
                            <a href="" class=" font-weight-bold ">Разрешение на строительство(положительное разрешение
                                гос.экспертизы)</a>
                        </div>
                        <div class="col-lg-4 col-12 text-lg-left text-center pt-4">
                            <a href="" class=" font-weight-bold ">АКТ оценки соотвествия вводимого в эксплуатацию
                                завершенного строительства объекта</a>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-12  row justify-content-lg-between justify-content-center py-2 px-lg-0 mx-lg-0 mx-2">
                <h3 class="text-center  py-3 font-weight-bold mb-0">Поэтапная приемка</h3>
                <button data-toggle="modal" data-target="#addStages" type="button" class="btn btn-dark-green "
                        style="padding: 11px 19px;margin-top: 15px;">Добавить этап
                </button>
            </div>
{{--            <div class="row">--}}
{{--                <div class="col-12 bg-form card-body-admin ">--}}
{{--                    <div class="row border-bottom ">--}}
{{--                        <div class="col-lg-2 col-12 pt-1 text-lg-left text-center">--}}
{{--                            <p class="font-weight-bold font-small " style="padding-top: 25px;">20.08.2020</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="row pt-2">--}}
{{--                        <div class="col-lg-3 col-12 text-lg-left text-center">--}}
{{--                            <p class="h6 font-weight-bold ">Этап:</p>--}}
{{--                            <p class="text-muted">Котлован</p>--}}
{{--                        </div>--}}
{{--                        <div class="col-lg-6 col-12 text-lg-left text-center">--}}
{{--                            <p class="h6 font-weight-bold ">Описание:</p>--}}
{{--                            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium--}}
{{--                                architecto--}}
{{--                                asperiores atque consectetur cum in iure numquam pariatur quibusdam, veritatis.</p>--}}
{{--                        </div>--}}
{{--                        <div class="col-lg-3 col-12 text-lg-left text-center">--}}
{{--                            <p class="h6 font-weight-bold">Документы:</p>--}}
{{--                            <a href="" class="mx-auto" download>--}}
{{--                                <i class="fas pt-3 fa-file-pdf fa-4x"--}}
{{--                                   style="color: red;"></i>--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="row  pt-3">--}}
{{--                        <div class="col-lg-6 col-12 text-lg-left text-center">--}}
{{--                            <p class="h6 font-weight-bold ">Фото объекта:</p>--}}
{{--                            <div class="row  ">--}}
{{--                                --}}{{--                                пример из crm--}}
{{--                                --}}{{--                                <a href="{{ asset('storage/files/'.$media->path) }}" class=""--}}
{{--                                --}}{{--                                   data-fancybox="media-{{$group_file->id}}"><img--}}
{{--                                --}}{{--                                        src="{{ asset('storage/files/'.$media->path) }}"--}}
{{--                                --}}{{--                                        class="mediafile img-fluid m-2 position-relative" alt=""></a>--}}
{{--                                <div class="col-lg-3 col-12 py-2">--}}
{{--                                    <a href=""><img class="img-fluid"--}}
{{--                                                    src="{{ asset('image/makro-brelok-klyuchi-domik.jpg') }}"--}}
{{--                                                    data-fancybox="" alt=""></a>--}}
{{--                                </div>--}}
{{--                                <div class="col-lg-3 col-12 py-2">--}}
{{--                                    <a href=""><img class="img-fluid"--}}
{{--                                                    src="{{ asset('image/rendering-oboi-dom-interer.jpg') }}"--}}
{{--                                                    data-fancybox="" alt=""></a>--}}
{{--                                </div>--}}
{{--                                <div class="col-lg-3 col-12 py-2">--}}
{{--                                    <a href=""><img class="img-fluid"--}}
{{--                                                    src="{{ asset('image/zdanie-4-bashni-w-proekt.jpg') }}"--}}
{{--                                                    data-fancybox="" alt=""></a>--}}
{{--                                </div>--}}
{{--                                <div class="col-lg-3 col-12 py-2">--}}
{{--                                    <a href=""><img class="img-fluid"--}}
{{--                                                    src="{{ asset('image/makro-brelok-klyuchi-domik.jpg') }}"--}}
{{--                                                    data-fancybox="" alt=""></a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-lg-6 col-12 text-lg-left text-center">--}}
{{--                            <p class="h6 font-weight-bold ">Примечание:</p>--}}
{{--                            <p class=" text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus--}}
{{--                                illo--}}
{{--                                nemo unde.</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
            <div class="accordion md-accordion accordion-blocks " id="accordionEx78" role="tablist"
                 aria-multiselectable="true">
                <div class="card">
                    <div class="card-header border-bottom" role="tab" id="headingUnfiled">
                        <a data-toggle="collapse" data-parent="#accordionEx78" href="#collapseUnfiled"
                           aria-expanded="true"
                           aria-controls="collapseUnfiled">
                            <h6 class="mt-1 mb-0  ">
                                <span>Этап: <span>Котлован</span></span>
                                <i class="fas fa-angle-down rotate-icon" style="margin-top: 2px;"></i>
                            </h6>

                        </a>
                    </div>

                    <div id="collapseUnfiled" class="collapse" role="tabpanel" aria-labelledby="headingUnfiled"
                         data-parent="#accordionEx78">
                        <div class="card-body">
                            <div class="table-ui  mb-3  mb-4">
                                    <div class="row col-lg-12 col-12 pt-0 justify-content-lg-end  text-lg-right  text-center">
                                        <p class="font-weight-bold font-small " >20.08.2020</p>
                                    </div>
                                    <div class="row pt-2">
                                        <div class="col-lg-3 col-12 text-lg-left text-center">
                                            <p class="h6 font-weight-bold ">Этап:</p>
                                            <p class="text-muted">Котлован</p>
                                        </div>
                                        <div class="col-lg-6 col-12 text-lg-left text-center">
                                            <p class="h6 font-weight-bold ">Описание:</p>
                                            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium
                                                architecto
                                                asperiores atque consectetur cum in iure numquam pariatur quibusdam, veritatis.</p>
                                        </div>
                                        <div class="col-lg-3 col-12 text-lg-left text-center">
                                            <p class="h6 font-weight-bold">Документы:</p>
                                            <a href="" class="mx-auto" download>
                                                <i class="fas pt-3 fa-file-pdf fa-4x"
                                                   style="color: red;"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="row  pt-3">
                                        <div class="col-lg-6 col-12 text-lg-left text-center">
                                            <p class="h6 font-weight-bold ">Фото объекта:</p>
                                            <div class="row  ">
                                                {{--                                пример из crm--}}
                                                {{--                                <a href="{{ asset('storage/files/'.$media->path) }}" class=""--}}
                                                {{--                                   data-fancybox="media-{{$group_file->id}}"><img--}}
                                                {{--                                        src="{{ asset('storage/files/'.$media->path) }}"--}}
                                                {{--                                        class="mediafile img-fluid m-2 position-relative" alt=""></a>--}}
                                                <div class="col-lg-3 col-12 py-2">
                                                    <a href=""><img class="img-fluid"
                                                                    src="{{ asset('image/makro-brelok-klyuchi-domik.jpg') }}"
                                                                    data-fancybox="" alt=""></a>

                                                </div>
                                                <div class="col-lg-3 col-12 py-2">
                                                    <a href=""><img class="img-fluid"
                                                                    src="{{ asset('image/rendering-oboi-dom-interer.jpg') }}"
                                                                    data-fancybox="" alt=""></a>

                                                </div>
                                                <div class="col-lg-3 col-12 py-2">
                                                    <a href=""><img class="img-fluid"
                                                                    src="{{ asset('image/zdanie-4-bashni-w-proekt.jpg') }}"
                                                                    data-fancybox="" alt=""></a>

                                                </div>
                                                <div class="col-lg-3 col-12 py-2">
                                                    <a href=""><img class="img-fluid"
                                                                    src="{{ asset('image/makro-brelok-klyuchi-domik.jpg') }}"
                                                                    data-fancybox="" alt=""></a>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-12 text-lg-left text-center">
                                            <p class="h6 font-weight-bold ">Примечание:</p>
                                            <p class=" text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus
                                                illo
                                                nemo unde.</p>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="card">
                    <div class="card-header border-bottom" role="tab" id="headingUnfiled2">
                        <a data-toggle="collapse" data-parent="#accordionEx78" href="#collapseUnfiled2"
                           aria-expanded="true"
                           aria-controls="collapseUnfiled2">
                            <h6 class="mt-1 mb-0  ">
                                <span>Этап: <span>Котлован</span></span>
                                <i class="fas fa-angle-down rotate-icon" style="margin-top: 2px;"></i>
                            </h6>

                        </a>
                    </div>

                    <div id="collapseUnfiled2" class="collapse" role="tabpanel" aria-labelledby="headingUnfiled2"
                         data-parent="#accordionEx78">
                        <div class="card-body">
                            <div class="table-ui  mb-3  mb-4">
                                <div class="row col-lg-12 col-12 pt-0 justify-content-lg-end  text-lg-right  text-center">
                                    <p class="font-weight-bold font-small " >20.08.2020</p>
                                </div>
                                <div class="row pt-2">
                                    <div class="col-lg-3 col-12 text-lg-left text-center">
                                        <p class="h6 font-weight-bold ">Этап:</p>
                                        <p class="text-muted">Котлован</p>
                                    </div>
                                    <div class="col-lg-6 col-12 text-lg-left text-center">
                                        <p class="h6 font-weight-bold ">Описание:</p>
                                        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium
                                            architecto
                                            asperiores atque consectetur cum in iure numquam pariatur quibusdam, veritatis.</p>
                                    </div>
                                    <div class="col-lg-3 col-12 text-lg-left text-center">
                                        <p class="h6 font-weight-bold">Документы:</p>
                                        <a href="" class="mx-auto" download>
                                            <i class="fas pt-3 fa-file-pdf fa-4x"
                                               style="color: red;"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="row  pt-3">
                                    <div class="col-lg-6 col-12 text-lg-left text-center">
                                        <p class="h6 font-weight-bold ">Фото объекта:</p>
                                        <div class="row  ">
                                            {{--                                пример из crm--}}
                                            {{--                                <a href="{{ asset('storage/files/'.$media->path) }}" class=""--}}
                                            {{--                                   data-fancybox="media-{{$group_file->id}}"><img--}}
                                            {{--                                        src="{{ asset('storage/files/'.$media->path) }}"--}}
                                            {{--                                        class="mediafile img-fluid m-2 position-relative" alt=""></a>--}}
                                            <div class="col-lg-3 col-12 py-2">
                                                <a href=""><img class="img-fluid"
                                                                src="{{ asset('image/makro-brelok-klyuchi-domik.jpg') }}"
                                                                data-fancybox="" alt=""></a>

                                            </div>
                                            <div class="col-lg-3 col-12 py-2">
                                                <a href=""><img class="img-fluid"
                                                                src="{{ asset('image/rendering-oboi-dom-interer.jpg') }}"
                                                                data-fancybox="" alt=""></a>

                                            </div>
                                            <div class="col-lg-3 col-12 py-2">
                                                <a href=""><img class="img-fluid"
                                                                src="{{ asset('image/zdanie-4-bashni-w-proekt.jpg') }}"
                                                                data-fancybox="" alt=""></a>

                                            </div>
                                            <div class="col-lg-3 col-12 py-2">
                                                <a href=""><img class="img-fluid"
                                                                src="{{ asset('image/makro-brelok-klyuchi-domik.jpg') }}"
                                                                data-fancybox="" alt=""></a>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-12 text-lg-left text-center">
                                        <p class="h6 font-weight-bold ">Примечание:</p>
                                        <p class=" text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus
                                            illo
                                            nemo unde.</p>
                                    </div>
                                </div>
                            </div>
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
                    <div class="modal-body">
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="stage">Название этапа</label>
                                <input type="text" class="form-control" id="stage" placeholder="котлован">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Описание</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="documents">Название документа</label>
                                <input type="text" class="form-control" id="documents" placeholder="Название документа">
                            </div>
                            <div class="form-group">
                                <label for="scan_doc">Скан документа:<span class="text-danger">*</span></label>
                                <input id="scan_doc" type="file" class="form-control" name="scan_doc"
                                       required>
                            </div>
                            <div class="form-group">
                                <label for="photo_object">Фото объекта:<span class="text-danger">*</span></label>
                                <input id="photo_object" type="file" class="form-control" name="photo_object"
                                       required>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea2">Примечание</label>
                                <textarea class="form-control" id="exampleFormControlTextarea2" rows="3"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark" data-dismiss="modal">Закрыть</button>
                        <button type="button" class="btn btn-success">Добавить</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
