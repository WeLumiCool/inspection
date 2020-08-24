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
    {{--    <script type="text/javascript">--}}
    {{--        // ymaps.ready(init);--}}
    {{--        //--}}
    {{--        // function init() {--}}
    {{--        //     var myPlacemark,--}}
    {{--        //         myMap = new ymaps.Map('map', {--}}
    {{--        //             center: [42.865388923088396, 74.60104350048829],--}}
    {{--        //             zoom: 12--}}
    {{--        //         }, {--}}
    {{--        //             searchControlProvider: 'yandex#search'--}}
    {{--        //         });--}}
    {{--        //     // Слушаем клик на карте.--}}
    {{--        //     myMap.events.add('click', function (e) {--}}
    {{--        //         var coords = e.get('coords');--}}
    {{--        //         // $('#latitude').val(coords[0]);--}}
    {{--        //         // $('#longtitude').val(coords[1]);--}}
    {{--        //         // Если метка уже создана – просто передвигаем ее.--}}
    {{--        //         if (myPlacemark) {--}}
    {{--        //             myPlacemark.geometry.setCoordinates(coords);--}}
    {{--        //         }--}}
    {{--        //         // Если нет – создаем.--}}
    {{--        //         else {--}}
    {{--        //             myPlacemark = createPlacemark(coords);--}}
    {{--        //             myMap.geoObjects.add(myPlacemark);--}}
    {{--        //             // Слушаем событие окончания перетаскивания на метке.--}}
    {{--        //             myPlacemark.events.add('dragend', function () {--}}
    {{--        //                 getAddress(myPlacemark.geometry.getCoordinates());--}}
    {{--        //             });--}}
    {{--        //         }--}}
    {{--        //         getAddress(coords);--}}
    {{--        //     });--}}
    {{--        //--}}
    {{--        //     // Создание метки.--}}
    {{--        //     function createPlacemark(coords) {--}}
    {{--        //         return new ymaps.Placemark(coords, {--}}
    {{--        //             iconCaption: 'поиск...'--}}
    {{--        //         }, {--}}
    {{--        //             preset: 'islands#violetDotIconWithCaption',--}}
    {{--        //             draggable: true--}}
    {{--        //         });--}}
    {{--        //     }--}}
    {{--        // }--}}
    {{--        ymaps.ready(function(){--}}
    {{--            // Указывается идентификатор HTML-элемента.--}}
    {{--            var moscow_map = new ymaps.Map("first_map", {--}}
    {{--                center: [42.865388923088396, 74.60104350048829],--}}
    {{--                zoom: 10--}}
    {{--            });--}}
    {{--            // Ссылка на элемент.--}}
    {{--            var piter_map = new ymaps.Map(document.getElementsByTagName('p')[2], {--}}
    {{--                center: [59.94, 30.32],--}}
    {{--                zoom: 9--}}
    {{--            });--}}
    {{--        });--}}
    {{--    </script>--}}
    <script type="text/javascript">
        ymaps.ready(function () {
            // Указывается идентификатор HTML-элемента.
            var moscow_map = new ymaps.Map("map", {
                center: [42.865388923088396, 74.60104350048829],
                zoom: 10
            });
        });
        var inputSearch = new ymaps.control.SearchControl({
                options: {
                    // Пусть элемент управления будет
                    // в виде поисковой строки.
                    size: 'large',
                    // Включим возможность искать
                    // не только топонимы, но и организации.
                    provider: 'yandex#search'
                }
            }),
        // Добавим поисковую строку на карту.
            myMap = new ymaps.Map('map', {
                zoom: 12,
                center: [55.76, 37.64],
                controls: [inputSearch]
            });
    </script>
@endpush
