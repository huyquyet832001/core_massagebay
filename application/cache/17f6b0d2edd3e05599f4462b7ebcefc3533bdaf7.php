 <header class="header">
     <div class="header_background" data-background="<?php echo $this->CI->Dindex->getSettingImage('BANNER_HOME_HEADER',-1,'1',false); ?>"
         data-background-webp="<?php echo $this->CI->Dindex->getSettingImage('BANNER_HOME_HEADER',-1,'1',false); ?>">
         <div class="header_logo">
             <a href=""> <img src="<?php echo $this->CI->Dindex->getSettingImage('LOGO',1,'-1',false); ?>" alt="<?php echo $this->CI->Dindex->getSettingImage('LOGO#ALT',false,'',false); ?>" title="<?php echo $this->CI->Dindex->getSettingImage('LOGO#TITLE',false,'',false); ?>"
                     class="img-fluid mx-auto d-block pt-3 pb-3" alt=""></a>
         </div>
     </div>
     <nav class="nav nav_pc">
         <ul class="main-menu">
             <?php $arr = $this->CI->Dindex->recursiveTable("*","menu","parent","id","0",array(array('key'=>'act','compare'=>'=','value'=>'1'),array('key'=>'group_id','compare'=>'=','value'=>'1'))); ?><?php printMenu($arr,array()); ?>
         </ul>
     </nav>
     <div class="header_mobile">
         <label for="nav-moble-input" class="toggle">
             <i class=" fa fa-bars"></i>
             <span>MASSAGEBAY</span>
         </label>
     </div>
     <input type="checkbox" name="" class="nav_input" id="nav-moble-input">
     <label for="nav-moble-input" class="nav_overlay"></label>
     <nav class="nav_mobile">
         <label for="nav-moble-input" class="nav_mobile-close"><i class="fas fa-times"></i></label>
         <ul class="nav_mobile-list">
             <?php $arr = $this->CI->Dindex->recursiveTable("*","menu","parent","id","0",array(array('key'=>'act','compare'=>'=','value'=>'1'),array('key'=>'group_id','compare'=>'=','value'=>'1'))); ?><?php printMenu($arr,array()); ?>
         </ul>
     </nav>
 </header>
