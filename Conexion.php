<?php
	require_once 'php-activerecord/ActiveRecord.php';
 
 ActiveRecord\Config::initialize(function($cfg)
 {
     $cfg->set_model_directory('models');
     $cfg->set_connections(array(
         'development' => 'mysql://root:1907@localhost/mexico_estados;charset=utf8'));
 });

?>
