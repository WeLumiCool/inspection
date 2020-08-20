@extends('layouts.app')
@section('content')
    <div class="container pt-3">
        <div class="row">
            <div class="col-12">
                <h3 class=" py-3 font-weight-bold mb-0">Название объекта</h3>
            </div>
            <div class="col-12 bg-form card-body-admin p-3">
                <div class="row border-bottom">
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
                    <div class="col-lg col-12 text-lg-left text-center">
                        <p class="h6 font-weight-bold">Примечание:</p>
                        <p class="text-muted">что-то</p>
                    </div>
                </div>
                <div class=" row ">
                    <div class="col-lg-3 col-12 text-lg-left text-center pt-4">
                        <a href="" class="h6 font-weight-bold shadow-sm" style="background-color: #508aeb;color:white;padding: 5px;border-radius: 5px;">Заявление</a>
                    </div>
                    <div class="col-lg-3 col-12 text-lg-left text-center pt-4">
                        <a href="" class="h6 font-weight-bold shadow-sm" style="background-color: #508aeb;color:white;padding: 5px;border-radius: 5px;">АПУ/ИТУ</a>
                    </div>
                    <div class="col-lg-3 col-12 text-lg-left text-center pt-4">
                        <a href="" class="h6 font-weight-bold  shadow-sm" style="background-color: #508aeb;color:white;padding: 5px;border-radius: 5px;">Гос.акт</a>
                    </div>
                    <div class="col-lg-3 col-12 text-lg-left text-center pt-4">
                        <a href="" class=" font-weight-bold shadow-sm" style="background-color: #508aeb;color:white;padding: 5px;border-radius: 5px;">Проект</a>
                    </div>
                    <div class="col-lg-4 col-12 text-lg-left text-center pt-4">
                            <a href="" class=" font-weight-bold " >Разрешение на строительство(положительное разрешение гос.экспертизы)</a>
                    </div>
                    <div class="col-lg-4 col-12 text-lg-left text-center pt-4">
                        <a href="" class=" font-weight-bold ">АКТ оценки соотвествия вводимого в эксплуатацию
                            завершенного строительства объекта</a>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-12 row justify-content-between py-2">
            <h3 class="text-center  py-3 font-weight-bold mb-0">Поэтапная приемка</h3>
            <button data-toggle="modal" data-target="#addStages" type="button" class="btn btn-dark-green  "
                    style="padding: 11px 19px;margin-top: 15px;">Добавить этап
            </button>
        </div>
        <div class="row">
            <div class="col-12 bg-form card-body-admin ">
                <div class="row border-bottom ">
                    <div class="col-lg-2 col-12 pt-1 text-lg-left text-center">
                        <p class="font-weight-bold font-small " style="padding-top: 25px;">20.08.2020</p>
                    </div>
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
                        <p class="text-muted">доки</p>
                    </div>
                </div>
                <div class="row  pt-3">
                    <div class="col-lg-3 col-12 text-lg-left text-center">
                        <p class="h6 font-weight-bold">Скан.Документа:</p>
                        <p class="">скан</p>
                    </div>
                    <div class="col-lg-6 col-12 text-lg-left text-center">
                        <p class="h6 font-weight-bold ">Фото объекта:</p>
                        <p class="">картинки</p>
                    </div>
                    <div class="col-lg-3 col-12 text-lg-left text-center">
                        <p class="h6 font-weight-bold ">Примечание:</p>
                        <p class=" text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus illo
                            nemo unde.</p>
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
@endsection
