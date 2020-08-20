@extends('admin.layouts.dashboard')

@section('dashboard_content')
    <div class="p-3 bg-form card-body-admin">
        <div class="row">
            <div class="col-12 col-sm-10 col-lg-10 col-md-10">
                <form action="{{ route('admin.builds.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row justify-content-center">
                        <p class="font-weight-bold h2">Добавление объекта</p>
                    </div>
                    <div class="form-group">
                        <label for="name_field">ФИО:<span class="text-danger">*</span></label>
                        <input id="name_field" type="text" class="form-control" name="name" required>
                    </div>

                    <div class="form-group">
                        <label for="statement_field">Заявление:<span class="text-danger">*</span></label>
                        <input id="statement_field" type="file" class="form-control" name="statement" required>
                    </div>

                    <div class="form-group">
                        <label for="apu_field">АПУ/ИТУ:<span class="text-danger">*</span></label>
                        <input id="apu_field" type="file" class="form-control" name="apu" required>
                    </div>

                    <div class="form-group">
                        <label for="act_field">Акт:<span class="text-danger">*</span></label>
                        <input id="act_field" type="file" class="form-control" name="act" required>
                    </div>

                    <div class="form-group">
                        <label for="project_field">Проект:<span class="text-danger">*</span></label>
                        <input id="project_field" type="file" class="form-control" name="project" required>
                    </div>

                    <div class="form-group">
                        <label for="type_of_object">Тип объекта:</label>
                        <select class="form-control" id="type_of_object" name="type_id">
                            @foreach($types as $type)
                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="name_field">Адрес:<span class="text-danger">*</span></label>
                        <input id="name_field" type="text" class="form-control" name="address" required>
                    </div>

                    <div class="form-group">
                        <label for="area_field">Площадь:<span class="text-danger">*</span></label>
                        <input id="area_field" type="text" class="form-control" name="area" required>
                    </div>

                    <div class="form-group">
                        <label for="project_field">Разрешение на строительство:<span class="text-danger">*</span></label>
                        <input id="project_field" type="file" class="form-control" name="solution" required>
                    </div>

                    <div class="form-group">
                        <label for="certificate_field">АКТ оценки соответсвия вводимого в эксплуатацию завершенного строительством объекта:<span class="text-danger">*</span></label>
                        <input id="certificate_field" type="file" class="form-control" name="certificate" required>
                    </div>

                    <div class="form-group">
                        <label for="note_field">Примечание:<span class="text-danger">*</span></label>
                        <input id="note_field" type="text" class="form-control" name="note" required>
                    </div>
                    <button type="submit" title="{{ __('Добавить') }}"
                            class="btn n btn-success">{{ __('Добавить') }}</button>
                </form>
            </div>
        </div>
    </div>
@endsection
