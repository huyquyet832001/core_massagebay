<?php 
$hook['tech5s_view_sitemap'][] = array( 
  'class'    => 'SuperSitemap',
  'function' => 'disableOldSitemap',
  'filename' => 'SuperSitemap.php',
  'filepath' => 'plugins/super_sitemap',
);
$hook['tech5s_pre_create_sitemap'][] = array( 
  'class'    => 'SuperSitemap',
  'function' => 'disableCreateSitemap',
  'filename' => 'SuperSitemap.php',
  'filepath' => 'plugins/super_sitemap',
);
$hook['tech5s_after_update_1'][] = array( 
  'class'    => 'SuperSitemap',
  'function' => 'updateAfterUpdate',
  'filename' => 'SuperSitemap.php',
  'filepath' => 'plugins/super_sitemap',
);
$hook['tech5s_after_quickupdate'][] = array( 
  'class'    => 'SuperSitemap',
  'function' => 'updateAfterQuickUpdate',
  'filename' => 'SuperSitemap.php',
  'filepath' => 'plugins/super_sitemap',
);
$hook['tech5s_after_insert_success'][] = array( 
  'class'    => 'SuperSitemap',
  'function' => 'updateAfterInsert',
  'filename' => 'SuperSitemap.php',
  'filepath' => 'plugins/super_sitemap',
);
$hook['tech5s_after_delete'][] = array( 
  'class'    => 'SuperSitemap',
  'function' => 'updateAfterDelete',
  'filename' => 'SuperSitemap.php',
  'filepath' => 'plugins/super_sitemap',
);
$hook['tech5s_after_delete_all'][] = array( 
  'class'    => 'SuperSitemap',
  'function' => 'updateAfterDelete',
  'filename' => 'SuperSitemap.php',
  'filepath' => 'plugins/super_sitemap',
);
$hook['tech5s_extra_function'][] = array( 
  'class'    => 'SuperSitemap',
  'function' => 'managerSitemap',
  'filename' => 'SuperSitemap.php',
  'filepath' => 'plugins/super_sitemap',
);