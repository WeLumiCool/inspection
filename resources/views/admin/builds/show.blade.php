@extends('admin.layouts.dashboard')
@section('dashboard_content')
    <div class="container bg-form card-body-admin py-4">
        <div class="row" id="show_articles">
            <div class="col-2">id</div>
            <div class="col-10">{{ $build->id }}</div>
            <div class="col-2">ФИО:</div>
            <div class="col-10">{{ $build->name }}</div>
            <div class="col-2">Заявление</div>
            <div class="col-10"><a href="">Заявление</a></div>
            <div class="col-2">АПУ/ИТУ:</div>
            <div class="col-10"><a href="">АПУ/ИТУ</a></div>
            <div class="col-2">Акт:</div>
            <div class="col-10"><a href="">Заявление</a></div>
            <div class="col-2">Проект:</div>
            <div class="col-10"><a href="">Проект</a></div>
            <div class="col-2">Тип объекта:</div>
            <div class="col-10">{{ $build->type->name }}</div>
            <div class="col-2">Адрес:</div>
            <div class="col-10">{{ $build->address }}</div>
            <div class="col-2">Площадь:</div>
            <div class="col-10">{{ $build->area }}</div>
            <div class="col-2">Разрешение на строительство:</div>
            <div class="col-10"><a href="">Разрешение на строительство</a></div>
            <div class="col-2">Примечаниие:</div>
            <div class="col-10">{{ $build->note }}</div>
        </div>
    </div>
@endsection
@push('styles')
    <style>
        #show_articles .col-2, #show_articles .col-10 {
            padding-top: 2rem;
            padding-bottom: 2rem;
            border-bottom: 1px solid #dcdcdd;
        }
        #show_articles .col-2 {
            border-right: 1px solid #dcdcdd;
        }
    </style>
@endpush
