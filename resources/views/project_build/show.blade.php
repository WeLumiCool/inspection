@extends('layouts.app')
@section('content')
    <div class="container pt-5 mt-5">
        <div class="row">
            <div class="col-12 bg-form card-body-admin ">
                <div class="row border-bottom ">
                    <div class="col-lg-2 pt-1">
                        <p class="font-weight-bold font-small text-left" style="padding-top: 25px;">20.08.2020</p>
                    </div>
                    <div class="col-lg-8">
                        <h2 class="text-center  py-3 font-weight-bold">Поэтапная приемка</h2>
                    </div>
                    <div class="col-lg-2 pt-1">
                        <button type="button" class="btn btn-dark-green" style="padding: 11px 19px;
    margin-top: 15px;">Добавить этап</button>
                    </div>
                </div>
                <div class="justify-content-between row pt-2">
                    <div class="col-3 ">
                        <p class="h5 font-weight-bold">Этап:</p>
                    </div>
                    <div class="col-7">
                        <p class="h5 font-weight-bold">Описание:</p>
                    </div>
                    <div class="col-2">
                        <p class="h5 font-weight-bold">Документы:</p>
                    </div>
                </div>
                <div class="justify-content-between row">
                    <div class="col-3 ">
                        <p class="">Котлован</p>
                    </div>
                    <div class="col-7">
                        <p class="">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium architecto
                            asperiores atque consectetur cum in iure numquam pariatur quibusdam, veritatis.</p>
                    </div>
                    <div class="col-2 ">
                        доки
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-6 ">
                        <p class="h5 font-weight-bold text-center">Скан.Документа:</p>
                    </div>
                    <div class="col-6">
                        <p class="h5 font-weight-bold  text-center">Фото объекта:</p>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-6 ">
                        <p class="">скан</p>
                    </div>
                    <div class="col-6">
                        <p class="">картинки</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
