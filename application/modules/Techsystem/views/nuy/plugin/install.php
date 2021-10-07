<div id="Breadcrumb" class="Block Breadcrumb ui-widget-content ui-corner-top ui-corner-bottom">
    <ul>
        <li class="home"><a href="<?php echo base_url(''); ?>Techsystem"><i class="icon-home" style="font-size:14px;"></i> <?php echo alang("HOME") ?></a></li>
        <li class="SecondLast"><a href="Techsystem/plugins">Plugin</a></li>
    </ul>
</div>

<div id="cph_Main_ContentPane " class="plugins">
  <div class="row">
  <ul class="col-md-6 col-xs-12 nav-plugins">
      <li><a href="Techsystem/plugins">Plugin đã cài</a></li>
      <li class="active"><a href="Techsystem/install">Cài Plugin mới</a></li>
  </ul>
  <div class="col-xs-12 col-md-6 form-plugins">
        <form action="" method="get">
              <input value="<?php echo isset( $keyword)? $keyword:'' ?>" type="text" name="keyword">
            <button>Tìm kiếm</button>
        </form>
    </div>
      
  </div>
  <div class="row">
      	<?php if(count($plugins)>0): ?>
	      <?php foreach ($plugins as $k => $plugin) :?>
	      <div class="col-md-3 col-xs-12">
	        <div class="item">
	          <h3><?php echo $plugin['title'] ?></h3>
	          <div class="content">
	            <p>Mô tả: <?php echo isset($plugin['description'])?$plugin['description']:'' ?></p>
	            <p>Tác giả: <?php echo isset($plugin['author'])?$plugin['author']:'' ?></p>
	            <p>Phiên bản: <?php echo isset($plugin['version'])?$plugin['version']:'' ?></p>
	            <p>Giá: <?php echo isset($plugin['price'])?$plugin['price']:'0' ?> đ</p>
	            <p>Lượt tải: <?php echo isset($plugin['count'])?$plugin['count']:'0' ?></p>
	            <?php $link = isset($plugin['link'])?$plugin['link']:''; ?>
            	<p>Link: <a href="<?php echo $link ?>" target="_blank"><?php echo $plugin['title'] ?></a></p>
	            <div class="function">
	              <?php if(isset($plugin['no_local']) && $plugin['no_local']): ?>
	              	<?php if($plugin['buy']==0): ?>
	              	<a class="btnactive view" target="_blank" rel="noopener" href="<?php echo isset($plugin['link'])?$plugin['link']:'' ?>">MUA NGAY</a>
	              		
	              	<?php else: ?>
	              	<a class="btnactive view" href="Techsystem/install/<?php echo $plugin['name'] ?>">INSTALL</a>
	              	<?php endif; ?>
	              <?php else: ?>
	                <a class="<?php  echo   isset($plugin['enabled']) && $plugin['enabled']==1?'btndeactive':'btnactive'?>" href="Techsystem/plugins/<?php echo $plugin['name'] ?>"><?php echo isset($plugin['enabled']) && $plugin['enabled']==1?alang('DEACTIVE'):alang('ACTIVE') ?></a>
	              <?php endif; ?>
	              <?php if(isset($plugin['need_update']) && $plugin['need_update'] == 1): ?>
	              <a class="btnactive view" href="Techsystem/install/<?php echo $plugin['name'] ?>">UPDATE</a>
	              <?php endif; ?>
	            </div>
	          </div>
	        </div>
	      </div> 
	  <?php endforeach ?> 
	 	<?php else: ?>
	 		<div class="text-center">
	 			<p>Nhập từ khóa để tìm kiếm Plugins</p>
	 		</div>
	 	<?php endif ?>
  </div>
</div>
</div>


<style type="text/css">
 .plugins .item p.desc{
    height: 50px;
    overflow: hidden;
  }


  .plugins .item{
background: #fff;
    padding: 0;
  }
  .plugins .item h3{
    color: #00923f;
    font-size: 16px;
    padding: 10px 5px;
    margin: 0;
    background: #f1f1f1;
  }
  .plugins .item p{
    margin:0;
  }
  .plugins .item .content{
    padding: 0px 5px;
  }
  .plugins .item .btndeactive,
  .plugins .item .btnactive{
    display: block;
    background: #00923f;
    text-align: center;
    text-transform: uppercase;
    color: #fff;
  }
    .plugins .item .btndeactive{
      background: #ccc;
    }
    .plugins .function{
      display: flex;
    }
    .plugins .function a{
        flex-grow: 1;
    flex-basis: 0;
    }
    .plugins .function .btnactive.view{
      background: #be7317;
    }
    .nav-plugins li {
    display: inline-block;
    text-transform: uppercase;
    background: #ccc;
    color: #fff;
}
.nav-plugins li.active {
    display: inline-block;
    text-transform: uppercase;
    background: #00923f;
    color: #fff;
}
.nav-plugins li a {
    color: #fff;
    padding: 5px 10px;
    display: inline-block;
}
.form-plugins{
        text-align: right;
}
</style>
