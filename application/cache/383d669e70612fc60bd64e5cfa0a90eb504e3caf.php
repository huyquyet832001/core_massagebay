<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="theme/frontend/css/update.css">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row mt-3">
            <div class="col-xl-9">
                <div class="row">
                    <div class="col-xl-6">
                        <h1 class="title-spa">Spa uy tín</h1>
                    </div>
                    <div class="col-xl-6 mt-2">
                        <nav class="nav_tab">
                            <?php $arr = $this->CI->Dindex->recursiveTable("*","menu","parent","id","0",array(array('key'=>'act','compare'=>'=','value'=>'1'),array('key'=>'group_id','compare'=>'=','value'=>'5'))); ?><?php printMenu($arr,array(''=>'')); ?>
                        </nav>
                    </div>
                    <hr class="tab-hr">
                </div>
                <div class="content mt-3">
                    <div class="row">
                        <?php
            $arrpro1 = $this->CI->Dindex->getDataDetail(
                array(
                    'input'=>"*",
                    'table'=>'pro',
                    'order'=>' create_time desc',
                    'where'=>array(array('key'=>'act','compare'=>'=','value'=>'1'),array('key'=>'ord','compare'=>'=','value'=>'0')),
                    'limit'=>'0,9',
                    'pivot'=>[],
                    'object'=>0
                )
            );
         ?><?php $countpro1 = count($arrpro1);
     for ($ipro1=0; $ipro1 < $countpro1; $ipro1++) { $itempro1=$arrpro1[$ipro1]; ?>
                        <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                            <div class="card">
                                <a href=""><?php echo imgv2($itempro1,'#W#img','1',-1) ; ?></a>
                                <div class="card_header d-flex justify-content-between">
                                    <div class="card_title">
                                        <a href="">
                                            <h6><?php echom($itempro1,'name',1); ?> </h6>
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
                                    <p class="card-text"><?php echom($itempro1,'short_content',1); ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <?php }; ?>
                    </div>
                    <div class="pagination">
                        <?php  echo $this->CI->pagination->create_links(); ?>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 mt-3">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="bg-black search">
                            <p class="text-search">TÌM KIẾM</p>
                            <form action="<?php echo e(\Messabay\Constants\Url::SEARCH); ?>" method="GET" accept-charset="utf-8"
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
    </div>
    <div class="conntainer-fluid">
        <div class="represent" data-background="<?php echo $this->CI->Dindex->getSettingImage('BANNER_HOME_PRO',-1,'1',false); ?>"
            data-background-webp="<?php echo $this->CI->Dindex->getSettingImage('BANNER_HOME_PRO',-1,'1',false); ?>">
            <h1 class="text-center represent_title">Spa tiêu biểu</h1>
            <img src=" <?php echo $this->CI->Dindex->getSettingImage('ICON_HOME_PRO',1,'-1',false); ?>" class="img-fluid mx-auto d-block" alt="">
            <div class="container">
                <div class="row mt-5">
                    <?php
            $arrpro2 = $this->CI->Dindex->getDataDetail(
                array(
                    'input'=>"*",
                    'table'=>'pro',
                    'order'=>'create_time desc',
                    'where'=>array(array('key'=>'act','compare'=>'=','value'=>'1'),array('key'=>'ord','compare'=>'=','value'=>'1')),
                    'limit'=>'0,10',
                    'pivot'=>[],
                    'object'=>0
                )
            );
         ?><?php $countpro2 = count($arrpro2);
     for ($ipro2=0; $ipro2 < $countpro2; $ipro2++) { $itempro2=$arrpro2[$ipro2]; ?>
                    <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                        <div class="Representative_item">
                            <div class="Representative_item_img float-start me-4">
                                <a href=""><?php echo imgv2($itempro2,'#W#img','1',-1) ; ?></a>
                            </div>
                            <div class="Representative_item_body">
                                <a href="">
                                    <h6><?php echom($itempro2,'name',1); ?></h6>
                                </a>
                                <p>Vũng Tàu</p>
                            </div>
                        </div>
                    </div>
                    <?php }; ?>
                </div>
            </div>
        </div>
        <div class="news" data-background="<?php echo $this->CI->Dindex->getSettingImage('BANNER_HOME_NEW',-1,'1',false); ?>"
            data-background-webp="<?php echo $this->CI->Dindex->getSettingImage('BANNER_HOME_NEW',-1,'1',false); ?>">
            <h1 class="new_title text-center pt-3">Tin tức quan tâm nhất</h1>
            <img src=" <?php echo $this->CI->Dindex->getSettingImage('ICON_HOME_NEW',1,'-1',false); ?>" class="img-fluid mx-auto d-block" alt="">
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
                <div class="row">
                    <a href="" class="new_view_all d-flex justify-content-center"> <button>XEM TẤT CẢ</button></a>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>