<?php
	require_once 'Slim/Slim.php';
	require_once 'Conexion.php'; 
	require_once 'models/Estado.php';
	require_once 'models/Municipio.php';
	require_once 'models/Localidade.php';
	require_once 'RJson.php';
\Slim\Slim::registerAutoloader();
$app = new \Slim\Slim();
$app->config(array(
    'debug' => true,
    'templates.path' => 'views'
));
$app->get('/','index');
$app->get('/estados','getEstados');
$app->get('/municipios/:id','getMunicipios');
$app->get('/localidades/:id','getLocalidades');
$app->run();
function index(){
	$app = \Slim\Slim::getInstance();
	$app->render('index.php');
}
function getEstados(){
	$json="[";
	$all = Estado::find('all', array('select' => 'id, nombre,abrev'));
		foreach($all as $k=>$v)
			$json.=$v->to_json().',';
		$json='{"estados": ' . substr($json,0,-1) . ']}';
		echo $json;
}
function getMunicipios($id){
	$json="[";
	$all=Municipio::find('all',array('conditions'=>"estado_id = ".$id.""));
		foreach($all as $k=>$v)
			$json.=$v->to_json().',';
		$json='{"municipios": ' . substr($json,0,-1) . ']}';
		echo $json;

}
function getLocalidades($id){
	$json="[";
	$all=Localidade::find('all',array('conditions'=>"municipio_id = ".$id.""));
		foreach($all as $k=>$v)
			$json.=$v->to_json().',';
		$json='{"localidades": ' . substr($json,0,-1) . ']}';
		echo $json;
}
?>
