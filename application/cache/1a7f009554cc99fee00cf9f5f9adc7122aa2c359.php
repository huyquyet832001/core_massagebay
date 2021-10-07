<footer>
    <div class="footer_top">
        <div class="container">
            <div class="row ">
                <div class="col-lg-3 col-md-6 col-sm-12 footer_top_page">
                    <h6>Về hotel84.com</h6>
                    <?php $arr = $this->CI->Dindex->recursiveTable("*","menu","parent","id","0",array(array('key'=>'act','compare'=>'=','value'=>'1'),array('key'=>'group_id','compare'=>'=','value'=>'2'),array('key'=>'parent','compare'=>'=','value'=>'0'))); ?><?php printMenu($arr,array()); ?>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 footer_top_post">
                    <h6>Về hotel84.com</h6>
                    <?php $arr = $this->CI->Dindex->recursiveTable("*","menu","parent","id","0",array(array('key'=>'act','compare'=>'=','value'=>'1'),array('key'=>'group_id','compare'=>'=','value'=>'3'),array('key'=>'parent','compare'=>'=','value'=>'0'))); ?><?php printMenu($arr,array()); ?>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 footer_top_contact ">
                    <h6>Quảng bá khách sạn Việt Nam</h6>
                    <?php $arr = $this->CI->Dindex->recursiveTable("*","menu","parent","id","0",array(array('key'=>'act','compare'=>'=','value'=>'1'),array('key'=>'group_id','compare'=>'=','value'=>'4'),array('key'=>'parent','compare'=>'=','value'=>'0'))); ?><?php printMenu($arr,array()); ?>
                </div>
            </div>
        </div>
    </div>
    <?php echo $this->CI->Dindex->getSettings('CMS_FOOTER.1.-1'); ?></footer>
