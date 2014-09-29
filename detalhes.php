<?php

include_once("controllers/plantasController.class.php");

$controller = new PlantasController();

$model = $controller->detalhes();
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
	<h1>Detalhes Planta</h1>
	<div class="col-md-6">
		  <div class="form-group">
		    <label for="nome">Nro Planta</label>
		    <input type="text" class="form-control" id="nroPlanta" name="nroPlanta" placeholder="número da planta" value="<?php echo $model->planta->getNroPlanta();?>" readonly>
		  </div>
		  
	<table class="table">
		<tt>
			<th>Tipo Comodo</th>
			<th>Metragem</th>			
		</tr>
		<?php foreach ($model->comodos as $item) { ?>
	    <tr>
			<td><?php echo $item->getTipo()->getNome(); ?></td>
			<td><?php echo $item->getMetragem(); ?></td>
		</tr>   
		<?php } ?>
	</table>		  
	</div>		
</div>
</body>
</html>