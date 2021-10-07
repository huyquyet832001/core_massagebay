<?php
$hook['tech5s_before_baseview'][] = array( 
  'class'    => 'Amp',
  'function' => 'init',
  'filename' => 'Amp.php',
  'filepath' => 'plugins/amp',
);
$hook['tech5s_load_meta'][] = array( 
  'class'    => 'Amp',
  'function' => 'addAmp',
  'filename' => 'Amp.php',
  'filepath' => 'plugins/amp',
);
