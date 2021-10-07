<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="theme/frontend/css/detail.css">
<?php $__env->stopSection(); ?>
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
<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="breacumb pt-3">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <?php $this->CI->Dindex->getBreadcrumb((isset($datatable)&& array_key_exists("table_parent", $datatable))?$datatable["table_parent"]:array(),@$dataitem["parent"]?$dataitem["parent"]:0,echor($dataitem,"name","1")); ?>
            </nav>
        </div>
        <div class="row">
            <div class="col-xl-9">
                <div class="breacumb">
                    <nav style="--bs-breadcrumb-divider: '|';" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i
                                        class="far fa-calendar-alt me-2"></i><?php echo e(date('d/m/Y', $dataitem['create_time'])); ?></a>
                            </li>
                        </ol>
                    </nav>
                </div>
                <div class="content">
                    <h2 class="content_title"><?php echom($dataitem,'name',1); ?> </h2>
                    <?php echom($dataitem,'content',1); ?>
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
                    <?php
            $arrnews2 = $this->CI->Dindex->getDataDetail(
                array(
                    'input'=>"*",
                    'table'=>'news',
                    'order'=>'ord asc,id desc',
                    'where'=>array(array('key'=>'act','compare'=>'=','value'=>'1'),array('key'=>'ord','compare'=>'=','value'=>'1')),
                    'limit'=>' 0,4',
                    'pivot'=>[],
                    'object'=>0
                )
            );
         ?><?php $countnews2 = count($arrnews2);
     for ($inews2=0; $inews2 < $countnews2; $inews2++) { $itemnews2=$arrnews2[$inews2]; ?>
                    <div class="row g-2 topic_tiem">
                        <div class="col-5">
                            <a href="<?php echom($itemnews2,'slug',1); ?>"><?php echo imgv2($itemnews2,'#W#img','1',-1) ; ?></a>
                        </div>
                        <div class="col-7 topic_item-body">
                            <a href="<?php echom($itemnews2,'slug',1); ?>">
                                <h6><?php echom($itemnews2,'name',1); ?></h6>
                            </a>
                            <p><?php echom($itemnews2,'short_content',1); ?></p>
                        </div>
                    </div>
                    <?php }; ?>
                </div>
                <?php
            $arrposter1 = $this->CI->Dindex->getDataDetail(
                array(
                    'input'=>"*",
                    'table'=>'poster',
                    'order'=>'ord asc,id desc',
                    'where'=>array(array('key'=>'act','compare'=>'=','value'=>'1')),
                    'limit'=>' 0,1',
                    'pivot'=>[],
                    'object'=>0
                )
            );
         ?><?php $countposter1 = count($arrposter1);
     for ($iposter1=0; $iposter1 < $countposter1; $iposter1++) { $itemposter1=$arrposter1[$iposter1]; ?>
                <div class="col-xl-12 quangcao mt-3">
                    <a href=""><?php echo imgv2($itemposter1,'#W#img','1',-1) ; ?></a>
                </div>
                <?php }; ?>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="news" data-background="<?php echo $this->CI->Dindex->getSettingImage('BANNER_HOME_NEW',-1,'1',false); ?>"
            data-background-webp="<?php echo $this->CI->Dindex->getSettingImage('BANNER_HOME_NEW',-1,'1',false); ?>">
            <h1 class="new_title text-center pt-3">Tin tức mới nhất</h1>
            <img src="theme/frontend/images/icon1.png" class="img-fluid mx-auto d-block" alt="">
            <div class="container">
                <div class="row pt-4">
                    <?php
            $arrnews1 = $this->CI->Dindex->getDataDetail(
                array(
                    'input'=>"*",
                    'table'=>'news',
                    'order'=>'ord asc,id desc',
                    'where'=>array(array('key'=>'act','compare'=>'=','value'=>'1'),array('key'=>'count','compare'=>'>','value'=>'0'),array('key'=>'hot','compare'=>'=','value'=>'0')),
                    'limit'=>'0,3',
                    'pivot'=>[],
                    'object'=>0
                )
            );
         ?><?php $countnews1 = count($arrnews1);
     for ($inews1=0; $inews1 < $countnews1; $inews1++) { $itemnews1=$arrnews1[$inews1]; ?>
                    <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                        <div class="new_item">
                            <div class="new_item_image">
                                <a href="<?php echom($itemnews1,'slug',1); ?>">
                                    <?php echo imgv2($itemnews1,'#W#img','1',-1) ; ?></a>
                            </div>
                            <div class=" new_item_body">
                                <a href="<?php echom($itemnews1,'slug',1); ?>">
                                    <h6><?php echom($itemnews1,'name',1); ?> </h6>
                                </a>
                                <p><?php echom($itemnews1,'short_content',1); ?></p>
                            </div>
                        </div>
                    </div>
                    <?php }; ?>
                </div>

            </div>
            <div class="row">
                <a href="" class="new_view_all d-flex justify-content-center"> <button>XEM TẤT CẢ</button></a>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>