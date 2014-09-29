<?php

include_once("controllers/plantasController.class.php");

$controller = new PlantasController();

$model;

if($_SERVER['REQUEST_METHOD'] === 'POST')
	$model = $controller->criarPlantaPost();
else
	$model = $controller->criarPlantaGet();
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
	<h1>Cadastrar Planta</h1>
	<div class="col-md-6">	
		<form action="planta-criar.php" method="post" role="form">
		  <div class="form-group">
		    <label for="nome">Nro Planta</label>
		    <input type="text" class="form-control" id="nroPlanta" name="nroPlanta" placeholder="número da planta">
		  </div>
		  <div class="form-group">
		    <label for="nome">Cliente</label>
		    <select name="idCliente"  class="form-control">
		    <?php foreach($model->clientes as $cliente) { ?>
				<option value="<?php echo $cliente->getId() ?>"><?php echo $cliente->getNome() ?></option>
				 <?php } ?>
			</select>
		  </div>
		  <div class="form-group">
		    <label for="nome">Arquiteto Responsável</label>
		    <select name="idArquiteto"  class="form-control"	>
		    <?php foreach($model->arquitetos as $arquiteto) { ?>
				<option value="<?php echo $arquiteto->getId() ?>"><?php echo $arquiteto->getNome() ?></option>
				 <?php } ?>
			</select>
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