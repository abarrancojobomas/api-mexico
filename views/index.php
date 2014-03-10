<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.ico">

    <title>ESTADOS,MUNICIPIO,LOCALIDADES WEBSERVICE</title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="dist/css/jumbotron-narrow.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">
      <div class="header">
        <ul class="nav nav-pills pull-right">
          <li class="active"><a href="#">Inicio</a></li>
        </ul>
        <h3 class="text-muted">API MÉXICO</h3>
      </div>

      <div class="jumbotron">
        <h1>Estados, Municipios, Localidades</h1>
        <p class="lead">Este es un WEBSERVICE que provee los Estados, Municipios y Localidades de México en formato JSON puedas usar esa informacion en tu WEB</p>
        <p>Listado de Forma de Uso:</p>
      </div>

      <div class="row marketing">
        <div class="col-lg-6">
          <h4>Estados:</h4>
          <p><a href="estados">127.0.0.1/apimexico/estados</a> puedes obtener listado de estados</p>
          <h4>Municipios:</h4>
          <p><a href="municipios/21">127.0.0.1/apimexico/municipios/id</a> puedes obtener el listado de municipios dependiendo del id de los estados </p>
        </div>
        <div class="col-lg-6">
          <h4>Localidades:</h4>
          <p><a href="localidades/21">127.0.0.1/apimexico/localidades/id</a> puedes obtener el listado de localidades dependiendo del id del municipio </p>
        </div>
      </div>

      <div class="footer">
        <p>&copy; Alfredo Barranco G.</p>
      </div>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>