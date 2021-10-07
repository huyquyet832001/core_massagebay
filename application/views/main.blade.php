@extends('index')
@section('css')
    <link rel="stylesheet" href="theme/frontend/css/update.css">
@endsection
@section('content')
    <div class="container">
        <div class="row mt-3">
            <div class="col-xl-9">
                <div class="row">
                    <div class="col-xl-6">
                        <h1 class="title-spa">Spa uy tín</h1>
                    </div>
                    <div class="col-xl-6 mt-2">
                        <nav class="nav_tab">
                            <!--DBS-menu.5|where:act = 1,group_id = 5|config:-->
                            <!--DBE-menu.5-->
                        </nav>
                    </div>
                    <hr class="tab-hr">
                </div>
                <div class="content mt-3">
                    <div class="row">
                        <!--DBS-loop.pro.1|where:act = 1,ord = 0|order: create_time desc|limit:0,9-->
                        <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                            <div class="card">
                                <a href="">[[itempro1.#W#img.1.-1]]</a>
                                <div class="card_header d-flex justify-content-between">
                                    <div class="card_title">
                                        <a href="">
                                            <h6>{(itempro1.name)} </h6>
                                        </a>
                                        <div class="star">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                    </div>
                                    <div class="card_city">
                                        <p>Bình Dương</p>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <p class="card-text">{(itempro1.short_content)}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!--DBE-loop.pro.1-->
                    </div>
                    <div class="pagination">
                        {%PAGINATION%}
                    </div>
                </div>
            </div>
            <div class="col-xl-3 mt-3">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="bg-black search">
                            <p class="text-search">TÌM KIẾM</p>
                            <form action="{{ \Messabay\Constants\Url::SEARCH }}" method="GET" accept-charset="utf-8"
                                class="form-search">
                                <p>Từ khóa</p>
                                <input type="text" name="keyword" class="form-control" placeholder="Từ khóa...">
                                <p>Thành phố</p>
                                <select name="address" id="" class="form-select">
                                    <option value="">--Chọn điểm đến--</option>
                                </select>
                                <div class="d-flex justify-content-between">
                                    <div class="star">
                                        <p>Rasting</p>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <button type="submit"> <i class="fa fa-search"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!--DBS-loop.poster.1|where:act = 1|limit: 0,3-->
                    <div class="col-xl-12 quangcao mt-3">
                        <a href="">[[itemposter1.#W#img.1.-1]]</a>
                    </div>
                    <!--DBE-loop.poster.1-->
                </div>
            </div>
        </div>
    </div>
    <div class="conntainer-fluid">
        <div class="represent" data-background="{<BANNER_HOME_PRO.-1.1>}"
            data-background-webp="{<BANNER_HOME_PRO.-1.1>}">
            <h1 class="text-center represent_title">Spa tiêu biểu</h1>
            <img src=" {<ICON_HOME_PRO.1.-1>}" class="img-fluid mx-auto d-block" alt="">
            <div class="container">
                <div class="row mt-5">
                    <!--DBS-loop.pro.2|where:act = 1,ord = 1|order:create_time desc|limit:0,10-->
                    <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                        <div class="Representative_item">
                            <div class="Representative_item_img float-start me-4">
                                <a href="">[[itempro2.#W#img.1.-1]]</a>
                            </div>
                            <div class="Representative_item_body">
                                <a href="">
                                    <h6>{(itempro2.name)}</h6>
                                </a>
                                <p>Vũng Tàu</p>
                            </div>
                        </div>
                    </div>
                    <!--DBE-loop.pro.2-->
                </div>
            </div>
        </div>
        <div class="news" data-background="{<BANNER_HOME_NEW.-1.1>}"
            data-background-webp="{<BANNER_HOME_NEW.-1.1>}">
            <h1 class="new_title text-center pt-3">Tin tức quan tâm nhất</h1>
            <img src=" {<ICON_HOME_NEW.1.-1>}" class="img-fluid mx-auto d-block" alt="">
            <div class="container">
                <div class="row pt-4">
                    <!--DBS-loop.news.1|where:act = 1,count > 0,hot = 0|limit:0,3-->
                    <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                        <div class="new_item">
                            <div class="new_item_image">
                                <a href="{(itemnews1.slug)}">
                                    [[itemnews1.#W#img.1.-1]]</a>
                            </div>
                            <div class=" new_item_body">
                                <a href="{(itemnews1.slug)}">
                                    <h6>{(itemnews1.name)} </h6>
                                </a>
                                <p>{(itemnews1.short_content)}</p>
                            </div>
                        </div>
                    </div>
                    <!--DBE-loop.news.1-->
                </div>
                <div class="row">
                    <a href="" class="new_view_all d-flex justify-content-center"> <button>XEM TẤT CẢ</button></a>
                </div>
            </div>
        </div>
    </div>
@endsection
