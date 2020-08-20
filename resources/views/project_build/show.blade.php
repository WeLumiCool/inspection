@extends('layouts.app')
@section('content')
    <div class="container pt-3">
        <div class="row">
            <div class="col-12 bg-form card-body-admin ">
                <div class="row border-bottom ">
                    <div class="col-lg-2 col-12 pt-1 text-lg-left text-center">
                        <p class="font-weight-bold font-small " style="padding-top: 25px;">20.08.2020</p>
                    </div>
                    <div class="col-lg-8 col-12">
                        <h2 class="text-center  py-3 font-weight-bold">Поэтапная приемка</h2>
                    </div>
                    <div class="col-lg-2 col-12 pt-1 text-lg-left text-center">
                        <button  data-toggle="modal" data-target="#addStages" type="button" class="btn btn-dark-green" style="padding: 11px 19px;margin-top: 15px;">Добавить этап</button>
                    </div>
                </div>
                <div class="justify-content-between row pt-2">
                    <div class="col-lg-3 col-12 text-lg-left text-center">
                        <p class="h5 font-weight-bold ">Этап:</p>
                        <p class="text-muted">Котлован</p>
                    </div>
                    <div class="col-lg-7 col-12 text-lg-left text-center">
                        <p class="h5 font-weight-bold ">Описание:</p>
                        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium architecto
                            asperiores atque consectetur cum in iure numquam pariatur quibusdam, veritatis.</p>
                    </div>
                    <div class="col-lg-2 col-12 text-lg-left text-center">
                        <p class="h5 font-weight-bold">Документы:</p>
                        <p class="text-muted">доки</p>
                    </div>
                </div>
                <div class="row justify-content-between pt-3">
                    <div class="col-lg-3 col-12 text-lg-left text-center">
                        <p class="h5 font-weight-bold">Скан.Документа:</p>
                        <p class="">скан</p>
                    </div>
                    <div class="col-lg-6 col-12 text-lg-left text-center">
                        <p class="h5 font-weight-bold ">Фото объекта:</p>
                        <p class="">картинки</p>

                    </div>
                    <div class="col-lg-3 col-12 text-lg-left text-center">
                        <p class="h5 font-weight-bold ">Примечание</p>
                        <p class=" text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus illo nemo unde.</p>

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
