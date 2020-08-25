@extends('layouts.app')
@section('content')
    <div id="map"></div>

@endsection

@push('styles')
    <style>
        html, body, #map {
            width: 1000px;
            height: 500px;
            padding: 10px;
            margin-top: 50px;
        }
    </style>
@endpush

@push('scripts')
    <script src="https://api-maps.yandex.ru/2.1/?apikey=a2435f91-837f-4a88-87c0-7ac7813eb317&lang=ru_RU"
            type="text/javascript"></script>
    <script src="https://yandex.st/jquery/2.2.3/jquery.min.js" type="text/javascript"></script>

    {{--        <script>--}}
    {{--            ymaps.ready(init);--}}

    {{--            function init() {--}}

    {{--                // Создание экземпляра карты.--}}
    {{--                var myMap = new ymaps.Map('map', {--}}
    {{--                        center: [42.865388923088396, 74.60104350048829],--}}
    {{--                        zoom: 12--}}
    {{--                    }, {--}}
    {{--                        searchControlProvider: 'yandex#search'--}}
    {{--                    });--}}
    {{--                    // Контейнер для меню.--}}
    {{--                    // menu = $('<ul class="menu"/>');--}}

    {{--                @foreach ($builds as $build)--}}
    {{--                    console.log(JSON.parse('{center: "azret", name: "{{ $build->name }}" }'))--}}
    {{--                    createMenuGroup(JSON.parse('{"center": [{{ $build->latitude }}, {{ $build->longitude }}], "name": "{{ $build->name }}" }'));--}}
    {{--                @endforeach--}}


    {{--                function createMenuGroup (group) {--}}
    {{--                //     // Пункт меню.--}}
    {{--                    var menuItem = $('<li><a href="#">' + group.name + '</a></li>'),--}}
    {{--                        // Коллекция для геообъектов группы.--}}
    {{--                        collection = new ymaps.GeoObjectCollection(null, { preset: group.style }),--}}
    {{--                        // Контейнер для подменю.--}}
    {{--                        submenu = $('<ul class="submenu"/>');--}}

    {{--                    // Добавляем коллекцию на карту.--}}
    {{--                    myMap.geoObjects.add(collection);--}}
    {{--                    // Добавляем подменю.--}}
    {{--                    menuItem--}}
    {{--                        // .append(submenu)--}}
    {{--                        // Добавляем пункт в меню.--}}
    {{--                        // .appendTo(menu)--}}
    {{--                        // По клику удаляем/добавляем коллекцию на карту и скрываем/отображаем подменю.--}}
    {{--                        .find('a')--}}
    {{--                        .bind('click', function () {--}}
    {{--                            if (collection.getParent()) {--}}
    {{--                                myMap.geoObjects.remove(collection);--}}
    {{--                                submenu.hide();--}}
    {{--                            } else {--}}
    {{--                                myMap.geoObjects.add(collection);--}}
    {{--                                submenu.show();--}}
    {{--                            }--}}
    {{--                        });--}}
    {{--                    @foreach ($builds as $build)--}}
    {{--                        createSubMenu(JSON.parse('{"center": [{{ $build->latitude }}, {{ $build->longitude }}], "name": "{{ $build->name }}", "address": "{{ $build->address }}" }'), collection, submenu);--}}
    {{--                        console.log(collection)--}}
    {{--                    @endforeach--}}
    {{--                }--}}
    {{--                //--}}
    {{--                function createSubMenu (item, collection) {--}}
    {{--                    // Пункт подменю.--}}
    {{--                    var submenuItem = $('<li><a href="#">' + item.name + '</a></li>'),--}}
    {{--                        // Создаем метку.--}}
    {{--                        placemark = new ymaps.Placemark(item.center, {--}}
{{--                                balloonContentHeader: item.name,--}}
{{--                                balloonContentBody: item.address--}}
    {{--                        });--}}
    {{--                    // console.log(item.center)--}}
    {{--                    // Добавляем метку в коллекцию.--}}
    {{--                    collection.add(placemark);--}}
    {{--                    // Добавляем пункт в подменю.--}}
    {{--                    submenuItem--}}
    {{--                    // .appendTo(submenu)--}}
    {{--                    //     // При клике по пункту подменю открываем/закрываем баллун у метки.--}}
    {{--                    .find('a')--}}
    {{--                        .bind('click', function () {--}}
    {{--                            if (!placemark.balloon.isOpen()) {--}}
    {{--                                placemark.balloon.open();--}}
    {{--                            } else {--}}
    {{--                                placemark.balloon.close();--}}
    {{--                            }--}}
    {{--                            return false;--}}
    {{--                        });--}}
    {{--                }--}}

    {{--                // Добавляем меню в тэг BODY.--}}
    {{--                // menu.appendTo($('body'));--}}
    {{--                // Выставляем масштаб карты чтобы были видны все группы.--}}
    {{--                myMap.setBounds(myMap.geoObjects.getBounds());--}}
    {{--            }--}}
    {{--        </script>--}}

    <script>
        ymaps.ready(function () {
            var myMap = new ymaps.Map('map', {
                    center: [42.865388923088396, 74.60104350048829],
                    zoom: 10
                }, {
                    searchControlProvider: 'yandex#search'
                }),
                clusterer = new ymaps.Clusterer(),
                getPointData = function (index, name, address) {
                    return {
                        balloonContentHeader: name,
                        balloonContentBody: address
                    };
                },
                // points = [
                //     [55.831903,37.411961], [55.763338,37.565466], [55.763338,37.565466], [55.744522,37.616378], [55.780898,37.642889], [55.793559,37.435983], [55.800584,37.675638], [55.716733,37.589988], [55.775724,37.560840], [55.822144,37.433781], [55.874170,37.669838], [55.716770,37.482338], [55.780850,37.750210], [55.810906,37.654142], [55.865386,37.713329], [55.847121,37.525797], [55.778655,37.710743], [55.623415,37.717934], [55.863193,37.737000], [55.866770,37.760113], [55.698261,37.730838], [55.633800,37.564769], [55.639996,37.539400], [55.690230,37.405853], [55.775970,37.512900], [55.775777,37.442180], [55.811814,37.440448], [55.751841,37.404853], [55.627303,37.728976], [55.816515,37.597163], [55.664352,37.689397], [55.679195,37.600961], [55.673873,37.658425], [55.681006,37.605126], [55.876327,37.431744], [55.843363,37.778445], [55.875445,37.549348], [55.662903,37.702087], [55.746099,37.434113], [55.838660,37.712326], [55.774838,37.415725], [55.871539,37.630223], [55.657037,37.571271], [55.691046,37.711026], [55.803972,37.659610], [55.616448,37.452759], [55.781329,37.442781], [55.844708,37.748870], [55.723123,37.406067], [55.858585,37.484980]
                // ],
                points = [];
                owner = [];
                address = [];
            @foreach($builds as $build)
                points.push([{{ $build->latitude }}, {{ $build->longitude }}]);
                owner.push("{{ $build->name }}");
                address.push("{{ $build->address }}");
            @endforeach
                geoObjects = [];

            for (var i = 0, len = points.length; i < len; i++) {

                geoObjects[i] = new ymaps.Placemark(points[i], getPointData(i, owner[i], address[i]));
            }

            clusterer.add(geoObjects)
            myMap.geoObjects.add(clusterer);
        });
    </script>
@endpush
