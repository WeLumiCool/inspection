@extends('admin.layouts.dashboard')

@section('dashboard_content')
    <div class="p-3 bg-form card-body-admin">
        <div class="row">
            <div class="col-12 col-sm-10 col-lg-12 col-md-10 pb-5 px-5">
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
                        <label for="type_of_object">Тип объекта:</label>
                        <select class="form-control" id="type_of_object" name="type_id">
                            @foreach($types as $type)
                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="category_of_object">Категория объекта:</label>
                        <select class="form-control" id="category_of_object" name="category">
                            @foreach(['Строящиеся','Завершенные', 'Незаконные'] as $type)
                                <option value="{{ $type }}">{{ $type }}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="form-group">
                        <label class="mutable-req" for="statement_field">Заявление:<span class="text-danger">*</span></label>
                        <input id="statement_field" type="file" class="form-control files-input" name="statement[]"
                               accept="application/pdf" required multiple>
                    </div>

                    <div class="form-group">
                        <label class="mutable-req" for="apu_field">АПУ/ИТУ:<span class="text-danger">*</span></label>
                        <input id="apu_field" type="file" class="form-control files-input" name="apu[]"
                               accept="application/pdf"
                               required multiple>
                    </div>

                    <div class="form-group">
                        <label class="mutable-req" for="act_field">Акт:<span class="text-danger">*</span></label>
                        <input id="act_field" type="file" class="form-control files-input" name="act[]"
                               accept="application/pdf"
                               required multiple>
                    </div>

                    <div class="form-group">
                        <label class="mutable-req" for="project_field">Проект:<span class="text-danger">*</span></label>
                        <input id="project_field" type="file" class="form-control files-input" name="project[]"
                               accept="application/pdf" required multiple>
                    </div>

                    <div class="form-group">
                        <label class="mutable-req" for="project_field">Разрешение на строительство:<span
                                    class="text-danger">*</span></label>
                        <input id="project_field" type="file" class="form-control files-input" name="solution[]"
                               accept="application/pdf" required multiple>
                    </div>

                    <div class="form-group">
                        <label for="area_field">Площадь:<span class="text-danger">*</span></label>
                        <input id="area_field" type="text" class="form-control" name="area" required>
                    </div>

                    <div class="form-group">
                        <label for="note_field">Примечание:<span class="text-danger">*</span></label>
                        <textarea id="note_field" class="form-control" name="note" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="address_field">Адрес:<span class="text-danger">*</span></label>
                        <input id="address_field" type="text" class="form-control" name="address"
                               placeholder="Поставьте маркер на карте" required>
                    </div>
                    <div class="form-group">
                        <input id="legality-check" type="checkbox" name="legality">
                        <label for="legality-check">Легален:<span class="text-danger">*</span></label>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control d-none" id="latitude" name="latitude" required>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control d-none" id="longitude" name="longitude" required>
                    </div>

                    <div class="form-group">
                        <div class="form-group col">
                            <div id="map" style="width: 100%; height: 400px;"></div>
                        </div>
                    </div>

                    <button type="submit" title="{{ __('Добавить') }}"
                            class="btn n btn-success">{{ __('Добавить') }}</button>

                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        let is_legality = true;
        $('#category_of_object').change(function (e) {
            let value = e.currentTarget.value;
            if (value === 'Незаконные') {
                if(is_legality) {
                    $('.files-input').removeAttr('required');
                    $('.mutable-req span').remove();
                }
                is_legality = false;
            } else {
                if(!is_legality) {
                    $('.files-input').prop('required', true);
                    $('.mutable-req').append('<span class="text-danger">*</span>');
                }
                is_legality = true;
            }
        })
    </script>
    <script src="https://yandex.st/jquery/2.2.3/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript">

        ymaps.ready(init);

        function init() {
            var myPlacemark,
                myMap = new ymaps.Map('map', {
                    center: [42.865388923088396, 74.60104350048829],
                    zoom: 12
                }, {
                    searchControlProvider: 'yandex#search'
                });
            // Слушаем клик на карте.
            myMap.events.add('click', function (e) {
                var coords = e.get('coords');
                $('#latitude').val(coords[0]);
                $('#longitude').val(coords[1]);
                // Если метка уже создана – просто передвигаем ее.
                if (myPlacemark) {
                    myPlacemark.geometry.setCoordinates(coords);
                }
                // Если нет – создаем.
                else {
                    myPlacemark = createPlacemark(coords);
                    myMap.geoObjects.add(myPlacemark);
                    // Слушаем событие окончания перетаскивания на метке.
                    myPlacemark.events.add('dragend', function () {
                        getAddress(myPlacemark.geometry.getCoordinates());
                    });
                }
                getAddress(coords);
            });

            // Создание метки.
            function createPlacemark(coords) {
                return new ymaps.Placemark(coords, {
                    iconCaption: 'поиск...'
                }, {
                    preset: 'islands#violetDotIconWithCaption',
                    draggable: true
                });
            }

            // Определяем адрес по координатам (обратное геокодирование).
            function getAddress(coords) {
                myPlacemark.properties.set('iconCaption', 'поиск...');
                ymaps.geocode(coords).then(function (res) {
                    var firstGeoObject = res.geoObjects.get(0);
                    console.log(firstGeoObject.getAddressLine());
                    document.getElementById('address_field').value = firstGeoObject.getAddressLine();
                    myPlacemark.properties
                        .set({
                            // Формируем строку с данными об объекте.
                            iconCaption: [
                                // Название населенного пункта или вышестоящее административно-территориальное образование.
                                firstGeoObject.getLocalities().length ? firstGeoObject.getLocalities() : firstGeoObject.getAdministrativeAreas(),
                                // Получаем путь до топонима, если метод вернул null, запрашиваем наименование здания.
                                firstGeoObject.getThoroughfare() || firstGeoObject.getPremise()
                            ].filter(Boolean).join(', '),
                            // В качестве контента балуна задаем строку с адресом объекта.
                            balloonContent: firstGeoObject.getAddressLine()
                        });
                });
            }
        }
    </script>
@endpush
