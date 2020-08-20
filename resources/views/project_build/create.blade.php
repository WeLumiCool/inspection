@extends('layouts.app')
@section('content')
    <div class="container pt-5 mt-5">
        <div class="row">
            <div class="col-12 bg-form card-body-admin ">
                <form action="" method="post">
                    <div class="col-12 text-center pt-2">
                        <h2 class="font-weight-bold">Добавление объекта</h2>
                    </div>
                            <div class="col-12 col-lg-12 ">
                                <div class="form-group">
                                    <label for="name_field">ФИО:<span class="text-danger">*</span></label>
                                    <input id="name_field" type="text" class="form-control" name="name" required>
                                </div>

                                <div class="form-group">
                                    <label for="statement_field">Заявление:<span class="text-danger">*</span></label>
                                    <input id="statement_field" type="file" class="form-control" name="statement"
                                           required>
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
                                            <option value=""></option>
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
                                    <label for="project_field">Разрешение на строительство:<span
                                            class="text-danger">*</span></label>
                                    <input id="project_field" type="file" class="form-control" name="solution" required>
                                </div>

                                <div class="form-group">
                                    <label for="note_field">Примечание:<span class="text-danger">*</span></label>
                                    <input id="note_field" type="text" class="form-control" name="note" required>
                                </div>
                                {{--                    <div class="form-check pb-2">--}}
                                {{--                        <input type="checkbox" name="legality" class="form-check-input"--}}
                                {{--                               id="is_active-checkbox">--}}
                                {{--                        <label class="form-check-label" for="is_active-checkbox">Легальность</label>--}}
                                {{--                    </div>--}}

                                <button type="submit" title="{{ ('Добавить') }}"
                                        class="btn n btn-success">{{ ('Добавить') }}</button>
                            </div>
                </form>
            </div>
        </div>
    </div>
@endsection
