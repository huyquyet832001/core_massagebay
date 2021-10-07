<div id="Breadcrumb" class="Block Breadcrumb ui-widget-content ui-corner-top ui-corner-bottom">
    <ul>
        <li class="home"><a href="<?php echo base_url(''); ?>Techsystem"><i class="icon-home" style="font-size:14px;"></i> <?php echo alang("HOME") ?></a></li>
        <li class="SecondLast"><a href="Techsystem/view_plugins/amp">Cấu hình Plugin Amp</a></li>
    </ul>
</div>
<?php $config = @$config?$config:[]; ?>
<div id="cph_Main_ContentPane " class="amp">
    <div class="row">
        <form action="" method="post">
            <textarea name="config" class="hidden"><?php echo json_encode($config) ?></textarea>
            <?php 
            $this->db->select("name,note");
            $tables = $this->db->get("nuy_table")->result_array();
             ?>
             <?php foreach($tables as $table): ?>
            <div class="col-xs-12 col-md-3">
                <input type="checkbox" <?php echo array_key_exists($table['name'], $config) && $config[$table['name']]['value']==1?'checked':'' ?> id="<?php echo $table['name'] ?>" value="1">
                <label for="<?php echo $table['name'] ?>"><?php echo $table['note'] ?> - <?php echo $table['name'] ?></label>
            </div>
            <?php endforeach; ?>
            <div class="col-xs-12">
            <button class="btn btn-primary" type="submit">Lưu</button>
            </div>
        </form>

    </div>
</div>
</div>
<script type="text/javascript">
    $(".amp input[type=checkbox]").change(function(event) {
        var json = {};
        var checkboxs = $(".amp input[type=checkbox]");
        for (var i = 0; i < checkboxs.length; i++) {
            var checkbox = $(checkboxs[i]);
            var id = checkbox.attr("id");
            var value = checkbox.is(":checked")?1:0;;
            json[id] = {"name":id,"value":value};
        }
        $(".amp textarea[name=config]").val(JSON.stringify(json));
    });
</script>
<style type="text/css">
    .amp input[type=checkbox] + label {
  display: block;
  margin: 0.2em;
  cursor: pointer;
  padding: 0.2em;
}

.amp input[type=checkbox] {
  display: none !important;
}

.amp input[type=checkbox] + label:before {
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

.amp input[type=checkbox] + label:active:before {
  transform: scale(0);
}

.amp input[type=checkbox]:checked + label:before {
  background-color: MediumSeaGreen;
  border-color: MediumSeaGreen;
  color: #fff;
}

.amp input[type=checkbox]:disabled + label:before {
  transform: scale(1);
  border-color: #aaa;
}

.amp input[type=checkbox]:checked:disabled + label:before {
  transform: scale(1);
  background-color: #bfb;
  border-color: #bfb;
}
</style>