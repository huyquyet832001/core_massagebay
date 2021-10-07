<?php use \SuperSitemap\Constants\Freq; ?>
<div id="Breadcrumb" class="Block Breadcrumb ui-widget-content ui-corner-top ui-corner-bottom">
    <ul>
        <li class="home"><a href="<?php echo base_url(''); ?>Techsystem"><i class="icon-home" style="font-size:14px;"></i> <?php echo alang("HOME") ?></a></li>
        <li class="SecondLast"><a href="Techsystem/view_plugins/super_sitemap">Cấu hình Sitemap</a></li>
    </ul>
</div>
<div id="cph_Main_ContentPane " class="super_sitemap">
    <div class="row">
        <div class="col-xs-12">
            <?php foreach ($tables as $k => $table): ?>
            <div class="item">
                <p class="title"><?php echo $table['note'] ?> - <span><?php echo $table['name'] ?></span></p>
                <div class="piority attribute">
                    <input type="text" value="<?php echo $config->getTableItemPiority($table['name'])  ?>">
                    <label for="">Độ ưu tiên</label>
                </div>
                <div class="freq attribute">
                    <select >
                        <?php foreach(Freq::getConstants() as $key => $freq): ?>
                            <option value = "<?php echo $freq ?>" <?php $freq==$config->getTableItemFreq($table['name'])?'selected':'' ?> ><?php echo $freq ?></option>
                        <?php endforeach; ?>
                    </select>
                    <label for="">Tần suất</label>
                </div>
            </div>
        <?php endforeach; ?>
        </div>
        <div class="col-xs-12 static-links">
            <p class="title">Link tĩnh</p>
            <?php foreach ($staticLinks as $staticKey => $staticLink):?>
                <div class="item-static">
                <input <?php  echo $config->hasLinkStatic($staticLink['link'])?'checked':''  ?> type="checkbox" id="<?php echo $staticLink['link'] ?>"  value="1">
                <label for="<?php echo $staticLink['link'] ?>"><?php echo $staticLink['link'] ?></label>
                <span>Liên kết Link bảng</span>
                <select class="static-table-map">
                    <option value="">Không chọn</option>
                    <?php foreach ($tableLinks as $tableLinkKey => $tableLink):?>
                    <option <?php  echo $config->getTableMapStaticLink($tableLink['link']) ?'selected':'' ?> value="<?php echo $tableLink['link'] ?>"><?php echo $tableLink['link'] ?></option>
                    <?php endforeach ?>
                </select>
                <span>Tần suất</span>
                <select class="static-freq">
                    <?php foreach(Freq::getConstants() as $key => $freq): ?>
                        <option value = "<?php echo $freq ?>" <?php echo $freq==$config->getStaticItemField($staticLink['link'],'freq')?'selected':'' ?> ><?php echo $freq ?></option>
                    <?php endforeach; ?>
                </select>
                <span>Độ ưu tiên</span>
                <input type="text" class="piority" value="<?php echo $config->getStaticItemField($staticLink['link'],'piority') ?>" placeholder="Độ ưu tiên">
                </div>
            <?php endforeach ?>
        </div>
        <div class="col-xs-12">
            <form action="" method="post">
            <textarea name="config" class="hidden"><?php echo json_encode($config) ?></textarea>
            <button class="btn btn-primary" type="submit">Lưu</button>
            </form>
        </div>
    </div>
</div>
</div>
<script type="text/javascript">
    function superSitemapCalc(){
        var items = $('.super_sitemap .item');
        var json = {};
        for (var i = 0; i < items.length; i++) {
            var item = $(items[i]);
            var title = item.find('.title span').text();
            var piority = item.find('.piority input').val();
            var freq = item.find('.freq select').val();
            json[title] = {"name":title,"value":1,"piority":piority,"freq":freq};
        }
        var statics = $('.super_sitemap .static-links .item-static');
        var jsonstatic = {};
        for (var i = 0; i < statics.length; i++) {
            var static = $(statics[i]);
            var checkbox = static.find('input[type=checkbox]');
            var tablemap = static.find('select.static-table-map').val();
            var freq = static.find('select.static-freq').val();
            var piority = static.find('input.piority').val();
            var label = static.find('label').text();
            var value = checkbox.is(":checked")?1:0;
            if(value==1){
                jsonstatic[label] = {'name':label,'map':tablemap,'freq':freq,'piority':piority};
            }
        }
        json['static'] = jsonstatic;
        $(".super_sitemap textarea[name=config]").val(JSON.stringify(json));
    }
    $(document).on('input', '.super_sitemap .item .piority input', function(event) {
        event.preventDefault();
        superSitemapCalc();
    });
    $(document).on('change', '.super_sitemap .item .freq select', function(event) {
        event.preventDefault();
        superSitemapCalc();
    });
    $(document).on('change', '.super_sitemap .static-links input,.super_sitemap .static-links select', function(event) {
        event.preventDefault();
        superSitemapCalc();
    });

</script>
<style type="text/css">
    .super_sitemap .item{
            background: #00923f;
    padding: 3px;
    color: #fff;
        margin-bottom: 10px;
    }
    .super_sitemap .title{
text-align: center;
    text-transform: uppercase;
    background: #fff;
    color: #00923f;
    font-weight: bold;
    }
    .super_sitemap .attribute{
        display: inline-block;
    }
    .super_sitemap select,
    .super_sitemap input{
        height: 20px;
        color: #000;
    }
    .super_sitemap .static-links .item-static,
    .super_sitemap .static-links .item{
        padding: 1px;
    vertical-align: top;
    margin-bottom: 1px;
    }
    .super_sitemap .static-links .item-static input,
    .super_sitemap .static-links .item input{
        margin: 0;
    display: inline-block;
    vertical-align: top;
    height: 20px;
    }
    .super_sitemap .static-links .item-static label,
    .super_sitemap .static-links .item label{
margin: 0;
    display: inline-block;
    vertical-align: top;
    height: 20px;
    width: 150px;
    overflow: hidden;
    }
</style>