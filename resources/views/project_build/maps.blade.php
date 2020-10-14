@extends('layouts.app')
@section('content')
    <div class="section pt-5">
        <div class="container bg-form">
            <div class="row justify-content-center mt-5">
                <div class="col-lg-2 mx-auto p-4 col-sm-12">
                    <div class="form-check">
                        <input class="form-check-input district-check" type="radio" name="exampleRadios" id="district1"
                               data-district="Свердловский" value="option1">
                        <label class="form-check-label" for="district1">
                            Свердловский
                        </label>
                    </div>
                </div>
                <div class="col-lg-2 mx-auto p-4 col-sm-12">
                    <div class="form-check">
                        <input class="form-check-input district-check" type="radio" name="exampleRadios" id="district2"
                               data-district="Ленинский" value="option2">
                        <label class="form-check-label" for="district2">
                            Ленинский
                        </label>
                    </div>
                </div>
                <div class="col-lg-2 mx-auto p-4 col-sm-12">
                    <div class="form-check">
                        <input class="form-check-input district-check" type="radio" name="exampleRadios" id="district3"
                               data-district="Октябрьский" value="option1">
                        <label class="form-check-label" for="district3">
                            Октябрьский
                        </label>
                    </div>
                </div>
                <div class="col-lg-2 mx-auto p-4 col-sm-12">
                    <div class="form-check">
                        <input class="form-check-input district-check" type="radio" name="exampleRadios" id="district4"
                               data-district="Первомайский" value="option2">
                        <label class="form-check-label" for="district4">
                            Первомайский
                        </label>
                    </div>
                </div>
                <div class="col-lg-2 mx-auto p-4 col-sm-12">
                    <div class="form-check">
                        <input class="form-check-input district-check" type="radio" name="exampleRadios" id="all"
                               data-district="Все" value="option2">
                        <label class="form-check-label" for="all">
                            Все
                        </label>
                    </div>
                </div>
            </div>


        </div>
    </div>
    <div id="main">
        <div id="map"></div>
    </div>


@endsection
@push('styles')
    <style>
        #map {
            min-height: 70vh;
            padding: 10px;
            /*margin-top: 50px;*/
        }

        /*@media (max-width: 1075px) {*/
        /*    #map {*/
        /*        width: 600px;*/
        /*        height: 500px;*/
        /*    }*/
        /*}*/

        /*@media (max-width: 694px) {*/
        /*    #map {*/
        /*        width: 400px;*/
        /*        height: 500px;*/
        /*    }*/
        /*}*/

        /*@media (max-width: 428px) {*/
        /*    #map {*/
        /*        width: 320px;*/
        /*        height: 500px;*/
        /*    }*/
        /*}*/

        @media (max-width: 320px) {
            #map {
                width: 300px;
                height: 400px;
            }
        }
    </style>
@endpush


@push('scripts')
    <script src="https://api-maps.yandex.ru/2.1/?apikey=a2435f91-837f-4a88-87c0-7ac7813eb317&lang=ru_RU"
            type="text/javascript"></script>
    <script src="https://yandex.st/jquery/2.2.3/jquery.min.js" type="text/javascript"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"
            integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

    <script>
        $(document).on('click', '.district-check', function (e) {
            let check = e.currentTarget;
            let district = check.getAttribute('data-district');
            console.log(district);
            $.ajax({
                url: "{{ route('district.check') }}",
                method: "GET",
                data: {
                    district: district,
                },
                success: function (data) {
                    $('#main').html(data.view);
                    // maps()
                }
            })
        })


    </script>


    <script>

        ymaps.ready(function () {
            var myMap = new ymaps.Map('map', {
                    center: [42.865388923088396, 74.60104350048829],
                    zoom: 12
                }, {
                    searchControlProvider: 'yandex#search'
                }),
                clusterer = new ymaps.Clusterer({
                    preset: 'islands#redIcon',
                    clusterIconLayout: "default#pieChart"

                }),

                getPointData = function (index, name, address, id) {
                    return {
                        balloonContentHeader: name,
                        balloonContentBody: [
                            '<address>',
                            address,
                            '<br>',
                            '<a href="show/' +
                            id +
                            '">' +
                            'Побробнее' +
                            '</a>',
                            '</address>'
                        ].join('')
                    };
                },

                getPointOptions = function (category) {

                    if (category === "Незаконный") {

                        return {
                            preset: 'islands#redDotIcon',
                        }
                    } else if (category === "Строящийся") {
                        return {
                            preset: 'islands#darkGreenDotIcon',
                        }
                    } else if (category === "Завершенный") {
                        return {
                            preset: 'islands#violetDotIcon',
                        }
                    }
                },
                points = [];
            owner = [];
            address = [];
            category = [];
            id = [];

            @foreach($builds as $build)
                points.push([{{ $build->latitude }}, {{ $build->longitude }}]);
                owner.push("{{ $build->name }}");
                address.push("{{ $build->address }}");
                category.push("{{ $build->category }}")
                id.push("{{ $build->id }}")
            @endforeach

                geoObjects = [];
            for (var i = 0, len = points.length; i < len; i++) {

                geoObjects[i] = new ymaps.Placemark(points[i], getPointData(i, owner[i], address[i], id[i]), getPointOptions(category[i]));
            }

            clusterer.add(geoObjects)
            myMap.geoObjects.add(clusterer);
        });




    </script>

@endpush
