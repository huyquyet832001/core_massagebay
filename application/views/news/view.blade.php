@extends('index')
@section('css')
    <link rel="stylesheet" href="theme/frontend/css/detail.css">
@endsection
<style>
    .breadcrumb li {
        padding-right: 5px;
    }

    .breadcrumb li a {
        color: #333333;
        font-size: 14px;
        font-family: "Arial";
        padding-right: 0px;
        text-decoration: none;
    }

    .breadcrumb li::after {
        content: '>';
        padding-left: 5px;
    }

    .breadcrumb li:last-child::after {
        content: '';
    }

</style>
@section('content')
    <div class="container">
        <div class="breacumb pt-3">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                {%BREADCRUMB%}
            </nav>
        </div>
        <div class="row">
            <div class="col-xl-9">
                <div class="breacumb">
                    <nav style="--bs-breadcrumb-divider: '|';" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i
                                        class="far fa-calendar-alt me-2"></i>{{ date('d/m/Y', $dataitem['create_time']) }}</a>
                            </li>
                        </ol>
                    </nav>
                </div>
                <div class="content">
                    <h2 class="content_title">{(name)} </h2>
                    {(content)}
                </div>
                <div class="comment row mt-3">
                    <div class="col d-flex justify-content-start">
                        <div class=" comment_star ">
                            <a href="">
                                <i class="fas fa-star"></i>
                            </a>
                            <a href="">
                                <i class="fas fa-star"></i>
                            </a><a href="">
                                <i class="fas fa-star"></i>
                            </a><a href="">
                                <i class="fas fa-star"></i>
                            </a>
                            <a href="">
                                <i class="fas fa-star"></i>
                            </a>
                        </div>
                        <div class="comment_share pt-1">
                            <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v7.0"
                                                        nonce="w3Juu33G"></script>
                            <div class="fb-like" data-href="https://developers.facebook.com/docs/plugins/"
                                data-width="" data-layout="button" data-action="like" data-size="small" data-share="true">
                            </div>
                        </div>
                        <div class="comment_image_zalo">
                            <a href="">
                                <img src="theme/frontend/images/Untitled-1.jpg" class="img-fluid" alt="">
                            </a>
                        </div>
                    </div>
                </div>
                <div id="fb-root"></div>
                <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v12.0"
                                nonce="IoSQPnEB"></script>
                <div class="fb-comments" data-href="https://developers.facebook.com/docs/plugins/comments#configurator"
                    data-width="" data-numposts="0"></div>
            </div>
            <div class="col-xl-3 mt-2">
                <div class="bg-black search">
                    <p class="text-search">TÌM KIẾM</p>
                    <form action="" class="form-search">
                        <p>Từ khóa</p>
                        <input type="text" class="form-control" placeholder="Từ khóa...">
                        <p>Thành phố</p>
                        <select name="" id="" class="form-select">
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
                <div class="bg-black topic pb-1 mt-3">
                    <p class="topic_latest">CHỦ ĐỀ MỚI NHẤT</p>
                    <!--DBS-loop.news.2|where:act = 1,ord = 1|limit: 0,4-->
                    <div class="row g-2 topic_tiem">
                        <div class="col-5">
                            <a href="{(itemnews2.slug)}">[[itemnews2.#W#img.1.-1]]</a>
                        </div>
                        <div class="col-7 topic_item-body">
                            <a href="{(itemnews2.slug)}">
                                <h6>{(itemnews2.name)}</h6>
                            </a>
                            <p>{(itemnews2.short_content)}</p>
                        </div>
                    </div>
                    <!--DBE-loop.news.2-->
                </div>
                <!--DBS-loop.poster.1|where:act = 1|limit: 0,1-->
                <div class="col-xl-12 quangcao mt-3">
                    <a href="">[[itemposter1.#W#img.1.-1]]</a>
                </div>
                <!--DBE-loop.poster.1-->
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="news" data-background="{<BANNER_HOME_NEW.-1.1>}"
            data-background-webp="{<BANNER_HOME_NEW.-1.1>}">
            <h1 class="new_title text-center pt-3">Tin tức mới nhất</h1>
            <img src="theme/frontend/images/icon1.png" class="img-fluid mx-auto d-block" alt="">
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

            </div>
            <div class="row">
                <a href="" class="new_view_all d-flex justify-content-center"> <button>XEM TẤT CẢ</button></a>
            </div>
        </div>
    </div>
@endsection
