<main class="pt-5 mt-5">
    <div class="container">
        <div class="col-12 ">
            <p class="h3 font-weight-bold text-center text-caral">Список объектов </p>
        </div>
        <div class="row col-12 justify-content-around pr-0 mx-0">
            <p class="font-small  text-left text-caral pt-3">в списке: <span class="font-weight-bold">120</span>
                объектов</p>
            <form class="form-inline my-2 my-lg-0 ml-auto">
                <input class="form-control" type="search" placeholder="Поиск" aria-label="Search">
            </form>
            <button type="button" class="btn btn-outline-default  waves-effect text-right " style="padding: 8px 26px;">
                Добавить объект
            </button>
        </div>
        <div class="row justify-content-around px-5 py-2 font-small text-caral">
            <div class="col font-weight-bold"><span>Ф.И.О</span></div>
            <div class="col font-weight-bold"><span>Адресс объекта</span></div>
            <div class="col font-weight-bold"><span>Вид объекта</span></div>
            <div class="col font-weight-bold"><span>Площадь</span></div>
        </div>
        <div class="accordion md-accordion accordion-blocks" id="accordionEx78" role="tablist"
             aria-multiselectable="true">
            <div class="card " style="border-left: 10px solid #036bb2;">
                <div class="card-header border-bottom" role="tab" id="headingUnfiled">
                    <a data-toggle="collapse" data-parent="#accordionEx78" href="#collapseUnfiled" aria-expanded="true"
                       aria-controls="collapseUnfiled">
                        <div class="font-small mb-0 row justify-content-around px-3">
                            <div class="col"><span>Жусуев А.С.</span></div>

                            <div class="col"><span>Адресс объекта</span></div>

                            <div class="col"><span>Вид объекта</span></div>

                            <div class="col"><span>Площадь</span></div>
                        </div>
                        <div class="mb-0 ">
                            <i class="fas fa-angle-down rotate-icon"></i>
                        </div>
                    </a>
                </div>
                <div id="collapseUnfiled" class="collapse" role="tabpanel" aria-labelledby="headingUnfiled"
                     data-parent="#accordionEx78">
                    <div class="card-body">
                        <div class="row text-caral border-bottom">
                            <div class="col-12 col-lg-4">
                                <a href="" class="" data-toggle="modal" data-target="#info">
                                    <h4 class="font-weight-bold"><span class="badge badge-primary">Заявление</span></h4>
                                </a>
                            </div>
                            <div class="col-12 col-lg-4">
                                <a href="" data-toggle="modal" data-target="#info">
                                    <h4 class="font-weight-bold"><span class="badge badge-primary">АПУ/ИТУ</span></h4>
                                </a>
                            </div>
                            <div class="col-12 col-lg-4">
                                <a href="" data-toggle="modal" data-target="#info">
                                    <h4 class="font-weight-bold"><span class="badge badge-primary">Гос.акт </span></h4>
                                </a>
                            </div>
                            <div class="col-12 col-lg-4">
                                <a href="" data-toggle="modal" data-target="#info">
                                    <h4 class="font-weight-bold"><span class="badge badge-primary">Проект </span></h4>
                                </a>
                            </div>
                            <div class="col-12 col-lg-4">
                                <a href="" data-toggle="modal" data-target="#info">
                                    <h4 class="font-weight-bold"><span class="badge badge-primary">Разрешение на строительство</span></h4>
                                </a>
                            </div>
                            <div class="col-12 col-lg-4">
                                <a href="" data-toggle="modal" data-target="#info">
                                    <h4 class="font-weight-bold"><span class="badge badge-primary">АКТ оценки соотвествия</span> </h4>
                                </a>
                            </div>
                            <div class="col-12 col-lg-4">
                                <a href="" data-toggle="modal" data-target="#info">
                                    <h4 class="font-weight-bold"><span class="badge badge-primary">Примечание</span> </h4>
                                </a>
                            </div>
                        </div>
                        <div class="col-12 text-right">
                            <button class="btn btn btn-outline-dark-green " style="padding: 5px 10px;">Поэтапная проверка</button>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>

</main>
<div class="modal fade" id="info" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Название файла</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <iframe src="" height="700" width="750"></iframe>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
            </div>
        </div>
    </div>
</div>
