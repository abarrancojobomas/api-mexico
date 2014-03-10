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
$app->get('/estados()','authenticate','getEstados');
$app->get('/municipios/:id','getMunicipios')->conditions(array('id'=>'[0-9]{1,2}'));
$app->get('/localidades/:id','getLocalidades')->conditions(array('id'=>'[0-9]{1,8}'));
$app->get('/buscar/:est(/:muni(/:loca))','getBuscar');
$app->get('/estadosC','getEstadosC');
$app->get('/municipiosC/:id','getMunicipiosC')->conditions(array('id'=>'[0-9]{1,2}'));
$app->get('/localidadesC/:id','getLocalidadesC')->conditions(array('id'=>'[0-9]{1,8}'));
$app->get('/login','valida');
$app->run();
function valida(){
	$app = \Slim\Slim::getInstance();    
  try {
    $app->setEncryptedCookie('uid', 'demo', '5 minutes');
    $app->setEncryptedCookie('key', 'demo', '5 minutes');
  } catch (Exception $e) {
    $app->response()->status(400);
    $app->response()->header('X-Status-Reason', $e->getMessage());
  }
}
function authenticate(\Slim\Route $route) {
    $app = \Slim\Slim::getInstance();
    $uid = $app->getEncryptedCookie('uid');
    $key = $app->getEncryptedCookie('key');
    if (validateUserKey($uid, $key) === false) {
      $app->halt(401);
    }
}
function validateUserKey($uid, $key) {
  if ($uid == 'demo' && $key == 'demo') {
    return true;
  } else {
    return false;
  }
}
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
	//	$all= Municipio::all();
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
function getBuscar($est,$muni='',$loca=''){
	$json="[";
	if($muni==''&&$loca=='')
	{
		$all= Estado::find('all',array('conditions'=>"nombre like '%".$est."%'"));
		$ijson='{"estados": ';
	}
	else
		if($muni!=''&&$loca==''){
			$all= Municipio::all(array('conditions'=>"estado_id = ".$est." AND nombre like '%".$muni."%'"));
			$ijson='{"municipios": ';
		}
		else{
			$all= Localidade::all(array('conditions'=>"municipio_id = ".$muni." AND nombre like '%".$loca."%'"));
			$ijson='{"estados": ';
		}
		foreach($all as $k=>$v)
			$json.=$v->to_json().',';
		$json=$ijson.substr($json,0,-1) . ']}';
		echo $json;
} 
function getEstadosC(){
	$dta=array();
	$all = Estado::all();
		foreach($all as $k=>$v)
			array_push($dta,$v->attributes());
		$dta=array('estados'=>$dta);
		echo RJson::pack($dta,true);
}
function getMunicipiosC($id){
	$dta = array();
	$all=Municipio::find('all',array('conditions'=>"estado_id = ".$id.""));
	//$all= Municipio::all();
		foreach($all as $k=>$v)
			array_push($dta,$v->attributes());
		$dta=array('municipios'=>$dta);
		echo RJson::pack($dta,true);

}
function getLocalidadesC($id){
	$dta=array();
	$all=Localidade::find('all',array('conditions'=>"municipio_id = ".$id.""));
		foreach($all as $k=>$v)
			array_push($dta,$v->attributes());
		$dta=array('localidades'=>$dta);
		echo RJson::pack($dta,true);
}

?>
