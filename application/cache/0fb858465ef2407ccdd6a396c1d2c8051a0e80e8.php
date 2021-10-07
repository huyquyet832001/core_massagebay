<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="theme/frontend/css/category.css">
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
<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="breacumb pt-3">
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <?php $this->CI->Dindex->getBreadcrumb((isset($datatable)&& array_key_exists("table_parent", $datatable))?$datatable["table_parent"]:array(),@$dataitem["parent"]?$dataitem["parent"]:0,echor($dataitem,"name","1")); ?>
                </nav>
            </div>
            <div class="col-xl-9">
                <?php
            $arrnews2 = $this->CI->Dindex->getDataDetail(
                array(
                    'input'=>"*",
                    'table'=>'news',
                    'order'=>'create_time desc',
                    'where'=>array(array('key'=>'act','compare'=>'=','value'=>'1'),array('key'=>'hot','compare'=>'=','value'=>'1')),
                    'limit'=>'0,1',
                    'pivot'=>[],
                    'object'=>0
                )
            );
         ?><?php $countnews2 = count($arrnews2);
     for ($inews2=0; $inews2 < $countnews2; $inews2++) { $itemnews2=$arrnews2[$inews2]; ?>
                <div class="content">
                    <a href="<?php echom($itemnews2,'slug',1); ?>"><?php echo imgv2($itemnews2,'#W#img','1',-1) ; ?></a>
                    <div class="content_main">
                        <a href="<?php echom($itemnews2,'slug',1); ?>">
                            <h6><?php echom($itemnews2,'name',1); ?></h6>
                        </a>
                        <p><?php echom($itemnews2,'short_content',1); ?></p>
                    </div>
                </div>
                <?php }; ?>
                <div class="">
                    <h2 class=" new_title mt-3"><?php echom($dataitem,'name',1); ?></h2>
                    <div class="row">
                        <?php foreach($list_data as $item): ?>
                            <div class="row new_item border">
                                <div class="col-lg-3 col-12">
                                    <div class="new_item-img pt-4">
                                        <a href="<?php echom($item,'slug',1); ?>" class="float-start me-3"><?php echo imgv2($item,'#W#img','1',-1) ; ?></a>
                                    </div>
                                </div>
                                <div class="col-lg-9 col-12">
                                    <div class="new_item-body">
                                        <a href="<?php echom($item,'slug',1); ?>">
                                            <h5 class="new_item-title mt-2"><?php echom($item,'name',1); ?></h5>
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
                                        <p class="new_item-content"><?php echom($item,'short_content',1); ?> </p>
                                        <div class="new_item-time">
                                            <i class="far fa-clock me-1"></i><?php echom($item,'create_time',1); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="pagination mb-4">
                    <?php  echo $this->CI->pagination->create_links(); ?>
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
                    <?php
            $arrnews3 = $this->CI->Dindex->getDataDetail(
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
         ?><?php $countnews3 = count($arrnews3);
     for ($inews3=0; $inews3 < $countnews3; $inews3++) { $itemnews3=$arrnews3[$inews3]; ?>
                    <div class="row g-2 topic_tiem">
                        <div class="col-5">
                            <a href="<?php echom($itemnews3,'slug',1); ?>"><?php echo imgv2($itemnews3,'#W#img','1',-1) ; ?></a>
                        </div>
                        <div class="col-7 topic_item-body">
                            <a href="<?php echom($itemnews3,'slug',1); ?>">
                                <h6><?php echom($itemnews3,'name',1); ?></h6>
                            </a>
                            <p><?php echom($itemnews3,'short_content',1); ?></p>
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
                    'limit'=>' 0,3',
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

<?php $__env->stopSection(); ?>

<?php echo $__env->make('index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>