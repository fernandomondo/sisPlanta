<?php

include_once("controllers/plantasController.class.php");

$controller = new PlantasController();

$model;

if($_SERVER['REQUEST_METHOD'] === 'POST')
	$model = $controller->criarComodoPost();
else
	$model = $controller->criarComodoGet();
?>
	

<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="Content-Language" content="en" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
	<title>Sistema Biblioteca</title>
</head>
<body>
<?php include("menu.php") ?>
<div class="container">
	<h1>Cadastrar Comodo</h1>
	<div class="col-md-6">	
		<form action="comodo-criar.php" method="post" role="form">
		  <div class="form-group">
		    <label for="nome">Nro Planta</label>
		    <input type="text" class="form-control" id="nroPlanta" name="nroPlanta" placeholder="número da planta" value="<?php echo $model->planta->getNroPlanta();?>" readonly>
		  </div>
		  <div class="form-group">
		    <label for="nome">Tipo</label>
		    <select name="idTipoComodo"  class="form-control">
		    <?php foreach($model->tipos as $tipo) { ?>
				<option value="<?php echo $tipo->getId() ?>"><?php echo $tipo->getNome() ?></option>
				 <?php } ?>
			</select>
		  </div>
		  <div class="form-group">
		    <label for="metragem">Metragem</label>
		   <input type="text" class="form-control" id="metragem" name="metragem" placeholder="metragem do comodo" value="<?php echo $model->comodo->getMetragem();?>" >		
		  </div>
		  <?php foreach($model->errors as $item) {?>
		  	<div><?php echo $item ?></div>
		  <?php }?>
		  	
		  
		  <button type="submit" class="btn btn-default">Gravar</button>
		</form>
	</div>		
</div>
</body>
</html>