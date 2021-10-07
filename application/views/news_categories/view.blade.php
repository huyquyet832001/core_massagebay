@extends('index')
@section('css')
    <link rel="stylesheet" href="theme/frontend/css/category.css">
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

    .pagination strong {
        padding: 5px 15px;
    }

    .pagination a {
        padding: 5px 15px;
    }

    .new_item-img img {
        width: 100%;
    }

</style>
@section('content')
    <div class="container">
        <div class="row">
            <div class="breacumb pt-3">
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    {%BREADCRUMB%}
                </nav>
            </div>
            <div class="col-xl-9">
                <!--DBS-loop.news.2|where:act = 1,hot = 1|order:create_time desc|limit:0,1-->
                <div class="content">
                    <a href="{(itemnews2.slug)}">[[itemnews2.#W#img.1.-1]]</a>
                    <div class="content_main">
                        <a href="{(itemnews2.slug)}">
                            <h6>{(itemnews2.name)}</h6>
                        </a>
                        <p>{(itemnews2.short_content)}</p>
                    </div>
                </div>
                <!--DBE-loop.news.2-->
                <div class="">
                    <h2 class=" new_title mt-3">{(name)}</h2>
                    <div class="row">
                        @foreach ($list_data as $item)
                            <div class="row new_item border">
                                <div class="col-lg-3 col-12">
                                    <div class="new_item-img pt-4">
                                        <a href="{(item.slug)}" class="float-start me-3">[[item.#W#img.1.-1]]</a>
                                    </div>
                                </div>
                                <div class="col-lg-9 col-12">
                                    <div class="new_item-body">
                                        <a href="{(item.slug)}">
                                            <h5 class="new_item-title mt-2">{(item.name)}</h5>
                                        </a>
                                        <div class="new_item-star float-start">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <div class="new_item-city d-flex justify-content-end">
                                            <span>Bình Dương</span>
                                        </div>
                                        <p class="new_item-content">{(item.short_content)} </p>
                                        <div class="new_item-time">
                                            <i class="far fa-clock me-1"></i>{(item.create_time)}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="pagination mb-4">
                    {%PAGINATION%}
                </div>
            </div>
            <div class="col-xl-3">
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
                    <!--DBS-loop.news.3|where:act = 1,ord = 1|limit: 0,4-->
                    <div class="row g-2 topic_tiem">
                        <div class="col-5">
                            <a href="{(itemnews3.slug)}">[[itemnews3.#W#img.1.-1]]</a>
                        </div>
                        <div class="col-7 topic_item-body">
                            <a href="{(itemnews3.slug)}">
                                <h6>{(itemnews3.name)}</h6>
                            </a>
                            <p>{(itemnews3.short_content)}</p>
                        </div>
                    </div>
                    <!--DBE-loop.news.3-->
                </div>
                <!--DBS-loop.poster.1|where:act = 1|limit: 0,3-->
                <div class="col-xl-12 quangcao mt-3">
                    <a href="">[[itemposter1.#W#img.1.-1]]</a>
                </div>
                <!--DBE-loop.poster.1-->
            </div>
        </div>
    </div>

@endsection
