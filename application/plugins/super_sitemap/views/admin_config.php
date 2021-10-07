<div id="Breadcrumb" class="Block Breadcrumb ui-widget-content ui-corner-top ui-corner-bottom">
    <ul>
        <li class="home"><a href="<?php echo base_url(''); ?>Techsystem"><i class="icon-home" style="font-size:14px;"></i> <?php echo alang("HOME") ?></a></li>
        <li class="SecondLast"><a href="Techsystem/view_plugins/super_sitemap">Cấu hình Sitemap</a></li>
    </ul>
</div>
<?php $config = @$config?$config:[];
$this->db->select('name,link');
$this->db->where('name','slug');
$q = $this->db->get('nuy_detail_table');
$tables = $q->result_array();
 ?>
<div id="cph_Main_ContentPane " class="super_sitemap">
    <div class="row">
        <form action="" method="post">
            <textarea name="config" class="hidden"></textarea>
            <?php foreach($tables as $table): ?>
            <div class="col-xs-12 col-md-4">
            <input <?php echo array_key_exists($table['link'], $config) && $config[$table['link']]['value']==1?'checked':'' ?> type="checkbox" id='<?php echo $table['link'] ?>'  value="<?php echo $table['link'] ?>">
            <label for="<?php echo $table['link'] ?>"><?php echo $table['link'] ?></label>
            </div>
            <?php endforeach ?>
             <div class="col-xs-12">
            <button class="btn btn-primary" type="submit">Lưu</button>
            </div>
        </form>
    </div>
</div>
</div>
<script type="text/javascript">
    $(".super_sitemap input[type=checkbox]").change(function(event) {
        var json = {};
        var checkboxs = $(".super_sitemap input[type=checkbox]");
        for (var i = 0; i < checkboxs.length; i++) {
            var checkbox = $(checkboxs[i]);
            var id = checkbox.attr("id");
            var value = checkbox.is(":checked")?1:0;;
            json[id] = {"name":id,"value":value,"piority":0.6,"freq":'weekly'};
        }
        $(".super_sitemap textarea[name=config]").val(JSON.stringify(json));
    });
</script>
<style type="text/css">
    .super_sitemap input[type=checkbox] + label {
  display: block;
  margin: 0.2em;
  cursor: pointer;
  padding: 0.2em;
}
.super_sitemap input[type=checkbox] {
  display: none !important;
}
.super_sitemap input[type=checkbox] + label:before {
  content: "\2714";
  border: 0.1em solid #000;
  border-radius: 0.2em;
  display: inline-block;
  width: 20px;
  height: 20px;
  padding-left: 0.2em;
  padding-bottom: 0.3em;
  margin-right: 0.2em;
  vertical-align: bottom;
  color: transparent;
  transition: .2s;
}
.super_sitemap input[type=checkbox] + label:active:before {
  transform: scale(0);
}
.super_sitemap input[type=checkbox]:checked + label:before {
  background-color: MediumSeaGreen;
  border-color: MediumSeaGreen;
  color: #fff;
}
.super_sitemap input[type=checkbox]:disabled + label:before {
  transform: scale(1);
  border-color: #aaa;
}
.super_sitemap input[type=checkbox]:checked:disabled + label:before {
  transform: scale(1);
  background-color: #bfb;
  border-color: #bfb;
}
</style>