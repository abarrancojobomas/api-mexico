<?php
require 'Slim/Slim.php';
\Slim\Slim::registerAutoloader();
$app = new \Slim\Slim();
$app->config(array(
    'debug' => true,
    'templates.path' => 'views'
));
$app->get('/','index');
function index(){
	$app = \Slim\Slim::getInstance();
	$app->render('index.php');
}
$app->run();
