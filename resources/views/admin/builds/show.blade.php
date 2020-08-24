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
            <div class="col-12 border text-center"><b>Этапы:</b></div>
            <div class="col-2 border"><b>Наименование:</b></div>
            <div class="col-4 border d-flex align-items-center"><b>Описание:</b></div>
            <div class="col-2 border"><b>Дата:</b></div>
            <div class="col-2 border"><b>Примечание:</b></div>
            <div class="col-2 border"><b>Действия:</b></div>
            @foreach($build->stages as $stage)
                <div class="col-2 border">{{ $stage->stage }}</div>
                <div class="col-4 border" style="overflow-y:scroll; max-height:200px;">{{ $stage->desc }}</div>
                <div class="col-2 border">{{ date('d-m-Y', strtotime($stage->date)) }}</div>
                <div class="col-2 border" style="overflow-y:scroll; max-height:200px;">{{ $stage->note }}</div>
                <div class="col-2 border">
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
                </div>
                <div class="col-12 border">
                    <div class="row">
                        {{--@dd($stage->images)--}}
                        @foreach(json_decode($stage->images) as $media)
                            <div class="col-2 position-relative">
                                <a href="{{ asset('storage/files/'.$media) }}" class="img-fluid">
                                    <img src="{{ asset('storage/files/'.$media) }}"
                                         class="mediafile img-fluid m-2" alt=""></a>

                                <i class="far fa-times-circle img position-absolute ml-5 delete" data-name="media"
                                   id="delete_media"
                                   data-media="{{ $loop->index }}"></i>

                                <a href="{{ asset('storage/files/'.$media) }}" download>
                                    <i class="fas fa-arrow-alt-circle-down img position-absolute"></i>
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <div class="col-12 border">

                    </div>
                    @endforeach
                </div>
        </div>
        <button type="button" class="btn btn-success mt-3" data-toggle="modal" data-target="#exampleModalCenter">
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
                                <label for="stage_field">Дата проверки:<span class="text-danger">*</span></label>
                                <input id="stage_field" type="date" class="form-control" name="date" required>
                            </div>
                            <div class="form-group">
                                <label for="stage_field">Наименование докуметов:<span
                                        class="text-danger">*</span></label>
                                <input id="stage_field" type="text" class="form-control" name="document" required>
                            </div>
                            <div class="form-group">
                                <label for="stage_field">Докуметы:<span class="text-danger">*</span></label>
                                <input id="stage_field" type="file" class="form-control" name="document_scan[]" required
                                       multiple>
                            </div>
                            <div class="form-group">
                                <label for="stage_field">Изображения:<span class="text-danger">*</span></label>
                                <input id="stage_field" type="file" class="form-control" name="images[]" required
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
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                </div>
            </div>
        </div>
    </div>
@endsection
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

@push('styles')
    <style>
        #show_articles div {
            padding-top: 2rem;
            padding-bottom: 2rem;
            border: 1px solid #dcdcdd;
        }


    </style>
@endpush
