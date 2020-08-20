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
            <div class="col-10"><button>Посмотреть</button></div>
            <div class="col-2">АПУ/ИТУ:</div>
            <div class="col-10"><button>Посмотреть</button></div>
            <div class="col-2">Акт:</div>
            <div class="col-10"><button>Посмотреть</button></div>
            <div class="col-2">Проект:</div>
            <div class="col-10"><button>Посмотреть</button></div>
            <div class="col-2">Разрешение на строительство:</div>
            <div class="col-10"><button>Посмотреть</button></div>
            <div class="col-2">Сертификат:</div>
            <div class="col-10"><button>Посмотреть</button></div>
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
            @foreach($build->stages as $stage)
                <div class="col-2">{{ $stage->name }}</div>
                {{--<div class="col-10">{{ $stage-> }}</div>--}}
            @endforeach
        </div>
        <button type="button" class="btn btn-primary mt-3" data-toggle="modal" data-target="#exampleModal">
            Добавить эпапы
        </button>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
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